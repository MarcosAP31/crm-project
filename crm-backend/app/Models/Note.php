<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //use HasFactory;
    protected $table='notes';
    //public $timestamps = false;
    protected $primaryKey = 'NoteId';
    protected $fillable = ['CustomerId','UserId','NoteText','DateCreated','DateModified'];
}

