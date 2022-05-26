<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Location;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\SellerInformations;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Categories::all();
        $locations = Location::all();
        return view('auth.register',[
            'categories' => $categories,
            'locations' => $locations
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        if (!empty($request->all()['gender'])) {
            $request->validate([
                'gender' => ['required'] 
            ]);
        }   

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_phone1' => 'required|max:9',
            'about_yourself' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required',  Rules\Password::defaults()],
            'district' => ['required'],
            'location_id' => ['required']
        ]);
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);        
        
        $sellerInformations = SellerInformations::create([
            'mobile_phone1' => (int)$request->mobile_phone1,
            'mobile_phone2' => (int)$request->mobile_phone2,
            'location_id' => $request->location_id,
            'district' => $request->district,
            'gender' => $request->gender[0],
            'sellerEmail' => $request->email,
            'about_yourself' => $request->about_yourself,
            'user_id' => $user->id
        ]);
        event(new Registered($user));
        Auth::login($user);
        $sellerInformations->save();
         
        return \redirect('/account')->with('message', 'Félécitations, vous avez reussis la creation de votre compte ✔ vous avez réçu 25 points bonus comme cadeaux ');
    }
}
