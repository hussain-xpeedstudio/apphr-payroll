<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class HourlyEmployee extends Model
{
    use HasFactory;
    protected $fillable=['emp_id','rate','overtime'];
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
