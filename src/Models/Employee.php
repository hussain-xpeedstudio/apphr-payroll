<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable=['name','company_id','gross_salary','is_hourly'];

    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function payrollEmpSetting(){
        return $this->hasMany(PayrollEmpSetting::class);
    }
    public function empSalary(){
        return $this->hasMany(EmpSalary::class);
    }
    public function hourlyEmployee(){
        return $this->hasMany(HourlyEmployee::class);
    }
    public function empOvertime(){
        return $this->hasMany(EmpOvertime::class);
    }
     
}
