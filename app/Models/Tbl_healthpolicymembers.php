<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_healthpolicymembers extends Model
{
    use HasFactory;
    public function added_user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }
}
