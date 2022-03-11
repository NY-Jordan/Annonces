<?php

namespace App\Models;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prenium extends Model
{
    use HasFactory;
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
    public function payment()
    {
        return $this->hasMany(Payment::class);
    }
}
