<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_vehiclepolicy_renews extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $createdAtColumn = 'createdAt';
    protected $updatedAtColumn = 'updatedAt';
    public function added_user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function payment_mode()
    {
        return $this->belongsTo(Tbl_payment_modes::class, 'payment_mode_id','id');
    }
    public function policy()
    {
        return $this->belongsTo(Tbl_policyholders::class, 'policy_id','id');
    }
}
