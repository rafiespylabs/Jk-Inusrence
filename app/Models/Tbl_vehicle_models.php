<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_vehicle_models extends Model
{
    use HasFactory;
    public function added_user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }
}
