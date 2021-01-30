<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcement';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'company_id',
        'department_id',
        'description',
        'summary'
    ];

    public function companies(){
        return $this->hasMany(Company::class);
    }

    public function departments(){
        return $this->hasMany(Department::class);
    }
}
