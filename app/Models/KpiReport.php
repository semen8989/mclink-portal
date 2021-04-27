<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiReport extends Model
{
    use HasFactory;

    public static function getKpiTypes()
    {
        return [
            0 => __('label.global.form.select.all'),
            'mainGoals' => __('label.kpi_report.form.select.main_kpi'),
            'variables' => __('label.kpi_report.form.select.variable_kpi')
        ];
    }

    public static function getQuarterList()
    {
        return [
            0 => __('label.global.form.select.all'),
            1 => __('label.global.form.select.first_quarter'),
            2 => __('label.global.form.select.second_quarter'),
            3 => __('label.global.form.select.third_quarter'),
            4 => __('label.global.form.select.fourth_quarter')
        ];
    }
}