<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegularEmployeeAppraisal extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_regular_appraisals';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    protected $fillable = [
        'jks_score1',
        'jks_score2',
        'jks_score3',
        'aos_score1',
        'aos_score2',
        'aos_score3',
        'qow_score1',
        'qow_score2',
        'qow_score3',
        'its_score1',
        'its_score2',
        'its_score3',
        'its_score4',
        'td_score1',
        'td_score2',
        'td_score3',
        'upcp_score1',
        'upcp_score2',
        'upcp_score3',
        'positive_comment',
        'issue',
        'sr',
        'warning',
        'tf',
    ];

    public static function getAppraisalRatingList()
    {
        return [
            1 => __('label.e_appraisal_my_record.form.radio.rating_option_one'),
            2 => __('label.e_appraisal_my_record.form.radio.rating_option_two'),
            3 => __('label.e_appraisal_my_record.form.radio.rating_option_three'),
            4 => __('label.e_appraisal_my_record.form.radio.rating_option_four'),
            5 => __('label.e_appraisal_my_record.form.radio.rating_option_five'),
            6 => __('label.e_appraisal_my_record.form.radio.rating_option_six'),
            7 => __('label.e_appraisal_my_record.form.radio.rating_option_seven')
        ];
    }

}
