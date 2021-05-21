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
            1 => __('label.e_appraisal_my_record.form.radio.purpose_one'),
            2 => __('label.e_appraisal_my_record.form.radio.purpose_two')
        ];
    }

    public static function getAppraisalStatusList()
    {
        return [
            1 => __('label.e_appraisal_my_record.form.radio.level_option_one'),
            2 => __('label.e_appraisal_my_record.form.radio.level_option_two'),
            3 => __('label.e_appraisal_my_record.form.radio.level_option_three'),
            4 => __('label.e_appraisal_my_record.form.radio.level_option_four'),
            5 => __('label.e_appraisal_my_record.form.radio.level_option_five')
        ];
    }

    public static function getProgressStatusList()
    {
        return [
            1 => __('label.e_appraisal_my_record.form.radio.o_progress_one'),
            2 => __('label.e_appraisal_my_record.form.radio.o_progress_two'),
            3 => __('label.e_appraisal_my_record.form.radio.o_progress_three')
        ];
    }

    public static function getrecommendationOptionList()
    {
        return [
            1 => __('label.e_appraisal_my_record.form.radio.recommendation_one'),
            2 => __('label.e_appraisal_my_record.form.radio.recommendation_two')
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
