<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function serviceList()
    {
        return $this->hasOne(ServiceList::class, 'id', 'service_slug');
    }
}
