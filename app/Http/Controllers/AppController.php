<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Location;
use App\Models\Prenium;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Mail\AppMail;

class AppController extends Controller
{
    public function home(Request $request)
    {
        $categories  = Categories::showCategories();
        $prenium = [];
        $idprenium  = [];
        $p  = prenium::where('status', 'Top of page')->orWhere('status', 'Top of page + Urgent')->get();
        foreach ($p as $key => $value) {
            $idprenium[] = $value->posts_id;
        }        
        foreach (Posts::where('status', 'approved')->get() as $key => $value) {
            if (in_array($value->id, $idprenium)) {
                $prenium[] = $value;
            }

        }
        $heightRecentPosts = Posts::findRecentsPosts($request, 8);
        return view('home', [
            'categories' => $categories,
            'heightRecentPosts' => $heightRecentPosts,
            'prenium' => $prenium,
        ]);
    }
    public function about()
    {
        $locations = Location::getAllLocations();
        $categories  = Categories::showCategories();
        return view('about',[
            'categories' => $categories,
            'locations' =>  $locations
        ]);
    }
    public function contact()
    {
        $locations = Location::getAllLocations();
        $categories  = Categories::showCategories();
        return view('contact',[
            'categories' => $categories,
            'locations' =>  $locations
        ]);
    }
    public function saveEmailForBestOffers(Request $request)
    {
        $request->validate([
            "email" => ["required"]
        ]);
       $email = $request->email;
       file_put_contents('emails_bestOffers.txt', $email);
       return redirect('')->with('message', 'Your emails has been save');
    }
    public function admin()
    {
        return view('admin/views/index');
    }
    public function send_message()
    {
        Mail::to('yvanjordannguetse@yahoo.fr')->send(new AppMail());
        return back()->with('message', 'message send');
    }
   
}

