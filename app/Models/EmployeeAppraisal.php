<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAppraisal extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'review_period_from' => 'date',
        'review_period_to' => 'date',
        'review_date' => 'date',
    ];

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

    /**
     * Get the employee that belongs to the employee appraisal.
     */
    public function employee()
    {
        return $this->belongsTo(User::class);
    }
}
