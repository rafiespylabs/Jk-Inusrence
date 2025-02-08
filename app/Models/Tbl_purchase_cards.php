<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_purchase_cards extends Model
{
    use HasFactory;
    public function added_user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }
    public function card()
    {
        return $this->belongsTo(Tbl_cards::class, 'card_id','id');
    }
    public function insurence_provider()
    {
        return $this->belongsTo(Tbl_insurence_providers::class, 'provider_id','id');
    }
    public function policy_category()
    {
        return $this->belongsTo(Tbl_policy_categories::class, 'policy_cat_id','id');
    }
}
