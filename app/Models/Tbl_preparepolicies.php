<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_preparepolicies extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $createdAtColumn = 'createdAt';
    protected $updatedAtColumn = 'updatedAt';
    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }
    public function policy()
    {
        return $this->belongsTo(Tbl_policyholders::class, 'policy_id','id');
    }
    public function policy_category()
    {
        return $this->belongsTo(Tbl_policy_categories::class, 'policy_cat_id','id');
    }
}
