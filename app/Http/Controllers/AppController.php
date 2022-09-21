<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\AppMail;
use App\Models\Posts;
use App\Models\Prenium;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoriesController;
use App\Models\EmailBestOffers;

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
        try {
            $request->validate([
                "email" => ["required"]
            ]);
            $email = $request->email;
            EmailBestOffers::create([
                'email' => $email
            ]);
            return redirect('')->with('message', 'Votre email à été enregistrés avec success');
        } catch (\Throwable $th) {
            return redirect('')->with('message', 'Une erreur est survenue veuillez reesayer plus tard');
        }
    }
    public function admin()
    {
        return view('admin/views/index');
    }
    public function send_message()
    {
        try {
            Mail::to('yvanjordannguetse@yahoo.fr')->send(new AppMail());
            return back()->with('message', 'message envoyer');
        } catch (\Throwable $th) {
            return back()->with('message', 'Une erreur est survenue veuillez reesayer plustard');
        }
        
    }
    public function verification()
    {
        $date = date_add(now(), date_interval_create_from_date_string("5 day"));
        dd($date);
        $prenium  = Prenium::all();
        foreach ($prenium as $key => $item) {
            if ($item->validity <  now()) {
                dd('yvan');
                $item->delete();
            }
        }

        $users  = User::all();
        foreach ($users as $key => $item) {
            if ($item->validity_bonus_points < now()) {
                $item->bonus_points = 0;
            } elseif ($item->validity_points <  now()) {
                $item->points = 0;
            }
            $item->save();
        }
    }
   
}

