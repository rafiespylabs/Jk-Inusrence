<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_jw_subcategory extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Tbl_jw_category::class, 'cat_id','id');
    }
}
