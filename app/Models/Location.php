<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'company_id',
        'location_name',
        'email',
        'phone',
        'fax_num',
        'user_id',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip_code',
        'country',
        'added_by'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
