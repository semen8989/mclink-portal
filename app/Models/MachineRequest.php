<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use DateTimeInterface;

class MachineRequest extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = ['status'];

    const STATUS = [
        "pending" => 0,
        "completed" => 1
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class,'requester_id');
    }

    public function technician()
    {
        return $this->belongsTo(User::class,'technician_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d/m/Y');
    }
}
