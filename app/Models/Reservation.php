<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $table = 'reservations';
    protected $primaryKey = 'id';
    protected $fillable = ['Burial_name','date_birth','date_death','date_burial','family_contact_person','phone_number'];
}
