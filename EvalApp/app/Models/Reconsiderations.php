<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reconsiderations extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $table = 'reconsiderations';

    protected $fillable = [
     'name',
     'receptionDate',
     'responseDate',
     'id_status',
     'id_reconsiderationType',
     'id_appraisal',
    ];
}
