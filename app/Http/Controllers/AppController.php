<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;

class AppController extends Controller
{
    public function home(Request $request)
    {
        $categories  = Categories::showCategories();
        $heightRecentPosts = Posts::findRecentsPosts($request, 8);
        $mostview = Posts::mostview();
        return view('home', [
            'categories' => $categories,
            'heightRecentPosts' => $heightRecentPosts,
            'mostview' => $mostview,
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
       file_put_contents('emails_bestOffers.txt', 'yvanjordannguetse@yahoo.fr');
       return redirect('');
    }
    public function admin()
    {
        return view('admin/views/index');
    }
   
}

