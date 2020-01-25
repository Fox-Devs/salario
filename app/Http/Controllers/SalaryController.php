<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Alert;
use Carbon\Carbon;
use App\SalaryBenifits;
use App\Employee;
use App\GrossSalary;
use App\BenifitSalary;
use App\Payment;

class SalaryController extends Controller
{
    // middleware

      public function __construct()
      {
          $this->middleware('auth');
          $this->middleware('verified');
      }

    // salary_benifits

    function salary_benifits()
    {
      $salary_benifits = SalaryBenifits::all();
      return view('dashboard.salary.salary_benifits.salary_benifits',compact('salary_benifits'));
    }

    // salary_benifits_create

    function salary_benifits_create(Request $request)
    {
      // create
      SalaryBenifits::insert([
        'salary_benifits'   =>$request->salary_benifits,
        'benifit_type'      =>$request->benifit_type,
        'slug'              =>Str::slug($request->salary_benifits),
      ]);

      Alert::toast('Benifits Added','success');
      return back();

    }

    // salary_benifits_edit

    function salary_benifits_edit($benifit_id)
    {
      $salary_edit = SalaryBenifits::findOrFail($benifit_id);
      return view('dashboard.salary.salary_benifits.salary_benifits_edit',compact('salary_edit'));
    }

    // salary_benifits_update

    function salary_benifits_update(Request $request , $benifit_id)
    {
      SalaryBenifits::findOrFail($benifit_id)->update([
        'salary_benifits'   =>$request->salary_benifits,
        'benifit_type'      =>$request->benifit_type,
        'slug'              =>Str::slug($request->salary_benifits),
      ]);

      Alert::toast('Benifit Updated','success');
      return redirect(route('salary_benifits'));
    }

    // salary_benifits_delete

    function salary_benifits_delete($benifit_id)
    {
      SalaryBenifits::findOrFail($benifit_id)->delete();

      Alert::toast('Benifit Deletes','danger');
      return redirect(route('salary_benifits'));
    }


// ----------------------------------------------------------------------------------------------------------------------

    // salary_setup

    function salary_setup()
    {

      $employees = Employee::all();
      $salary_benifits = SalaryBenifits::all();

      $salaries = GrossSalary::all();

      return view('dashboard.salary.salary_setup.salary_setup',compact('salaries','employees','salary_benifits'));
    }

    // get_employee_basic_salary

    function get_employee_basic_salary(Request $request)
    {
      // echo $request->employee_id;
      $employee = Employee::findOrFail($request->employee_id);


      return $employee->basic_salary;
      print_r($request->all());
    }
    function postgb(Request $request)
    {

      $last_inserted_id = GrossSalary::insertGetId([
        'gross_salary'    =>$request->gross_salary,
        'employee_id'     =>$request->employee_id,
        'created_at'      =>Carbon::now(),
      ]);


      $varToForeach = $request->benifit_id_add;
      foreach ($varToForeach as $key => $value) {
        // echo "benofit id : ".$value."- benifit_add_value : ".$request->benifit_add_value[$key]."<br>";
        // echo "benofit d id : ".$request->benifit_id_deduct[$key]."- benifit_value_deduct : ".$request->benifit_value_deduct[$key]."<br><br>";

        BenifitSalary::insert([
          'gross_salary_id'       =>  $last_inserted_id,
          'benifit_id_add'        =>  $request->benifit_id_add[$key],
          'benifit_id_deduct'     =>  $request->benifit_id_deduct[$key],
          'benifit_add_value'     =>  $request->benifit_add_value[$key],
          'benifit_add_deduct'    =>  $request->benifit_value_deduct[$key],
          'created_at'            =>Carbon::now(),
        ]);
      }

      Alert::toast('Benifit Deletes','danger');
      return back();
    }

    // manage_salary

    function manage_salary()
    {
      $employees = Employee::all();
      $salary_benifits = SalaryBenifits::all();
      $salaries = GrossSalary::all();
      return view('dashboard.salary.manage_salary.manage_salary',compact('employees','salary_benifits','salaries'));
    }

    // Payment section
    function paymentNow(Request $request)
    {
        // print_r($request->all());
        if ($request->payMethod == 0) {

            Payment::insert([
                'employeeId' => $request->employeeId,
                'moneyToPayinput' => $request->moneyToPayinput,
                'payMethod' => $request->payMethod,
                'payStatus' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            Alert::toast('Employee Payment Done !👍', 'success');
            return back();
        } else {
            $employeeId = $request->employeeId;
            $moneyToPayinput = $request->moneyToPayinput;
            $payMethod = $request->payMethod;
            return view('stripe',compact('employeeId','moneyToPayinput','payMethod'));
        }

    }

    // END
}
