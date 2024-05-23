<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dead extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'deads';
    protected $primaryKey = 'id';
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'dt_birth', 'dt_death','dt_burial','lot_id','user_id'];

    public function Lot(){
        return $this->belongsTo(Lot::class, 'lot_id', 'id');
    }

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
