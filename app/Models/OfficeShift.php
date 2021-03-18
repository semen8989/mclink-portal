<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfficeShift extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'shift_name',
        'monday_in_time',
        'monday_out_time',
        'tuesday_in_time',
        'tuesday_out_time',
        'wednesday_in_time',
        'wednesday_out_time',
        'thursday_in_time',
        'thursday_out_time',
        'friday_in_time',
        'friday_out_time',
        'saturday_in_time',
        'saturday_out_time',
        'sunday_in_time',
        'sunday_out_time',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
