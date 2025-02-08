<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_items extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Tbl_jw_category::class, 'category_id','id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Tbl_jw_subcategory::class, 'subcategory_id','id');
    }
    public function unit()
    {
        return $this->belongsTo(Tbl_jw_unit::class, 'unit_id','id');
    }
}
