<?php

namespace AppHr\Payroll\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;
    protected $fillable=['name','sequence'];

    
}
