<?php

namespace App\Models;

use App\Models\ServiceReport;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'employee_id',
        'joining_date',
        'company_id',
        'department_id',
        'designation_id',
        'role_id',
        'gender',
        'shift_id',
        'birth_date',
        'contact_number',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'token_2fa_expiry' => 'datetime',
    ];

    /**
     * Get the service reports that the user owns.
     */
    public function servicereports()
    {
        return $this->hasMany(ServiceReport::class);
    }

    /**
     * Get the company that owns the user.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the department that owns the user.
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the designation that owns the user.
     */
    public function designation()
    {
        return $this->belongsTo(Designation::class);
    }

    /**
     * Get the office shift that owns the user.
     */
    public function officeShift()
    {
        return $this->belongsTo(officeShift::class,'shift_id');
    }

    /**
     * Get the setting associated with the user.
     */
    public function setting()
    {
        return $this->hasOne(Setting::class);
    }
  
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {
        /*if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }*/

        $this->roles()->sync($role, false); //add new records but won't drop anything
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'Administrator')->exists();
    }
    
    public function isDepartmentHead()
    {
        return $this->department()
            ->where([
                ['company_id', $this->company_id],
                ['user_id', $this->id],
            ])->exists();
    }

    public function mainKpi()
    {
        return $this->hasMany(KpiMaingoal::class);
    }

    public function variableKpi()
    {
        return $this->hasMany(KpiVariable::class);
    }
}
