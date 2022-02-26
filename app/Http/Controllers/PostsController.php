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
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CategoriesController;

class PostsController extends Controller
{
    public function add_prenium_post(Request $request)
    {
        $locations = Location::getAllLocations();

        $categories  = Categories::showCategories();
        $user = $request->user();
        return view('posts/add_post_prenium', [
            'categories' => $categories,
            'user' => $user,
            'locations' => $locations
        ]);
    }
    public function add_free_post(Request $request)
    {
        $locations = Location::getAllLocations();

        $categories  = Categories::showCategories();
        $user = $request->user();
        return view('posts/add_free_post', [
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
        
            try {
                //enregistrement du post
                $post = new Posts();
                $post->category_id = (int)$request->input('categories_id');
                $post->title = $request->input('title');
                $post->details = $request->input("details");
                $post->type = $request->PostType[0];
                $post->price = str_replace(' ', '', $request->input("price"));
                $post->user_id = $request->user()->id;
                $price = 0;
                
                
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
                //payement
                


                //redirection
                return redirect("post/{$post->id}/details");
            }catch (\Throwable $errors) {
                dd($errors);
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
        if (Auth::check()) {
           $post->view  = $post->view + 1; 
           $post->save();
        }
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
            
            $KeyWord = $request->KeyWord ?? '';
            $location = $request->location ?? '';
            $category = $request->category ?? '';
            $result  = new Posts();
            if (isset($KeyWord) && !empty($KeyWord)) {
                $result = $result->where('title', 'like', "%$KeyWord%")->orWhere('details', 'like', "%$KeyWord%");
            }
            if (isset($location) && !empty($location)) {
                $result = $result->with('user.sellerInformations.location')->whereHas('user.sellerInformations.location',  function  ($q)  Use ($location) {
                    $q->where('id',  (int)$location);
                });
            }
            if (isset($category) && !empty($category)) {
                $result = $result->where('category_id', (int)$category);
            }
            
            
            $result = Posts::orderBy($request->q, $result);      
            return view('search', [
                            'result' => $result,
                            'categories' => $categories,
                            'KeyWord' => $KeyWord,
                            'locations' => $locations,
                            'data' => $request->query()
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
    public function featured($id, Request $request)
    {
        
        $post_id = $id;
        $locations = Location::getAllLocations();
        $categories  = Categories::showCategories();
        $request->session()->push('post_id', $post_id);
        return view('prenium',[
            'categories' => $categories,
            'locations' =>  $locations,
            'post_id' => $post_id
        ]);
        
    }
    public function payment ($amount, $status, Request $request)
    {
        $request_token = Http::post('https://demo.campay.net/api/token/', [
            "username" =>  "vaGVIwXzgNErXOL5LxE-Voyjp3fjJumS22Jn4HobQlZrsCrh1fsTG611Y43FFVvwxQIAS-3q-9McyzOCirIivg",
            "password" => "vrvj1lvTKfoCRFfwLPzBo1ZyM77r4LKRGQlyOQMaKB01x_fn9yydqV5aVdj-7jvMxZdUs_B4pAQs_rmYDZ07UA"
        ]);        
        $token   = $request_token->json()['token'];

        
        //request for obtain the payment links
        $reference = 'NY-ANNONCE-payment-by-campay-'.uniqid();
        $response = Http::withHeaders([
            'Authorization' => 'Token '.$token,
        ])->post('https://demo.campay.net/api/get_payment_link/', [
            'Authorization' => 'Token '.$token,
            "amount" => (int)$amount,
            "external_reference" => $reference,
            "currency" => "XAF",
            "redirect_url" => "http://localhost:8000/payement/status"
        ]);   
        if ($response->status() === 400) {
            return redirect()->back()->with('message', 'nous avons quelques problèmes veuillez réessayer plus tard');
        }
        $link = $response->json()['link'];
        $request->session()->push('status', $status);
        $request->session()->push('token', $token);
        return redirect($link);
    }

    public function status(Request $request)
    {
        $status = $request->session()->get('status');
        $token = $request->session()->get('token');
        $post_id = $request->session()->get('id');
        $reference = $request->reference;
        //request for obtain the sstatus
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token[0],
        ])->get('https://demo.campay.net/api/transaction/' . $reference . '/', [
            'Authorization' => 'Token ' . $token[0],
        ]);
        $request->session()->forget('token');

        if ($response->status() === 401) {
            return redirect('/account')->with('message', "we have many problems please try later");
        }
        
        $post = Posts::where('id', $post_id)->first();
        if ($response->json()['status'] === "SUCCESSFUL") {
            $prenium =  new Prenium();
            $prenium->id_posts =  $post->id;
            $prenium->status =  $status;
            if ($status === 'Urgent') {
                $post->priority = 15;
            }
            if ($status === 'Top of page') {
                $post->priority = 30;
            }
            $post->save();
            $prenium->save();
            $request->session()->forget('status');
            $request->session()->forget('id');
            return redirect("post/{$post_id}/details")->with('message', 'purchase of points successful !!');
        } elseif ($response->json()['status'] === "FAILED") {
            return redirect("/account")->with('message', "check the amount of your balance  and try again");
        }
    }

    
}
