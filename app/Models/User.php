<?php

namespace App\Models;

use App\Mail\ResetPasswordMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use App\Cat;
use App\Post;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name', 'city', 'email', 'password', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
   /* public function posts()
    {
        return $this->hasMany(Post::class, 'catsitter');
    }*/

    public function cats()
    {
        return $this->hasMany(Cat::class, 'catowner');
    }


    public function roles(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

/*public function addCat(Cat $cat)
    {
        $this->cats()->save($cat);
        return
    }*/



}




