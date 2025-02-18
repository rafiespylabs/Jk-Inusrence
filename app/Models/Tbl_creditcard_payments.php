<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_creditcard_payments extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $createdAtColumn = 'createdAt';
    protected $updatedAtColumn = 'updatedAt';
    public function added_user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function card()
    {
        return $this->belongsTo(Tbl_cards::class, 'card_id','id');
    }
    public function provider()
    {
        return $this->belongsTo(Tbl_insurence_providers::class, 'provider_id','id');
    }
}
