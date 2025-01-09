<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_vehicle_repair extends Model
{
    use HasFactory;
    public function vehicle_number()
    {
        return $this->belongsTo(Tbl_vehicle_creation::class, 'vehicle_number_id','id');
    }
    public function staff()
    {
        return $this->belongsTo(Tbl_staffs::class, 'staff_user_id','user_id');
    }
}
