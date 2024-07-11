<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    //use HasFactory;
    protected $table='accounts';
    //public $timestamps = false;
    protected $primaryKey = 'AccountId';
    protected $fillable = ['AccountId','CustomerId','AccountName','Industry','AnnualRevenue','NumberOfEmployees','DateCreated','DateModified'];
}
