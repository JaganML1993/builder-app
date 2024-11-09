<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    use HasFactory;

    protected $fillable = [

        'icnumber',
        'name',
        'position',
        'total_board_of_meeting',
        'content',
        'image',
        'company_name1',
        'activities1',
        'company_name2',
        'activities2',
        'company_name3',
        'activities3',
        'company_name4',
        'activities4',
        'company_name5',
        'activities5',

    ];
}
