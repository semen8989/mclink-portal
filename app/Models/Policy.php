<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $table = 'policy';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'company_id',
        'description',
        'user_id'
    ];
}
