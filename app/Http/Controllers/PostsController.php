<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Image;
use App\Models\Posts;
use App\Models\Payment;
use App\Models\Prenium;
use App\Models\Location;
use App\Models\Categories;
use App\Models\Show_phone;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Crypt;
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
                if (!empty($request->Payement)) {
                    $request->session()->push('url', $request->url());
                    $request->session()->push('id', $post->id);
                    if ($request->Payement[0] === URGENT) {
                        return redirect('/Featured/10/'.$request->Payement[0]);
                    }elseif ($request->Payement[0] === TOP_OF_PAGE) {
                        return redirect('/Featured/20/'.$request->Payement[0]);
                    }elseif ($request->Payement[0] === TOP_OF_PAGE_URGENT) {
                        return redirect('/Featured/30/'.$request->Payement[0]);
                    }
                    
                }
                /*  */
                //redirection
                return redirect("post/{$post->id}/details")->with('message', 'Enregistrement reussis ✔ . votre Annonce sera mis en ligne après verification des Administrateurs');
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
        $see_phone = false;
        
        if (Auth::check()) {
            $show_phone = Show_phone::where('user_id', Auth::user()->id)->where('post_id', $post->id)->get();
            if (!$show_phone->isEmpty()) {
                $see_phone = true;
            }
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
            'user' => $request->user(),
            'see_phone' => $see_phone,
        ]);
    }
    
    public function showPostsByCategory(string $categorynameId, Request $request)
    {
        $categorynameId = Crypt::decrypt($categorynameId); 
        $posts = new Posts;
        $locations = Location::getAllLocations();
        $postByCategories = Posts::orderBy($request->q, $posts->where('category_id', $categorynameId));      
        $postsByPages  = 7;
        $pages =   ceil($postByCategories->count() / $postsByPages);        
        $categories  = Categories::showCategories();       
        $categorie =   Categories::find($categorynameId);
        return view('posts/postsByCategories', [
            'postByCategories' => $postByCategories,
            'categories' => $categories,
            'pages' => $pages,
            'locations' =>  $locations,
            'categorie' => $categorie
        ]);
    }

    public function showPostsByLocation(string $locationId, Request $request)
    {
        $locationId = Crypt::decrypt($locationId); 
        $ByLocation = Posts::with('user.sellerInformations.location')->whereHas('user.sellerInformations.location',  function  ($q)  Use ($locationId) {
            $q->where('id',  $locationId);
        });       
        $postByLocation = Posts::orderBy($request->q, $ByLocation);  
        $locations = Location::getAllLocations();   
        $categories  = Categories::showCategories();
        $location = Location::find($locationId);
        return view('posts/postsByLocation', [
            'postByLocation' => $postByLocation,
            'categories' => $categories,
            'locations' =>  $locations,
            'location' =>  $location
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
    public function getNumber( Request $request)
    {
        $id = $request->id;
        try {
            if (Auth::user()->bonus_points === 0) {
                if (Auth::user()->points >= 5) {
                    $user = User::find(1);
                    $user->points = $user->points - 5 ;
                    Show_phone::CreateNew(Auth::user()->id, $id, "Get contact of post ".Posts::find($id)->title);
                    $user->save();
                    return ["message" => "operation reussi ✔"];
                } else {
                    return ["message" => "<p style = 'color:red; margin-bottom: 00px;'>Echec de l'operation ✖  </p>  <p> nombre de points insuffisant </p> <br>  <a href='' data-toggle='modal' data-target='#points'>Vous pouvez acheter des points ici </a>"];
                }
                
            } else {
                if (Auth::user()->bonus_points >= 5) {
                    $user = User::find(Auth::user()->id);
                    $user->bonus_points = $user->bonus_points - 5 ;
                    Show_phone::CreateNew(Auth::user()->id, $id, "Get contact of post ".Posts::find($id)->title);
                    $user->save();
                    return ['message' => "operation reussi ✔"];
                } else { 
                    return ["message" => "<p style = 'color:red; margin-bottom: 00px;'>Echec de l'operation ✖  </p>  <p> nombre de points insuffisant </p>  <a href=''>Vous pouvez acheter des points ici </a>"];
                }
                
            }
        } catch (\Throwable $th) {
            return $th;
        }
        
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

    public function paymentPoints($amount, $points, $status, Request $request)
    {
        try {
            $trueAmount =  (isset($amount) && !empty($amount)) ? $amount : $request->amount;
            $trueStatus =  (isset($status) && !empty($status)) ? $status : $request->status;
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
                "amount" => (int)$trueAmount,
                "external_reference" => $reference,
                "currency" => "XAF",
                "redirect_url" => "https://nyannonce/payement/status/points"
            ]);   

            if ($response->status() === 400) {
                return back()->with('message',"nous avons quelques problèmes veuillez réessayer plus tard");              
            }
            $link = $response->json()['link'];
            $request->session()->push('id_user', Auth::user()->id);
            $request->session()->push('status', $trueStatus);
            $request->session()->push('points', $points);
            $request->session()->push('token', $token);
            $request->session()->push('amount', $trueAmount);
            return redirect($link);
        } catch (\Throwable $th) {
            return back()->with('message',"nous avons quelques problèmes veuillez réessayer plus tard");              
        }
        
    } 
    public function statusPoints(Request $request)
    {
        try {
        $status = $request->session()->get('status');
        $token = $request->session()->get('token');
        $points = $request->session()->get('points');
        $post_id = $request->session()->get('post_id');
        $user_id = $request->session()->get('id_user');
        $amount = $request->session()->get('amount');
        $reference = $request->reference;
        //request for obtain the sstatus
        $response = Http::withHeaders([
            'Authorization' => 'Token ' . $token[0],
        ])->get('https://demo.campay.net/api/transaction/' . $reference . '/', [
            'Authorization' => 'Token ' . $token[0],
        ]);
        $request->session()->forget('token');

        if ($response->status() === 401) {
            return redirect('/account')->with('message', "echec de l'operation, nous avons un problème veuillez reesayer plus tard ");
        }
        
        $post = Posts::where('id', $post_id)->first();
        if ($response->json()['status'] === "SUCCESSFUL") {
            $user = User::where('id',$user_id)->first();
            $user->points += (int)$points[0];
            $transactions = new Transaction();
            $transactions->amount = (int)$amount[0];
            $transactions->reason = "Achat de  points";
            $transactions->user_id = (int)$user_id[0];
            $user->save();
            $transactions->save();
            $request->session()->forget('status');
            $request->session()->forget('post_id');
            $request->session()->forget('points');
            $request->session()->forget('amount');
            $request->session()->forget('id_user');
            $request->session()->forget('token');
            return redirect('/account')->with('message', 'Achat de points reussis');
        } elseif ($response->json()['status'] === "FAILED") {
            return redirect("/account")->with('message', "echec de l'operation, veuillez verifiez le montant de votre compte et reesayer");
        }
        } catch (\Throwable $th) {
            dd($th);
        }
        
    } 
    public function suscribePrenium(Request $request)
    {
        $amount = $request->forfait;
        $status = $request->status;
        return $this->payment((int)$amount, $status, $request);
    }
    public function payment($amount, $status, Request $request)
    {
        try {
            $trueAmount =  (isset($amount) && !empty($amount)) ? $amount : $request->forfait;
            $trueStatus =  (isset($status) && !empty($status)) ? $status : $request->status;
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
                "amount" => (int)$trueAmount,
                "external_reference" => $reference,
                "currency" => "XAF",
                "redirect_url" => "https://nyannonce.com/payement/status"

            ]);   

            if ($response->status() === 400) {
                return back()->with('message',"nous avons quelques problèmes veuillez réessayer plus tard");              
            }
            $link = $response->json()['link'];
            $request->session()->push('status', $trueStatus);
            $request->session()->push('token', $token);
            return redirect($link);
        } catch (\Throwable $th) {
            return back()->with('message',"nous avons quelques problèmes veuillez réessayer plus tard");              
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
            

            
            
            if ($status === URGENT) {
                $post->priority = 15;
            }
            if ($status === TOP_OF_PAGE) {
                $post->priority = 30;
            }
            if ($status === TOP_OF_PAGE_URGENT) {
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
            $user = User::where('id', $payment->user_id)->first();
            $user->bonus_points = $user->bonus_points + 15;
            $user->save(); 
            
            $request->session()->forget('status');
            $request->session()->forget('post_id');
            return redirect()->route('postDetails', $post->id)->with('message', 'your ad has been brought to the foreground successfully');
        } elseif ($response->json()['status'] === "FAILED") {
            return redirect("/account")->with('message', "check the amount of your balance  and try again");
        }
        } catch (\Throwable $th) {
            return back()->with('message', "check the amount of your balance  and try again");
        }
        
    } 
}
