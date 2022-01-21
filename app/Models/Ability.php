<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ability extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
