<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_policyholders extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $createdAtColumn = 'createdAt';
    protected $updatedAtColumn = 'updatedAt';
    public function added_executive()
    {
        return $this->belongsTo(User::class, 'executive_id','id');
    }
    public function vehicle_model()
    {
        return $this->belongsTo(Tbl_vehicle_models::class, 'vehicle_model_id','id');
    }
    public function company()
    {
        return $this->belongsTo(Tbl_companies::class, 'company_id','id');
    }
    public function agent()
    {
        return $this->belongsTo(Tbl_agents::class, 'agent_id','id');
    }
    public function prepared_user()
    {
        return $this->belongsTo(User::class, 'prepared_user_id','id');
    }
    public function dealer()
    {
        return $this->belongsTo(Tbl_dealers::class, 'dealer_id','id');
    }
    public function payment_mode()
    {
        return $this->belongsTo(Tbl_payment_modes::class, 'payment_mode_id','id');
    }
    public function reffered()
    {
        return $this->belongsTo(Tbl_referred_persons::class, 'referred_id','id');
    }
    public function payments()
    {
        return $this->hasMany(Tbl_payments::class,'policy_id','id');
    }
}
