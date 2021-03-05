<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiRating extends Model
{
    use HasFactory;

    /**
     * Get the parent kpi_ratable model (maingoal, variable or objective).
     */
    public function kpi_ratable()
    {
        return $this->morphTo();
    }
}
