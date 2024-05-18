<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $table = 'customers';
    protected $primaryKey = 'Id';
    protected $fillable = ['first_name','middle_name','last_name', 'user_id'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
