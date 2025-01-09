<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_other_policies extends Model
{
    use HasFactory;

    public function executive()
    {
        return $this->belongsTo(Tbl_staffs::class, 'executive_id','user_id');
    }

    public function referred()
    {
        return $this->belongsTo(Tbl_referred_persons::class, 'referred_id','id');
    }

    public function provider()
    {
        return $this->belongsTo(Tbl_insurence_providers::class, 'provider_id','id');
    }

    public function policy_category()
    {
        return $this->belongsTo(Tbl_policy_categories::class, 'policy_category_id','id');
    }
}
