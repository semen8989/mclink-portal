<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesLead extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'tel_num',
        'address',
        'contact_person',
        'department',
        'mclink_base_reason',
        'mclink_base_model',
        'serial_number',
        'existing_brand',
        'non_mclink_base_model',
        'sales_manager',
        'approve_by'
    ];
}
