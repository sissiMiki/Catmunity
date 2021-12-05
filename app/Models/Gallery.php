<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

        protected $fillable = ['beschreibung','image'];


        public function user(){
            return $this->belongsTo(User::class,'user_id','id');
    }
}
