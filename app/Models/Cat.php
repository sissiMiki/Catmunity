<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = ['name','breed','gender','age','details','user_id'];

    public $timestamps = false;

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');

    }

}


    // public function getCatowner()
    // {
    //     return $this->belongsTo(User::class, 'catOwner');
    // }


