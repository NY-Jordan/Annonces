<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posts;
use App\Models\Payment;
use App\Models\Prenium;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    // user
    public function index(Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $payments = Payment::all();
        $posts = Posts::all();
        $prenium = [];
        $idprenium  = [];
        $p  = prenium::all();
        foreach ($p as $key => $value) {
            $idprenium[] = $value->posts_id;
        }        
        foreach (Posts::all() as $key => $value) {
            if (in_array($value->id, $idprenium)) {
                $prenium[] = $value;
            }

        }
        $locations = Location::getAllLocations();
        $categories  = Categories::showCategories();
        $users  = User::all();
       return view('admin/index', [
           'datas_users' => $users,
           'datas_posts' => $posts,
           'locations' => $locations,
           'categories' => $categories,
           'prenium' => $prenium,
           'payments' => $payments
       ]);
    }

    public function add_user(Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'password' => 'required',
            'confirm_password' => 'required'
        ]);
        if ($request->password === $request->confirm_password) {
            $user =  new User();
            $user->name  =  $request->name;
            $user->email  = $request->email;
            $user->status = $request->status;
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
            $user->save();
            return back()->with('message', 'l\'ustilisteur à bien été enregistré');
        } else {
            return back()->with('message', 'Confirm password is not correct');
        }
       
        
        
    }
    public function delete_user($id, Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $user  = User::where('id', $id);
        $user->delete();
        return back()->with('message', 'utilisateur supprimé');
    }
    public function edit_user()
    {
        
    }
    //post

    public function posts(Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $posts = Posts::all();
        return view('admin/posts', [
            'datas' => $posts
        ]);
    }
    public function delete_post($id, Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $post  = Posts::where('id', $id);
        $post->delete();
        return back()->with('message', 'utilisateur supprimé');
    }
    public function disapproved($id, Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $post =  Posts::where('id', $id)->first();
        $post->status  = "not approved";
        $post->save();
        return back()->with('message', 'Operation succesfully');
    }
    public function approved($id, Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $post =  Posts::where('id', $id)->first();
        $post->status  = "approved";
        $post->save();
        return back()->with('message', 'Operation succesfully');
    }

    public function block($id, Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $user =  User::where('id', $id)->first();
        $user->status_connection = 'block';
        $user->save();
        return back()->with('message', 'Operation succesfully');
    }
    public function unblock($id, Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $user =  User::where('id', $id)->first();
        $user->status_connection = 'access';
        $user->save();
        return back()->with('message', 'Operation succesfully');
    }
    public function removePrenium($id, Request $request)
    {
        if ($request->user()->cannot('view', Auth::user())) {
            abort('401');
        }
        $prenium  = Prenium::where('posts_id', $id)->first();
        $prenium->delete();
        return back()->with('message', 'Operation succesfully');
    }

}
