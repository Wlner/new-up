<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Burial extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $table = 'burials';
    protected $primaryKey = 'id';
    protected $fillable = [ 'first_name','middle_name','last_name','block','lot_code','date_birth','date_death','date_burial'];
}