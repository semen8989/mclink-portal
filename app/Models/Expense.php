<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'expense_type_id',
        'purchase_date',
        'amount',
        'company_id',
        'employee_id',
        'bill_copy',
        'remarks',
        'status'
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function expense_type(){
        return $this->belongsTo(ExpenseType::class);
    }

    public function user(){
        return $this->belongsTo(User::class,'employee_id');
    }
}
