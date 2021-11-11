<?php

namespace App\Models;

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

    protected $fillable = [
        'purpose',
        'pf_score',
        'qow_score',
        'wh_score',
        'jk_score',
        'bro_score',
        'qow_level',
        'wh_level',
        'jk_level',
        'bro_level',
        'qow_comment',
        'wh_comment',
        'jk_comment',
        'bro_comment',
        'overall_progress',
        'progress_comment',
        'recommendation',
        'final_comment',
    ];

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

}
