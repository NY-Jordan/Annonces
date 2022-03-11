<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Models\Posts;
use App\Models\Prenium;
use App\Models\Payment;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Gate;

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
                if (!empty($request->Payement)) {
                    $request->session()->push('url', $request->url());
                    $request->session()->push('id', $post->id);
                    if ($request->Payement[0] === 'Urgent') {
                        return redirect('/Featured/10/'.$request->Payement[0]);
                    }elseif ($request->Payement[0] === 'Top of page') {
                        return redirect('/Featured/20/'.$request->Payement[0]);
                    }elseif ($request->Payement[0] === 'Top of page + Urgent') {
                        return redirect('/Featured/30/'.$request->Payement[0]);
                    }
                    
                }
                /*  */
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
                'locations' => $locations,
                'data' => $request->query()
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

    public function DeletePost(int $id, Request $request)
    {
        
        $post  =  Posts::where('id', $id);
        if ($request->user()->cannot('delete', $post)) {
            abort('401');
        }
        $post->delete();
        return \redirect()->route('account');

    }

    public function UpdatePage(int $id, Request $request)
    {
        
        $locations = Location::getAllLocations();
        $post = Posts::where('id', $id)->first();
        if ($request->user()->cannot('delete', $post)) {
            abort('401');
        }
        if (!$request->user()->can('update', $post)) {
            abort(403);
        }
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
    public function payment($amount, $status, Request $request)
    {
        try {
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
        } catch (\Throwable $th) {
            return back()->with('message', 'nous avons quelques problème! veuillez reesayer plus tard. si le problème preciste veuillez contacter notre service client au 697843152');
        }
        
    }

    public function status(Request $request)
    {
        try {
        $status = $request->session()->get('status');
        $token = $request->session()->get('token');
        $post_id = $request->session()->get('post_id');
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
            $prenium->posts_id =  $post->id;
            $prenium->status =  $status[0];
            
            
            if ($status === 'Urgent') {
                $post->priority = 15;
            }
            if ($status === 'Top of page') {
                $post->priority = 30;
            }
            if ($status === 'Top of page + Urgent') {
                $post->priority = 45;
            }
            $post->save();
            $prenium->save();
            $payment = new Payment();
            $payment->posts_id = $post->id;
            $payment->prenium_id = $prenium->id;
            $payment->montant = $response->json()['amount'];
            $payment->user_id = Auth::user()->id;
            $payment->save();
            $request->session()->forget('status');
            $request->session()->forget('post_id');
            return redirect()->route('postDetails', $post->id)->with('message', 'purchase of points successful !!');
        } elseif ($response->json()['status'] === "FAILED") {
            return redirect("/account")->with('message', "check the amount of your balance  and try again");
        }
        } catch (\Throwable $th) {
            dd($th);
        }
        
    } 
}
