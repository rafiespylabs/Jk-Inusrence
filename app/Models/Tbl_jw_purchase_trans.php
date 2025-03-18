<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tbl_jw_purchase_trans extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo(Tbl_items::class, 'item_id', 'id');
    }
    public function batch()
    {
        return $this->belongsTo(Tbl_jw_batches::class, 'batch_id', 'id');
    }
    public function unit()
    {
        return $this->belongsTo(Tbl_jw_unit::class, 'unit_id', 'id');
    }
}
