<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //use HasFactory;
    protected $table='leads';
    //public $timestamps = false;
    protected $primaryKey = 'LeadId';
    protected $fillable = ['CustomerId','LeadSource','LeadStatus','EstimatedValue','DateCreated','DateModified'];
}

