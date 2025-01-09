<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_tool_company extends Model
{
    use HasFactory;

    public function district()
    {
        return $this->belongsTo(Tbl_districts::class, 'district_id','id');
    }

    public function state()
    {
        return $this->belongsTo(Tbl_states::class, 'state_id','id');
    }
}
