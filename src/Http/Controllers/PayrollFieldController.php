<?php

namespace AppHr\Payroll\Http\Controllers;

use AppHr\Payroll\Http\Requests\PayrollField\PayrollFieldCreateRequest;
use AppHr\Payroll\Http\Responses\ApiResponse;
use AppHr\Payroll\Models\Employee;
use AppHr\Payroll\Models\PayrollField;
use AppHr\Payroll\Models\PayrollGeneralSetting;
use AppHr\Payroll\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PayrollFieldController extends Controller
{
    public function index()
    {
        return ("Web Working Well");
    }
    public function getAllPayrollFields()
    {
        $request_time = date('y-m-d h:i:s');
        try {
            $data = PayrollField::all();
            return response()->json([
                'status' => 200,
                'success' => true,
                'message' => 'Success',
                'data' => $data,
                'request_time' => $request_time,
                'response_time' => date('y-m-d h:i:s'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 501,
                'success' => false,
                'message' => 'Something Went Wrong',
                'data' => array(),
                'errors' => array(),
                'request_time' => $request_time,
                'response_time' => date('y-m-d h:i:s'),
            ]);
        }

    }
    public function createPayrollField(PayrollFieldCreateRequest $request)
    {
        $request_time = date('y-m-d h:i:s');
        $requestData = $request->validated(); // Use validated data directly

        try {
            //store data
            $data = new PayrollField();
            $data->name = $requestData['name'];
            $data->deduction = $requestData['deduction'];
            $data->is_system = $requestData['1is_system'];
            $data->save();
            //success response
            return ApiResponse::success($data, 'Payroll Field Created !', 200, $request_time);

        } catch (\Exception $e) {
            //exception response
            return ApiResponse::serverException([], 'Something Went Wrong !', 501, $request_time);
        }
    }
    public function createPayrollGeneralSetting(Request $request)
    {
        $request_time = date('y-m-d h:i:s');
        $request = $request->json()->all();

        $data = new PayrollGeneralSetting();
        $data->rules = $request['rules'];
        $data->amount = $request['amount'];
        $data->payroll_field_id = $request['payroll_field_id'];
        $data->save();
        return response()->json([
            'status' => 200,
            'success' => true,
            'message' => 'Payroll General Setting Created Successfully',
        ]);
    }
    public function getPayrollGeneralSetting()
    {

        //return PayrollGeneralSetting('64e59d6a4844af492a00ca14')->payrollField()->name;
        $data = PayrollGeneralSetting::find('64e5a03c4844af492a00ca15');
        //return $data->payrollField()->name;
        //return $data->payrollField->name;
        return PayrollGeneralSetting::with('payrollField:name')->get();
    }
    //Embedding tags model in Employee
    public function getPayrollPivotData()
    {
        $employee = Employee::find('64e5d8b1e8f3a0866a06c6f4');
        $tagName = 'Testing Pivot Model';
        if (!$existingTag) {
            $newTag = new Tag(['name' => 'Test']);
            $employee->tags()->save($newTag);
            $employee->save();
        }
        return $employee;
    }
    public function getPayrollPivotData1()
    {

        $employee = Employee::find('64e5d8b1e8f3a0866a06c6f4');
        $tagName = 'Charity';
        $existingTag = Tag::where('name', $tagName)->first();
        if (!$existingTag) {
            $newTag = new Tag(['name' => $tagName]);
            //$newTag->save();
        } else {
            $newTag = $existingTag;
        }

        $employee->tags()->save($newTag);
        $employee->save();
        return $employee;
    }

    public function getPayrollPivotData2()
    {

    }

}
