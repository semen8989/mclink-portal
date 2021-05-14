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
        'location_head',
        'address_1',
        'address_2',
        'city',
        'state',
        'zip_code',
        'country',
        'current_user_id'
    ];

    public function locationHeadUser()
    {
        return $this->hasOne(User::class,'id','location_head');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function addedByUser()
    {
        return $this->hasOne(User::class,'id','current_user_id');
    }
}
