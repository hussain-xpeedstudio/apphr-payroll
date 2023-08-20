<?php

namespace AppHr\Payroll\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class PayrollFieldController extends Controller
{
    public function index(){
        return ("Web Working Well");
    }
    public function api(){
        return ("Api Working Well");
    }
}
