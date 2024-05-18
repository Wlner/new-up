<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;


    public $guarded = [];
    protected $table = 'visitors';
    protected $primaryKey = 'id';
    protected $fillable = [ 'first_name','middle_name','last_name','contact_number' ];
}