<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_payments extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $createdAtColumn = 'createdAt';
    protected $updatedAtColumn = 'updatedAt';
    public function added_user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }
    public function payment_mode()
    {
        return $this->belongsTo(Tbl_payment_modes::class, 'payment_mode_id','id');
    }
    public function card()
    {
        return $this->belongsTo(Tbl_cards::class, 'card_id','id');
    }
    public function insurence_provider()
    {
        return $this->belongsTo(Tbl_insurence_providers::class, 'provide_id','id');
    }
}
