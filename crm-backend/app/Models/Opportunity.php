<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    //use HasFactory;
    protected $table='opportunities';
    //public $timestamps = false;
    protected $primaryKey = 'OpportunityId';
    protected $fillable = ['CustomerId','OpportunityName','Stage','Probability','CloseDate','Value','DateCreated','DateModified'];
}

