<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class PayrollGeneralSetting extends Model
{
    use HasFactory;
    protected $fillable=['payroll_field_id','rules','amount'];
    public function payrollField(){
        return $this->belongsTo(PayrollField::class);
    }
}
