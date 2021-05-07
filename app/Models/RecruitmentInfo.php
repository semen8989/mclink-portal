<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentInfo extends Model
{
    protected $table = 'recruitment_info';

    const STATUS = [
        "KIV" => 1,
        "Rejected" => 2,
        "Next Interviewer" => 3,
        "Selected" => 4
    ];
}
