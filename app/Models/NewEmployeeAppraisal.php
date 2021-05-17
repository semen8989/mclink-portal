<?php

namespace App\Models;

use App\Models\EmployeeAppraisalAccess;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewEmployeeAppraisal extends Model
{
    use HasFactory;

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
     * Get all of the appraisal access data for the regular employee appraisal.
     */
    public function appraisalAccess()
    {
        return $this->morphMany(EmployeeAppraisalAccess::class, 'employee_appraisal_access');
    }
}
