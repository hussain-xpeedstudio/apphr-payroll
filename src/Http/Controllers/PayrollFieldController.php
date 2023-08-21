<?php

namespace AppHr\Payroll\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use AppHr\Payroll\Models\PayrollField;
use AppHr\Payroll\Models\Counter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
class PayrollFieldController extends Controller
{
    public function index(){
        return ("Web Working Well");
    }
    public function getAllPayrollFields(){
        $request_time=date('y-m-d h:i:s');
        try{
            $data=PayrollField::all();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Success',
                'data' => $data,
                'request_time' => $request_time,
                'response_time' => date('y-m-d h:i:s')
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 501,
                'success' => false,
                'message' => 'Something Went Wrong',
                'data' =>array(),
                'errors' =>array(),
                'request_time' => $request_time,
                'response_time' => date('y-m-d h:i:s')
            ]);
        }
        
    }
    public function createPayrollField(Request $request){
        $request_time=date('y-m-d h:i:s');
        $request=$request->json()->all();
        try{
            $validator = Validator::make($request, [
                'name' => 'required|string|max:255|unique:payroll_fields',
                'deduction' => 'required|numeric',
                'is_system' => 'required|boolean',
            ]);
            if ($validator->fails()) {
                return response()->json([
                    'status' => 406,
                    'success' =>false,
                    'message' => 'Validation Fails !',
                    'data' => $request,
                    'errors' => $validator->errors(),
                    'request_time' => $request_time,
                    'response_time' => date('y-m-d h:i:s')
                ]);
            }
            $data=new PayrollField();
            $data->name=$request['name'];
            $data->deduction=$request['deduction'];
            $data->is_system=$request['is_system'];
            $data->save();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Payroll Field Created Successfully',
                'data' => $data,
                'request_time' => $request_time,
                'response_time' => date('y-m-d h:i:s')
            ]);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 501,
                'success' => false,
                'message' => 'Something Went Wrong',
                'data' =>$request,
                'errors' =>array(),
                'request_time' => $request_time,
                'response_time' => date('y-m-d h:i:s')
            ]);
        }
        
    }
}
