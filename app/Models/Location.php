<?php

namespace App\Models;

use App\Models\SellerInformations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    public function sellerInformations()
    {
        return $this->hasOne(SellerInformations::class);
    }
    public static function getAllLocations()
    {
        return Location::all();
    }
}
