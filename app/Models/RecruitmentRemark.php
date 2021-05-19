<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentRemark extends Model
{
    protected $table = 'recruitment_remarks';

    public function user(){
        return $this->belongsTo(User::class,'interviewer_user_id');    
    }

}
