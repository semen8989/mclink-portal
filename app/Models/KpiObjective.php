<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Traits\MonthInYearTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiObjective extends Model
{
    use HasFactory, SoftDeletes, MonthInYearTrait;

    const COMPLETED_STATUS = [
        "no" => 0,
        "yes" => 1
    ];

    const QUARTER = [
        0 => "All",
        1 => "First Quarter",
        2 => "Second Quarter",
        3 => "Third Quarter",
        4 => "Fourth Quarter"
    ];

    protected $fillable = [
        'objective_kpi',
        'objective_quarter',
        'objective_year',
        'target_date',
        'result',
        'feedback',
        'user_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'target_date' => 'date:d/m/Y',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 0,
    ];

    public function getCompletedStatus()
    {
        return self::COMPLETED_STATUS;
    }

    public function getMonthList()
    {
        return self::$monthList;
    }

    public function getQuarterList()
    {
        return self::QUARTER;
    }

    public function getStringStatus()
    {
        return Str::ucfirst(array_search($this->status, self::COMPLETED_STATUS));
    }

    /**
     * Set the target date format.
     *
     * @param  string  $value
     * @return void
     */
    public function setTargetDateAttribute($value) 
    {
        $this->attributes['target_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
}
