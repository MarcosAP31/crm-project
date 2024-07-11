<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //use HasFactory;
    protected $table='contacts';
    //public $timestamps = false;
    protected $primaryKey = 'ContactId';
    protected $fillable = ['CustomerId','FirstName','LastName','Email','Phone','Position','DateCreated','DateModified'];
}

