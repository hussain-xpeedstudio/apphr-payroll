<?php

namespace AppHr\Payroll\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
class Application extends Model
{
    use HasFactory;
    protected $fillable=['name','url'];
    public function company(){
        return $this->hasMany(Company::class);
    }
}
