<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MachineRequest extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'model',
        'qty',
        'system',
        'cassette_no',
        'contract_period',
        'special_requirement',
        'company_name',
        'billing_address',
        'office_contact_no',
        'installation_address',
        'person_in_charge',
        'contact_no',
        'installation_date',
        'technician_id'
    ];
}
