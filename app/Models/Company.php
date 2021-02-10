<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_name',
        'company_type',
        'trading_name',
        'registration_no',
        'contact_number',
        'email',
        'website',
        'username',
        'password',
        'xin_gtax',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip_code',
        'country',
        'logo',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);    
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }
}
