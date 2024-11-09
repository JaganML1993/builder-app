<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubServiceList extends Model
{
    use HasFactory;

    protected $table = 'sub_services_list';

    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(ServiceList::class, 'services_list_id', 'id');
    }
}
