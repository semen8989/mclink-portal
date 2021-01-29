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

    const STATUS = [
        "send" => 1,
        "save" => 2,
        "draft" => 3,
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
        $this->attributes['service_start'] = Carbon::parse($value)->format('Y-m-d h:i:s');
    }

    /**
     * Set the service end datetime format.
     *
     * @param  string  $value
     * @return void
     */
    public function setServiceEndAttribute($value)
    {
        $this->attributes['service_end'] = Carbon::parse($value)->format('Y-m-d h:i:s');
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
