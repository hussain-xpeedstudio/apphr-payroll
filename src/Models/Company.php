<?php

namespace AppHr\Payroll\Models;
use Jenssegers\Mongodb\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable=['name','application_id'];
    public function application(){
        return $this->belongsTo(Application::class);
    }
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
