<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_multi_expenses extends Model
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
    public function type()
    {
        return $this->belongsTo(Tbl_expense_types::class, 'type_id','id');
    }
    public function business_catogory()
    {
        return $this->belongsTo(Tbl_business_category::class, 'business_catogory_id','id');
    }
    public function branch()
    {
        return $this->belongsTo(Tbl_branches::class, 'branch_id','id');
    }
}
