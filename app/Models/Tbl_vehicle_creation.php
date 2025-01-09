<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_vehicle_creation extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Tbl_vehicle_types::class, 'type_id','id');
    }
    public function brand()
    {
        return $this->belongsTo(Tbl_vehicle_brand::class, 'brand_id','id');
    }
    public function model()
    {
        return $this->belongsTo(Tbl_vehicle_model::class, 'model_id','id');
    }
}
