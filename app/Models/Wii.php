<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wii extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'wii';

    protected $fillable = [
        'user_id',
        'purpose',
        'problem',
        'solution',
    ];

    const STATUS = [
        'pending' => 0,
        'approved' => 1,
        'not approved' => 2,
        'KIV' => 3
    ];
}
