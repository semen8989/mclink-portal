<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecruitmentInfo extends Model
{
    protected $table = 'recruitment_info';

    const STATUS = [
        "Pending" => 0,
        "KIV" => 1,
        "Rejected" => 2,
        "Next Interview" => 3,
        "Selected" => 4
    ];

    const CONFIRM = [
        "Waiting" => 0,
        "No" => 1,
        "Yes" => 2
    ];

    public function user(){
        return $this->belongsTo(User::class,'interviewer_user_id');    
    }
}
