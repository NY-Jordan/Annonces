<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    public function posts()
    {
        return $this->hasMany(Posts::class, 'category_id');
    }
    public function number_posts($id)
    {
        return Posts::where('status', 'approved')->where('category_id', $id)->count();
    }

    public static  function showCategories()
    {
        $categories = Categories::all();
        return $categories;
    }
}
