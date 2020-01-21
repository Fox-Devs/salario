<?php

// BEGIN: DASHBOARD


// BEGIN: DashboardController

// dashboard
Route::get('/app/v1/dashboard','DashboardController@index')->name('dashboard'); //index

// END: DashboardController





// ------------------------------------------------------------------------------------------------------------------

// BEGIN: EmployeeController

// register_employee
Route::get('/app/v1/dashboard/register/employee','EmployeeController@index')->name('register_employee'); //register_employee

// create_employee
Route::post('/app/v1/dashboard/register/employee/create','EmployeeController@create_employee')->name('create_employee'); //create_employee

// employee_list
Route::get('/app/v1/dashboard/employee/list','EmployeeController@employee_list')->name('employee_list'); //employee_list

// employee_view
Route::get('/app/v1/dashboard/employee/view/{employee_id}/{slug}','EmployeeController@employee_view')->name('employee_view'); //employee_view

// employee_edit
Route::get('/app/v1/dashboard/employee/edit/{employee_id}/{slug}','EmployeeController@employee_edit')->name('employee_edit'); //employee_edit

// employee_update
Route::post('/app/v1/dashboard/employee/update/{employee_id}','EmployeeController@employee_update')->name('employee_update'); //employee_update

// employee_photo_update
Route::post('/app/v1/dashboard/employee/update/photo/{employee_id}','EmployeeController@employee_photo_update')->name('employee_photo_update'); //employee_photo_update

// employee_information_update
Route::post('/app/v1/dashboard/employee/update/information/{employee_id}','EmployeeController@employee_information_update')->name('employee_information_update'); //employee_information_update

// employee_social_update
Route::post('/app/v1/dashboard/employee/update/social/{employee_id}','EmployeeController@employee_social_update')->name('employee_social_update'); //employee_information_update

// employee_terminate
Route::get('/app/v1/dashboard/employee/terminate/{employee_id}/{slug}','EmployeeController@employee_terminate')->name('employee_terminate'); //employee_terminate



// END: EmployeeController


// ------------------------------------------------------------------------------------------------------------------

// BEGIN: SalaryController

// salary_benifits
Route::get('/app/v1/dashboard/salary/benifits','SalaryController@salary_benifits')->name('salary_benifits'); //salary_benifits

// salary_benifits_create
Route::post('/app/v1/dashboard/salary/benifits/create','SalaryController@salary_benifits_create')->name('salary_benifits_create'); //salary_benifits_create

// salary_benifits_edit
Route::get('/app/v1/dashboard/salary/benifits/edit/{benifit_id}/{slug}','SalaryController@salary_benifits_edit')->name('salary_benifits_edit'); //salary_benifits_edit

// salary_benifits_update
Route::post('/app/v1/dashboard/salary/benifits/update/{benifit_id}/{slug}','SalaryController@salary_benifits_update')->name('salary_benifits_update'); //salary_benifits_update

// salary_benifits_delete
Route::get('/app/v1/dashboard/salary/benifits/delete/{benifit_id}/{slug}','SalaryController@salary_benifits_delete')->name('salary_benifits_delete'); //salary_benifits_delete


// salary_setup
Route::get('/app/v1/dashboard/salary/setup','SalaryController@salary_setup')->name('salary_setup'); //salary_setup
// get_employee_basic_salary
Route::post('/app/v1/dashboard/get/employee/basic/salary','SalaryController@get_employee_basic_salary')->name('get_employee_basic_salary'); //get_employee_basic_salary
Route::post('/app/v1/dashboard/postgb','SalaryController@postgb')->name('postgb'); //get_employee_basic_salary


// END: SalaryController
// ------------------------------------------------------------------------------------------------------------------

// BEGIN: StatusController

// BEGIN: Activation

// activation
Route::get('/app/v1/dashboard/activation','StatusController@activation')->name('activation'); //activation

