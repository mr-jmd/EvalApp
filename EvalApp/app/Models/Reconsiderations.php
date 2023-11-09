<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconsiderations extends Model
{
    use HasFactory;

    protected $table = 'reconsiderations';

    protected $filatable = [
     'id',
     'name',
     'receptionDate',
     'id_status',
     'id_reconsiderationType',
     'id_appraisal',

    ];
}
