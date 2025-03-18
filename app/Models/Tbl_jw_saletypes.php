<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_jw_saletypes extends Model
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

}
