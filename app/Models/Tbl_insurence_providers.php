<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_insurence_providers extends Model
{
    use HasFactory;
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
