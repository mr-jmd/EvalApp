<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;

    protected $table = 'contractor';
    
    protected $fillable = [
        'id',
        'name',
        'phone', 
        'email', 
    ];
}
