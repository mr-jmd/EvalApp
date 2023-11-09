<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apparaisal extends Model
{
    use HasFactory;

    protected $table = 'apparaisal';

    protected $filatable = [
     'id',
     'consecutive',
     'address',
     'id_project',
     'id_contractor',
     'id_city',
     'created_at',
     'updated_at',

    ];
}
