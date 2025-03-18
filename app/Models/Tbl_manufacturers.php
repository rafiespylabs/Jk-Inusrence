<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_manufacturers extends Model
{
    use HasFactory;

    public function addedByUser()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }

    public function editedByUser()
    {
        return $this->belongsTo(User::class, 'edited_by', 'id');
    }

}
