<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceList extends Model
{
    use HasFactory;

    protected $table = 'services_list';

    protected $guarded = [];

    public function serviceList()
    {
        return $this->hasMany(SubServiceList::class);
    }
}
