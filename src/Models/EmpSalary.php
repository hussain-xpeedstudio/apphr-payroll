<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class EmpSalary extends Model
{
    use HasFactory;
    protected $fillable=['trn_id','emp_id','payroll_field_id','debit','credit'];

    public function payrollGenerate(){
        return $this->belongsTo(PayrollGenerate::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function payrollField(){
        return $this->belongsTo(PayrollField::class);
    }
}
