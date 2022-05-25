<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show_phone extends Model
{
    use HasFactory;
    public static function CreateNew($idUser, $idPost, $status)
    {
        try {
            $show_phone = new Show_phone();
            $show_phone->user_id = $idUser;
            $show_phone->post_id = $idPost;
            $show_phone->statut = $status;
            $show_phone->save();
        return true;
        } catch (\Throwable $th) {
            return false;
        }
        
    }
}
