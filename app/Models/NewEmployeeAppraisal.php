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

    public static function getPurposeOptionList()
    {
        return [
            1 => __('label.global.form.select.all'),
            2 => __('label.global.form.select.first_quarter')
        ];
    }

    public static function getAppraisalStatusList()
    {
        return [
            1 => __('label.global.form.select.all'),
            2 => __('label.global.form.select.first_quarter'),
            3 => __('label.global.form.select.second_quarter'),
            4 => __('label.global.form.select.third_quarter'),
            5 => __('label.global.form.select.fourth_quarter')
        ];
    }

    public static function getProgressStatusList()
    {
        return [
            1 => __('label.global.form.select.all'),
            2 => __('label.global.form.select.first_quarter'),
            3 => __('label.global.form.select.second_quarter')
        ];
    }

    public static function getrecommendationOptionList()
    {
        return [
            1 => __('label.global.form.select.all'),
            2 => __('label.global.form.select.first_quarter')
        ];
    }

    /**
     * Get all of the appraisal access data for the new employee appraisal.
     */
    public function appraisalAccess()
    {
        return $this->morphMany(EmployeeAppraisalAccess::class, 'employee_appraisal_access');
    }
}
