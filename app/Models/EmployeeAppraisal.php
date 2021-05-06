<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAppraisal extends Model
{
    use HasFactory;

    /**
     * Get the new employee appraisal associated with the employee appraisal.
     */
    public function newEmployeeAppraisal()
    {
        return $this->hasOne(NewEmployeeAppraisal::class);
    }

    /**
     * Get the regular employee appraisal associated with the employee appraisal.
     */
    public function regularEmployeeAppraisal()
    {
        return $this->hasOne(RegularEmployeeAppraisal::class);   
    }

    /**
     * Get the users that belong to the employee appraisal.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    } 
}
