<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class PayrollEmpSetting extends Model
{
    use HasFactory;
    protected $fillable=['emp_id','payroll_field_id','debit','credit'];

    public function payrollField(){
        return $this->belongsTo(PayrollField::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
