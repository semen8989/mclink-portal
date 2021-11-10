<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesLead extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS = [
        'unassigned' => 0,
        'on-going' => 1,
        'unsuccessful' => 2,
        'successful' => 3
    ];

    protected $fillable = [
        'user_id',
        'company_name',
        'tel_num',
        'address',
        'contact_person',
        'department',
        'mclink_base_reason',
        'mclink_base_model',
        'serial_number',
        'valid_until',
        'existing_brand',
        'non_mclink_base_model',
        'assigned_sales',
        'status',
        'reason',
        'model_closed_and_qty',
        'amount_payable',
        'sales_manager',
        'approve_by',
        'is_approved'
    ];

    public function assignedSalesUser(){
        return $this->hasOne(User::class,'id','assigned_sales');
    }

    public function salesManagerUser(){
        return $this->hasOne(User::class,'id','sales_manager');
    }

    public function createdByUser(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
