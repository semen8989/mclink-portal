<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KpiMaingoal extends Model
{
    use HasFactory;

    const COMPLETED_STATUS = [
        "no" => 0,
        "yes" => 1
    ];
}
