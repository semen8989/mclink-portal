<?php

namespace App\Models;

use App\Traits\MonthInYearTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiVariable extends Model
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
        'variable_kpi',
        'variable_quarter',
        'variable_year',
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

    public function getQuarterList()
    {
        return self::QUARTER;
    }

    /**
     * Get the user that is associated with the record.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the KpiMaingoal's kpi rating.
     */
    public function kpiratings()
    {
        return $this->morphMany(KpiRating::class, 'kpi_ratable');
    }
}
