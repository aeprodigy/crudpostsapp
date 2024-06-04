<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //specifies which attributes (title, body, user_id) can be mass-assigned, enhancing security by preventing mass assignment vulnerabilities.
    protected $fillable = ['title', 'body', 'user_id'];


}
