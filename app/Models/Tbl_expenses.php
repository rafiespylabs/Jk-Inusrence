<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_expenses extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo(Tbl_expense_types::class, 'type_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
