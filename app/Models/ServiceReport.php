<?php

namespace App\Models;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceReport extends Model
{
    use HasFactory, SoftDeletes;

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
