<?php

namespace App\Models;

use App\Models\KpiRating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KpiMaingoal extends Model
{
    use HasFactory, SoftDeletes;

    const COMPLETED_STATUS = [
        "no" => 0,
        "yes" => 1
    ];

    protected $fillable = [
        'main_kpi',
        'user_id'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => 0,
    ];

    /**
     * Get the user that is associated with the record.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
