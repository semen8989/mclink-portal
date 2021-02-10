<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'designation_name',
        'company_id',
        'department_id'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
