<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //use HasFactory;
    protected $table='tasks';
    //public $timestamps = false;
    protected $primaryKey = 'TaskId';
    protected $fillable = ['CustomerId','UserId','Taskescription','DueDate','Status','Priority','DateCreated','DateModified'];
}

