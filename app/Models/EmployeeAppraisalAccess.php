<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAppraisalAccess extends Model
{
    use HasFactory;

    /**
     * Get the parent of EmployeeAppraisalAcess model (NewEmployeeAppraisal or RegularEmployeeAppraisal).
     */
    public function accessible()
    {
        return $this->morphTo();
    }
}
