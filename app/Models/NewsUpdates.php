<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsUpdates extends Model
{
    use HasFactory;
    protected $fillable = ['title','content','image','meta_title','meta_description','slug','meta_keyword'];
}
