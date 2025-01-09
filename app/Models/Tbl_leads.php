<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_leads extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $createdAtColumn = 'createdAt';
    protected $updatedAtColumn = 'updatedAt';
    public function added_user()
    {
        return $this->belongsTo(User::class, 'added_by','id');
    }
    public function lead_source()
    {
        return $this->belongsTo(Tbl_leadsources::class, 'leadsource_id','id');
    }
    public function edited_user()
    {
        return $this->belongsTo(User::class, 'edited_by','id');
    }  
}
