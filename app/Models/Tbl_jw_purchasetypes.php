<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_jw_purchasetypes extends Model
{
    use HasFactory;

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'createdby', 'name');
    }

    public function editedByUser()
    {
        return $this->belongsTo(User::class, 'editedby', 'name');
    }
}
