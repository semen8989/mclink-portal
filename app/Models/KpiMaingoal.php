<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiMaingoal extends Model
{
    use HasFactory, SoftDeletes;

    const COMPLETED_STATUS = [
        "no" => 0,
        "yes" => 1
    ];
}
