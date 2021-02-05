<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use SoftDeletes;

    protected $table = 'announcements';
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

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}
