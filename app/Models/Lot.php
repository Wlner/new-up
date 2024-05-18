<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'lots';
    protected $primaryKey = 'Id';
    protected $fillable = ['description'];
}
