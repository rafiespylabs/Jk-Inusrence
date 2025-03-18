<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_jw_servicecodes extends Model
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

    public function hsn()
    {
        return $this->belongsTo(Tbl_jw_hsncodes::class, 'hsn_id','id');
    }
}
