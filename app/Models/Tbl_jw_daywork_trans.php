<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Tbl_jw_daywork_trans extends Model
{
    use HasFactory;
    public function addedByUser()
    {
        return $this->belongsTo(User::class, 'added_by', 'id');
    }
    public function editedByUser()
    {
        return $this->belongsTo(User::class, 'edited_by', 'id');
    }
    public function payment_mode()
    {
        return $this->belongsTo(Tbl_payment_modes::class, 'payment_mode_id', 'id');
    }
    public function care_of_person()
    {
        return $this->belongsTo(Tbl_jw_careof_persons::class, 'care_of_person_id', 'id');
    }
    public function excutive()
    {
        return $this->belongsTo(User::class, 'executive_id', 'id');
    }
}
