<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class EmpOvertime extends Model
{
    use HasFactory;
    protected $fillable=['trn_id','emp_id','hour','remarks'];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
    public function payrollGenerate(){
        return $this->belongsTo(PayrollGenerate::class);
    }
}
