<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tbl_healthpolicy_renews extends Model
{
    use HasFactory;
    public function added_user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }
    public function payment_mode()
    {
        return $this->belongsTo( Tbl_payment_modes::class, 'payment_mode_id','id');
    }
}
