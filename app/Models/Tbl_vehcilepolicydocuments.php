<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tbl_vehcilepolicydocuments extends Model
{
    use HasFactory;
    protected $fillable = [
        'policy_id',
        'title',
        'description',
        'link',
        'added_by',
        'added_date',
    ];
    public function added_user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }
}
