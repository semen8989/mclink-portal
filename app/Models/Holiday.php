<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holiday extends Model
{
    use SoftDeletes;

    protected $table = 'holidays';
    protected $primaryKey = 'id';
    protected $fillable = [
        'company_id',
        'event_name',
        'start_date',
        'end_date',
        'description',
        'status'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}
