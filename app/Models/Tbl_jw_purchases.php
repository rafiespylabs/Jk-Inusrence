<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_jw_purchases extends Model
{
    use HasFactory;
    public function added_user()
    {
        return $this->belongsTo(User::class, 'createdby', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(Tbl_supplier::class, 'supplier_id', 'id');
    }
}
