<?php

namespace App\Models;

use App\Models\User;
use App\Models\Image;
use App\Models\Payment;
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
    public function prenium()
    {
        return $this->hasOne(Prenium::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    
    public function categories()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function getAll()
    {
        return Posts::where('status', 'approved');
    }

    public static function showPostsByUser(Request $request)
    {
        return Posts::where('user_id', $request->user()->id)->where('status', 'approved');
    }

    public static function findRecentsPostsByUser(Request $request, int $id, $number)
    {
        return Posts::where('user_id', $id)->where('status', 'approved')->orderByDesc('priority')->take($number)->get(); 
    }

    public static function findRecentsPosts(Request $request, int $number)
    {
        $posts =  Posts::where('status', 'approved')->orderByDesc('created_at')->take($number); 
        return $posts->orderByDesc('priority')->get();
    }

    public static function orderBy(String $parameter = null, $request)
    {
        if ($parameter === 'created_at' || $parameter === 'price' ) {
            $approved = $request->where('status', 'approved');
            $resultRequest  = $approved->orderByDesc($parameter);
        } else {
            $resultRequest = $request->where('status', 'approved');
        }
        $result  = $resultRequest->orderByDesc('priority')->orderByDesc('updated_at')->paginate(10);
        return $result;
    }
    public static function mostview()
    {
       return  $posts = Posts::all()->sortByDesc('view');
    }
}
