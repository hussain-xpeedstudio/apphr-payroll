<?php

namespace AppHr\Payroll\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class PayrollField extends Model
{
    use HasFactory;
    protected $collection='payroll_fields';
    // protected $primaryKey = 'id';
    protected $fillable=['name','deduction','is_system'];
    public function payrollGeneralSetting(){
        return $this->hasOne(PayrollGeneralSetting::class);
    }
    public function payrollEmpSetting(){
        return $this->hasMany(PayrollEmpSetting::class);
    }
    public function empSalary(){
        return $this->hasMany(EmpSalary::class);
    }
}
