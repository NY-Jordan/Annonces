<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public $successUpdateInformations = false;
    
    public function account(Request $request)
    {
        $locations = Location::getAllLocations();
        $categories  = Categories::showCategories();
        $posts  = Posts::orderBy($request->q, Posts::showPostsByUser($request)) ;
        $user = $request->user();
        return view('my_account', [
            'posts' => $posts,
            'user' =>  $user,
            'categories' => $categories,
            'locations' =>  $locations,
            'successUpdateInformations'=> $this->successUpdateInformations
        ]);
    }
    public function updateInformations(Request $request)
    {
        try {
            $user = $request->user();
            $user->first_name = isset($request->Fisrt_name) ? $request->Fisrt_name : $user->first_name ;
            $user->last_name = isset($request->Last_name) ? $request->Last_name : $user->last_name ;
            $user->email = isset($request->email) ? $request->email : $user->email;
            if (password_verify($request->Current_Password, $request->user()->password)) {
                if ($request->New_Password === $request->Confirm_Password) {
                    $user->password =   isset($request->Confirm_Password) ? \password_hash($request->Confirm_Password, PASSWORD_DEFAULT) : $request->user()->password ; 
                    $this->successUpdateInformations = true;
                    $user->save();
                    $request->session()->flash('message', 'your informations has been update');
                    return redirect("/account" )->with('message', 'your informations has been update');
                }               
            }
            $this->successUpdateInformations = true;
            $user->save();
            return  redirect()->route('account') ;             
        } catch (\Throwable $th) {
            dd($th);
        }

    }
}