<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_jw_openingstocks extends Model
{
    use HasFactory;

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'name');
    }

    public function editedByUser()
    {
        return $this->belongsTo(User::class, 'edited_by', 'name');
    }

    public function item()
    {
        return $this->belongsTo(Tbl_items::class, 'item_id','id');
    }

    public function batch()
    {
        return $this->belongsTo(Tbl_jw_batches::class, 'batch_id','id');
    }

    public function stocktype()
    {
        return $this->belongsTo(Tbl_jw_stocktypes::class, 'stocktype_id','id');
    }
}
