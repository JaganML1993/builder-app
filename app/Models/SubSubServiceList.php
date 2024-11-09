<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSubServiceList extends Model
{
    use HasFactory;

    protected $table = 'sub_sub_services_list';

    protected $guarded = [];

    public function subService()
    {
        return $this->belongsTo(SubServiceList::class, 'sub_services_list_id', 'id');
    }
    public function service()
    {
        return $this->belongsTo(ServiceList::class, 'services_list_id', 'id');
    }
}
