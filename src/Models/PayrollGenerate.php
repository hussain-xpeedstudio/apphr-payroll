<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class PayrollGenerate extends Model
{
    use HasFactory;
    protected $fillable=['label','description','is_approved','approved_by'];

    public function empSalary(){
        return $this->hasMany(EmpSalary::class);
    }
    public function empOvertime(){
        return $this->hasMany(EmpOvertime::class);
    }
}
