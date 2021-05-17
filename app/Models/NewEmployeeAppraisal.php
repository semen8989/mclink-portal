<?php

namespace App\Models;

use App\Models\EmployeeAppraisalAccess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewEmployeeAppraisal extends Model
{
    use HasFactory;

    const STATUS = [
        1 => 'Outstanding',
        2 => 'Exceeds Requirements',
        3 => 'Meets Requirements',
        4 => 'Needs Improvement',
        5 => 'Unsatisfactory',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_new_appraisals';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get all of the appraisal access data for the new employee appraisal.
     */
    public function appraisalAccess()
    {
        return $this->morphMany(EmployeeAppraisalAccess::class, 'employee_appraisal_access');
    }
}
