<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDead extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'customer_deads';
    protected $primaryKey = 'Id';
    protected $fillable = ['customer_id', 'dead_id'];

    public function Customer(){
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function Dead(){
        return $this->belongsTo(Dead::class, 'dead_id', 'id');
    }
}
