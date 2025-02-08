<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tbl_credit_repayments extends Model
{
    use HasFactory;
    public function added_user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }
    public function credit_pay()
    {
        return $this->belongsTo(Tbl_creditcard_payments::class, 'credit_pay_id','id');
    }
}
