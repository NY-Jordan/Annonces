<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\SellerInformations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Posts extends Model
{
    use HasFactory;

    protected $with = ['user'];

    public function image()
    {
        return $this->hasOne(Image::class);
    }
    
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getAll(Type $var = null)
    {
        return Posts::all();
    }

    public static function showPostsByUser(Request $request)
    {
        return Posts::where('user_id', $request->user()->id);
    }

    public static function findRecentsPostsByUser(Request $request, int $id, $number)
    {
        return Posts::where('user_id', $id)->orderByDesc('updated_at')->take($number)->get(); 
    }

    public static function findRecentsPosts(Request $request, int $number)
    {
        return Posts::all()->sortByDesc('id')->take($number); 
    }

    public static function orderBy(String $parameter = null, $request)
    {
        if ($parameter === 'created_at' || $parameter === 'price' ) {
            $resultRequest  = $request->orderByDesc($parameter)->paginate(6);
        } else {
            $resultRequest = $request->paginate(6);
        }
         return $resultRequest;
    }
}
