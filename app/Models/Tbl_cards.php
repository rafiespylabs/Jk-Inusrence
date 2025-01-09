<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_cards extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $createdAtColumn = 'createdAt';
    protected $updatedAtColumn = 'updatedAt';
    public function added_user()
    {
        return $this->belongsTo(User::class, 'created_by','id');
    }
}
