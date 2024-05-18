<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dead extends Model
{
    use HasFactory;
    use HasFactory;
    public $guarded = [];
    protected $table = 'deads';
    protected $primaryKey = 'Id';
    protected $fillable = ['first_name', 'middle_name', 'last_name', 'dt_birth', 'dt_death', 'lot_id'];

    public function Lot(){
        return $this->belongsTo(Lot::class, 'lot_id', 'id');
    }
}
