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
}
