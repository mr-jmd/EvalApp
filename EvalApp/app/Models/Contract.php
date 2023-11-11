<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contract';

    protected $fillable = [
        'Contract_Number',
        'Proposal_Number',
        'Approval_Date',
        'Delivery_Date',
        'Days_Due',
        'Scope',
        'Contract_Value',
        'Document_URL',
        'created_at',
        'updated_at',
        'Business_Line_Id',
        'Customer_Id',
        'State_Id',
    ];
}
