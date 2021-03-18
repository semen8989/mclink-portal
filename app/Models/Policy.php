<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Policy extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'company_id',
        'description',
        'user_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
