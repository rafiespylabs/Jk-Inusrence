<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_loans extends Model
{
    use HasFactory;

    public function loan_type()
    {
        return $this->belongsTo(Tbl_loantypes::class, 'loan_type_id','id');
    }

    public function vehicle_category()
    {
        return $this->belongsTo(Tbl_vechicle_categories::class, 'vehicle_cat_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