// activation_create
Route::post('/app/v1/dashboard/activation/create','StatusController@activation_create')->name('activation_create'); //activation_create

// activation_delete
Route::get('/app/v1/dashboard/activation/delete/{activation_id}/{slug}','StatusController@activation_delete')->name('activation_delete'); //activation_delete

// activation_edit
Route::get('/app/v1/dashboard/activation/edit/{activation_id}/{slug}','StatusController@activation_edit')->name('activation_edit'); //activation_edit

// activation_update
Route::post('/app/v1/dashboard/activation/update/{activation_id}','StatusController@activation_update')->name('activation_update'); //activation_update

// activation_multi_delete
Route::get('/app/v1/dashboard/activation/multi/delete','StatusController@activation_multi_delete')->name('activation_multi_delete'); //activation_update

// END: Activation


// BEGIN: Designation

// designation
Route::get('/app/v1/dashboard/designation','StatusController@designation')->name('designation'); //designation
//
// // designation_create
Route::post('/app/v1/dashboard/designation/create','StatusController@designation_create')->name('designation_create'); //designation_create
//
// activation_delete
Route::get('/app/v1/dashboard/designation/delete/{designation_id}/{slug}','StatusController@designation_delete')->name('designation_delete'); //designation_delete
//
// designation_edit
Route::get('/app/v1/dashboard/designation/edit/{designation_id}/{slug}','StatusController@designation_edit')->name('designation_edit'); //designation_edit
//
// designation_update
Route::post('/app/v1/dashboard/designation/update/{designation_id}','StatusController@designation_update')->name('designation_update'); //activation_update
//
// // designation_multi_delete
Route::get('/app/v1/dashboard/designation/multi/delete','StatusController@designation_multi_delete')->name('designation_multi_delete'); //designation_multi_delete

// END: Designation


// BEGIN: Department

// department
Route::get('/app/v1/dashboard/department','StatusController@department')->name('department'); //department
//
// department_create
Route::post('/app/v1/dashboard/department/create','StatusController@department_create')->name('department_create'); //department_create
//
// department_delete
Route::get('/app/v1/dashboard/department/delete/{department_id}/{slug}','StatusController@department_delete')->name('department_delete'); //department_delete
//
// department_edit
Route::get('/app/v1/dashboard/department/edit/{department_id}/{slug}','StatusController@department_edit')->name('department_edit'); //department_edit
//
// department_update
Route::post('/app/v1/dashboard/department/update/{department_id}','StatusController@department_update')->name('department_update'); //department_update
//
// department_id_multi_delete
Route::get('/app/v1/dashboard/department/multi/delete','StatusController@department_id_multi_delete')->name('department_id_multi_delete'); //department_id_multi_delete

// END: Department


// BEGIN: Gender


// gender
Route::get('/app/v1/dashboard/gender','StatusController@gender')->name('gender'); //gender
//
// gender_create
Route::post('/app/v1/dashboard/gender/create','StatusController@gender_create')->name('gender_create'); //gender_create
//
// gender_delete
Route::get('/app/v1/dashboard/gender/delete/{gender_id}/{slug}','StatusController@gender_delete')->name('gender_delete'); //gender_delete
//
// gender_edit
Route::get('/app/v1/dashboard/gender/edit/{gender_id}/{slug}','StatusController@gender_edit')->name('gender_edit'); //gender_edit
//
// gender_update
Route::post('/app/v1/dashboard/gender/update/{gender_id}','StatusController@gender_update')->name('gender_update'); //gender_update
//
// gender_id_multi_delete
Route::get('/app/v1/dashboard/gender/multi/delete','StatusController@gender_id_multi_delete')->name('gender_id_multi_delete'); //gender_id_multi_delete


// END: Gender



// END: StatusController


// END: DASHBOARD







// default


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify'=>true,'register' => false]);

// Route::get('/home', 'HomeController@index')->name('home');
