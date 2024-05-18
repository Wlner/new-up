<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'maps';
    protected $primaryKey = 'id';
    protected $fillable = ['block_id', 'plot_number', 'occupant_name', 'occupant_age', 'occupant_date_of_birth', 'occupant_date_of_death'];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }
}
