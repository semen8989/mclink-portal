<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentCustomUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'submission_id',
        'orig_filename',
        'file_name'
    ];
}
