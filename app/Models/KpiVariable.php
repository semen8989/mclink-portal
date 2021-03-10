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

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 0,
    ];

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
