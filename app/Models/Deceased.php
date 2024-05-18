<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deceased extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $table = 'deceases';
    protected $primaryKey = 'id';
    protected $fillable = [ 'first_name','middle_name','last_name','block_id','lot_id','born_date','died_on','date_burial' ];
}

