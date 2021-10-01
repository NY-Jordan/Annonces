<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Models\Posts;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CategoriesController;

class PostsController extends Controller
{
    public function addPost(Request $request)
    {
        $locations = Location::getAllLocations();

        $categories  = Categories::showCategories();
        $user = $request->user();
        return view('posts/post_add', [
            'categories' => $categories,
            'user' => $user,
            'locations' => $locations
        ]);
    }
    public function sendPost(Request $request )


    {
        if (empty($request->all()['ImagePost'])) {
            $request->validate([
                "ImagePost" => ["required"]
            ]); 
        }        
        $request->validate([
            "categories_id" => ["required"],
            "details" => ["required", "min:20"],
            "title" => ["required"],
            "PostType" => ["required"],
            "price" => ["required", "numeric"],
        ]);

        $user = $request->user();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            try {
                //enregistrement du post
                $post = new Posts();
                $post->category_id = (int)$request->input('categories_id');
                $post->title = $request->input('title');
                $post->details = $request->input("details");
                $post->type = $request->PostType[0];
                $post->price = str_replace(' ', '', $request->input("price"));
                $post->user_id = $request->user()->id;
                //enregistrement de l'image correspondante
                foreach ($request->all()['ImagePost'] as $key => $img) {
                    $filename = 'image'.$request->user()->name.\random_int(0, 1000000);
                    $path = $request->file("ImagePost")[$key]->storeAs(
                        'ImagesPost/'.$request->user()->first_name.'_'.$request->user()->last_name, 
                        $filename,
                        'public'
                    );
                    $image = new Image();
                    $image->path =  $path;
                    $post->save();
                    $post->image()->save($image);
                }
                //enregistrement  des sellersInformations
                $user->sellerInformations->sellerEmail = $request->sellerEmail;
                $user->sellerInformations->mobile_phone1 = $request->phone;
                $user->sellerInformations->district = $request->district;
                $user->sellerInformations->location->locationName = $request->location;
                $user->sellerInformations->save();               
               
                return \redirect("post/{$post->id}/details");
            } catch (\Throwable $errors) {
                dd($errors);
            }
            
            
        }
    }
    public function postDetails($id, Request $request)
    {
        $locations = Location::getAllLocations();
        
        $post = Posts::find($id);
        $recentFivePosts = Posts::findRecentsPostsByUser($request, $post->user->id, 5); 
        $user_post = User::where('id', $post->user_id)->get();
        $imagesPost = Image::where('posts_id', $post->id)->get();
        $categories = Categories::all();
        return \view('posts/post_details', [
            'post' => $post,
            'imagesPost' => $imagesPost,
            'recentFivePosts' => $recentFivePosts,
            'user_post' => $user_post,
            'categories' => $categories,
            'locations' => $locations,
            'user' => $request->user()
        ]);
    }
    
    public function showPostsByCategory(int $categorynameId, Request $request)
    {
        $posts = new Posts;
        $locations = Location::getAllLocations();
        $postByCategories = Posts::orderBy($request->q, $posts->where('category_id', $categorynameId));      
        $postsByPages  = 7;
        $pages =   ceil($postByCategories->count() / $postsByPages);        
        $categories  = Categories::showCategories();        
        return view('posts/postsByCategories', [
            'postByCategories' => $postByCategories,
            'categories' => $categories,
            'pages' => $pages,
            'locations' =>  $locations
        ]);
    }

    public function showPostsByLocation(int $locationId, Request $request)
    {
        $ByLocation = Posts::with('user.sellerInformations.location')->whereHas('user.sellerInformations.location',  function  ($q)  Use ($locationId) {
            $q->where('id',  $locationId);
        });       
        $postByLocation = Posts::orderBy($request->q, $ByLocation);  
        dd($postByLocation);
        $locations = Location::getAllLocations();   
        $categories  = Categories::showCategories();
        return view('posts/postsByLocation', [
            'postByLocation' => $postByLocation,
            'categories' => $categories,
            'locations' =>  $locations
        ]);
    }

    public function search(Request $request, $tag)
    {
       
        $locations = Location::getAllLocations();
        $categories  = Categories::showCategories(); 
       if ($tag === 'simple') {
      
            $request->validate([
                "KeyWord" => ["min:5", "required"],
                
            ]);
            $KeyWord = $request->KeyWord;
            $result = Posts::orderBy($request->q, Posts::where('title', 'like', "%$KeyWord%")->orWhere('details', 'like', "%$KeyWord%"));
            return view('search', [
                'result' => $result,
                'categories' => $categories,
                'KeyWord' => $KeyWord,
                'locations' => $locations
            ]);
 
        } elseif ($tag === 'moreDetails') {
            
            $request->validate([
                "KeyWord" => ["min:5, 'required"],
                "location" => ['required'],
                "category" => ['required'],
            ]);
            $KeyWord = $request->KeyWord;
            $location = $request->location;
            $category = $request->category;
            $byKeyword = Posts::where('title', 'like', "%$KeyWord%")->orWhere('details', 'like', "%$KeyWord%");
            $ByLocation = $byKeyword->with('user.sellerInformations.location')->whereHas('user.sellerInformations.location',  function  ($q)  Use ($location) {
                $q->where('id',  $location);
            });
            $byCategorie = $ByLocation->where('category_id', (int)$category);
            $result = Posts::orderBy($request->q, $byCategorie);      
            return view('search', [
                            'result' => $result,
                            'categories' => $categories,
                            'KeyWord' => $KeyWord,
                            'locations' => $locations
                        ]);
        } else {
            abort('404');
        }
                            
                    
    }

    public function DeletePost(int $id)
    {
        $post  =  Posts::where('id', $id)->delete();
        return \redirect()->route('account');

    }
    public function UpdatePage(int $id, Request $request)
    {
        $locations = Location::getAllLocations();
        $post = Posts::where('id', $id)->get();
        $categories  = Categories::showCategories();
        $user = $request->user();
        return view('posts/update_post', [
            'categories' => $categories,
            'user' => $user,
            'locations' => $locations,
            'post' =>  $post
        ]);
    
    }
}
