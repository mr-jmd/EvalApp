<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'Name',
        'Percentage_Completion',
        'created_at',
        'updated_at',
        'Contract_Id',
        'State_Id',
    ];
}
