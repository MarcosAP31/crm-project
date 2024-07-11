<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //use HasFactory;
    protected $table='activities';
    //public $timestamps = false;
    protected $primaryKey = 'ActivityId';
    protected $fillable = ['ActivityId','CustomerId','ContactId','ActivityType','Subject','Description','StartDate','EndDate','DateCreated','DateModified'];
}
