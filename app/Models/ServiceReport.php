<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceReport extends Model
{
    use HasFactory, SoftDeletes;

    const MODEL_START = 100000;

    const STATUS = [
        "signed" => 1,
        "send" => 2,
        "draft" => 3,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'signed_date' => 'date',
        'service_start' => 'datetime',
        'service_end' => 'datetime',
    ];
        
    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;
    
    /**
     * Set the service start datetime format.
     *
     * @param  string  $value
     * @return void
     */
    public function setServiceStartAttribute($value)
    {
        $this->attributes['service_start'] = empty($value) ? null : Carbon::make($value)->format('Y-m-d h:i:s');    
    }

    /**
     * Set the service end datetime format.
     *
     * @param  string  $value
     * @return void
     */
    public function setServiceEndAttribute($value)
    {
        $this->attributes['service_end'] = empty($value) ? null : Carbon::make($value)->format('Y-m-d h:i:s');
    }

    /**
     * Get the engineer user that is associated with the service report.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'engineer_id');
    }

    /**
     * Get the customer that is associated with the service report.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
