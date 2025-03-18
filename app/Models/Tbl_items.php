<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_items extends Model
{
    use HasFactory;
    
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function editedByUser()
    {
        return $this->belongsTo(User::class, 'edited_by', 'id');
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
    public function hsn_code()
    {
        return $this->belongsTo(Tbl_jw_hsncodes::class, 'hsn_code_id','id');
    }
    public function manufacturer()
    {
        return $this->belongsTo(Tbl_manufacturers::class, 'manufacturer_id','id');
    }
}
