<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    
    public $guarded = [];
    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = [ 'type','block','lot_code','target_completion','description','worker' ];
}
