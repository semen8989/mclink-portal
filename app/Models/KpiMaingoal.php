<?php

namespace App\Models;

use App\Models\KpiRating;
use App\Traits\MonthInYearTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiMaingoal extends Model
{
    use HasFactory, SoftDeletes, MonthInYearTrait;

    const COMPLETED_STATUS = [
        "no" => 0,
        "yes" => 1
    ];

    protected $fillable = [
        'main_kpi',
        'user_id',
        'q1',
        'q2',
        'q3',
        'q4',
        'feedback',
        'status'
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
