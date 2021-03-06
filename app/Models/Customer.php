<?php

namespace App\Models;

use App\Models\ServiceReport;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Get the service reports that owns the customer.
     */
    public function servicereports()
    {
        return $this->hasMany(ServiceReport::class);
    }
}
