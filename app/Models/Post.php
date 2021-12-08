<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'start_at', 'end_at', 'listing_price'];

    public function getAuthor()
    {
        return $this->belongsTo(User::class, 'author');
    }
}
