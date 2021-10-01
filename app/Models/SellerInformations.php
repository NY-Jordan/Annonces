<?php

namespace App\Models;

use App\Models\User;
use App\Models\Posts;
use App\Models\Location;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SellerInformations extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mobile_phone1',
        'mobile_phone2',
        'location_id',
        'gender',
        'about_yourself',
        'user_id',
        'district',
        'sellerEmail'

    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }


}
