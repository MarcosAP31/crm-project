<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use HasFactory;
    protected $table='customers';
    //public $timestamps = false;
    protected $primaryKey = 'CustomerId';
    protected $fillable = ['CustomerId','FirstName','LastName','Email','Phone','Address','City','State','Country','PostalCode','DateCreated','DateModified'];
}

