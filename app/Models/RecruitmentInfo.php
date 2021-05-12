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
        "Next Interviewer" => 3,
        "Selected" => 4
    ];

    public function user(){
        return $this->belongsTo(User::class,'interviewer_user_id');    
    }
}
