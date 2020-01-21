<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\User;
use App\Activation;
use App\Department;
use App\Designation;
use App\Gender;
use App\Employee;
use Carbon\Carbon;
use Alert;
use Image;


class EmployeeController extends Controller
{
    //BEGIN

    // register_employee
    function index()
    {
      $activations        =     Activation::all();
      $departments        =     Department::all();
      $designations       =     Designation::all();
      $genders            =     Gender::all();

      return view('dashboard.employee.employee_register.register_employee',compact('activations','departments','designations','genders'));
    }

    // create_employee
    function create_employee(Request $request)
    {

        // VALIDATION

        $request->validate([
          'fname'                             => 'required',
          'lname'                             => 'required',
          'email'                             => 'required|unique:employees|email:rfc',
          'nid'                               => 'required|numeric|unique:employees',
          'dob'                               => 'required',
          'gender_id'                         => 'required',
          'blood'                             => 'required',
          'designation_id'                    => 'required',
          'joining_date'                      => 'required',
          'basic_salary'                      => 'required',
          'contact_number'                    => 'required|numeric',
          'team'                              => 'nullable',
          'status_id'                         => 'required',
          'photo'                             => 'required|mimes:jpg,jpeg,png',
        ],[
          // CUSTOM ERROR MESSAGE
          'fname.required'                    =>'First Name Is Required',
          'lname.required'                    =>'Last Name Is Required',
          'email.required'                    =>'Email Is Required',
          'nid.required'                      =>'NID Is Required',
          'dob.required'                      =>'Date Of Birth Is Required',
          'gender_id.required'                =>'Select Your Gender',
          'blood.required'                    =>'Select Your Blood Group',
          'designation_id.required'           =>'Choose Employee Designation',
          'joining_date.required'             =>'Select Employee Joining Date',
          'basic_salary.required'             =>'Basic Salary Is Required',
          'contact_number.required'           =>'Contact Number Is Required',
          'status_id.required'                =>'Choose Employee Status',
          'photo.required'                    =>'Please Upload Employee Photo',
          'photo.mimes:jpg,jpeg,png'          =>'You Must Upload JPEG or PNG format',
        ]);


        // INSERT

        $last_inserted_id = Employee::insertGetId([
          'fname'           =>$request->fname,
          'lname'           =>$request->lname,
          'email'           =>$request->email,
          'nid'             =>$request->nid,
          'dob'             =>$request->dob,
          'gender_id'       =>$request->gender_id,
          'blood'           =>$request->blood,
          'designation_id'  =>$request->designation_id,
          'joining_date'    =>$request->joining_date,
          'basic_salary'    =>$request->basic_salary,
          'contact_number'  =>$request->contact_number,
          'team'            =>$request->team,
          'status_id'       =>$request->status_id,
          'photo'           =>$request->photo,
          'slug'            =>Str::slug($request->fname.'-'.$request->lname),
        ]);

        // photo

        if ($request->hasFile('photo')) {
        	$photo_upload     =  $request ->photo;
        	$photo_extension  =  $photo_upload -> getClientOriginalExtension();
        	$photo_name       =  $last_inserted_id . "." . $photo_extension;
        	Image::make($photo_upload)->resize(152,192)->save(base_path('public/uploads/employee/'.$photo_name),100);
        	Employee::find($last_inserted_id)->update([
        	'photo'           => $photo_name,
            ]);
          }


          User::insert([
            'name'        => $request->fname.' '.$request->lname,
            'email'       => $request->email,
            'password'    => bcrypt($request->contact_number),
            'employee_id' => $request->designation_id,
          ]);



        // Alert

        Alert::toast('Employee Registered Successfully','success');
        return back();
      }


    // employee_list

    function employee_list()
    {

      $employees = Employee::all();
      return view('dashboard.employee.employee_list.employee_list',compact('employees'));
    }


    // employee_view

    function employee_view($employee_id,$slug)
    {

      $employee_view = Employee::findOrFail($employee_id);
      return view('dashboard.employee.employee_view.employee_view',compact('employee_view'));
    }


    // employee_edit

    function employee_edit($employee_id,$slug)
    {
      $activations        =     Activation::all();
      $departments        =     Department::all();
      $designations       =     Designation::all();
      $genders            =     Gender::all();

      $employee_edit = Employee::findOrFail($employee_id);
      return view('dashboard.employee.employee_edit.employee_edit',compact('employee_edit','activations','departments','designations','genders'));
    }

    // employee_photo_update

    function employee_photo_update(Request $request , $employee_id)
    {

      if($request->hasFile('photo')){
        if(Employee::find($employee_id)->photo=='default.png'){
         $photo_upload     = $request->photo;
         $photo_extension  =  $photo_upload->getClientOriginalExtension();
         $photo_name       =  $employee_id . "." . $photo_extension;
         Image::make($photo_upload)->resize(152,192)->save(base_path('public/uploads/employee/'.$photo_name),100);
         Employee::find($employee_id)->update([
         'photo'           => $photo_name,
        ]);
        }
        else {
         //delete
         $delete_photo=Employee::find($employee_id)->photo;
         unlink(base_path('public/uploads/employee/'.$delete_photo));
         //update
         $photo_upload     = $request->photo;
         $photo_extension  =  $photo_upload->getClientOriginalExtension();
         $photo_name       =  $employee_id . "." . $photo_extension;
         Image::make($photo_upload)->resize(152,192)->save(base_path('public/uploads/employee/'.$photo_name),100);
         Employee::find($employee_id)->update([
         'photo'           => $photo_name,
        ]);
        }
      }


            // Alert

            Alert::toast('Changed Successfully','success');
            return back();

    }

    // employee_update

    function employee_update(Request $request , $employee_id)
    {

      // INSERT

      Employee::findOrFail($employee_id)->update([
        'fname'           =>$request->fname,
        'lname'           =>$request->lname,
        'email'           =>$request->email,
        'nid'             =>$request->nid,
        'dob'             =>$request->dob,
        'gender_id'       =>$request->gender_id,
        'blood'           =>$request->blood,
        'designation_id'  =>$request->designation_id,
        'joining_date'    =>$request->joining_date,
        'basic_salary'    =>$request->basic_salary,
        'contact_number'  =>$request->contact_number,
        'team'            =>$request->team,
        'status_id'       =>$request->status_id,
        'slug'            =>Str::slug($request->fname.'-'.$request->lname),
      ]);



      // Alert

      Alert::toast('Changed Successfully','success');
      return back();

    }

    // employee_information_update

    function employee_information_update(Request $request , $employee_id)
    {

      // INSERT

      Employee::findOrFail($employee_id)->update([
        'address'         =>$request->address,
        'post_code'       =>$request->post_code,
        'city'            =>$request->city,
        'district'        =>$request->district,
      ]);

      // Alert

      Alert::toast('Changed Successfully','success');
      return back();

    }

    // employee_social_update

    function employee_social_update(Request $request , $employee_id)
    {

      // INSERT

      Employee::findOrFail($employee_id)->update([
        'facebook'          =>$request->facebook,
        'linkedin'          =>$request->linkedin,
        'github'            =>$request->github,
        'codepen'           =>$request->codepen,
      ]);

      // Alert

      Alert::toast('Changed Successfully','success');
      return back();

    }

    // employee_terminate

    function employee_terminate($employee_id)
    {
      Employee::findOrFail($employee_id)->delete();

      Alert::toast('Terminated Successfully','success');
      return redirect(route('employee_list'));
    }

    //END
}
