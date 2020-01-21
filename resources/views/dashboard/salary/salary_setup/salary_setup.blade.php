
@extends('dashboard.mainpage.app', ['title' => 'Salary Setup'])


@section('include_css')

 @include('dashboard.salary.salary_setup.salary_setup_css')

@endsection

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="{{ Route::currentRouteNamed() }}"></a>
 </li>
@endsection

@section('content')


   <!-- Data list view starts -->
 <section id="data-list-view" class="data-list-view-header">
   <div class="action-btns d-none">
     <div class="btn-dropdown mr-1 mb-1">
       <div class="btn-group dropdown actions-dropodown">
         <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Actions
         </button>
         <div class="dropdown-menu">
           <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
           <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
           <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
           <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
         </div>
       </div>
     </div>
   </div>

   <!-- DataTable starts -->
   <div class="table-responsive">
     <table class="table data-list-view">
       <thead>
         <tr>
           <th></th>
           <th>NAME</th>
           <th>DESIGNATION</th>
           <th>SALARY TYPE</th>
           <th>BASIC</th>
           <th>GROSS</th>
           <th>ACTION</th>
         </tr>
       </thead>
       <tbody>


      @foreach ($salaries as $salary)


        <tr>
          <td></td>
          <td class="product-name">{{ $salary->relatonBetweenEmployee->fname.' '.$salary->relatonBetweenEmployee->fname }}</td>
          <td class="product-category">{{ $salary->relatonBetweenEmployee->relationBetweenDesignation->name }}</td>
          <td class="product-category">Need Develop</td>
          <td class="product-category">৳{{ $salary->relatonBetweenEmployee->basic_salary }}</td>
          <td class="product-category">৳{{ $salary->gross_salary }}</td>
          <td class="product-action">
            <span><a href="#"><i data-feather="edit"></i></a></span>
            <span class="action-delete"><i data-feather="trash"></i></span>
          </td>
        </tr>


      @endforeach





       </tbody>
     </table>
   </div>
   <!-- DataTable ends -->

   <!-- add new sidebar starts -->
   <div class="add-new-data-sidebar">
     <div class="overlay-bg"></div>
     <div class="add-new-data" style="width:40rem !important;">
       <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
         <div>
           <h4 class="text-uppercase">SALARY SETUP</h4>
         </div>
         <div class="hide-data-sidebar">
           <i class="feather icon-x"></i>
         </div>
       </div>
       <div class="data-items pb-3">
         <form action="{{route('postgb')}}" method="post">
           @csrf

           <div class="form-body pt-3">
             <div class="container">
               <div class="row">

                   <div class="col-md-12 col-12">
                       <div class="form-group">
                           <select class="select2 form-control select2-hidden-accessible" id="employee_name" name="employee_id" tabindex="-1" aria-hidden="true">
                               <optgroup label="Employees">
                                 <option value="">Select an employee</option>

                                   @foreach ($employees as $employee)
                                     <option value="{{ $employee->id }}">{{ $employee->fname.' '.$employee->lname }}</option>
                                   @endforeach
                               </optgroup>
                           </select>
                       </div>
                   </div>

                   <div class="col-md-12 col-12 ttinsert">
                       {{-- <div class="form-label-group">
                           <input type="text" id="basic_salary" class="form-control basic_salary input" placeholder="BASIC SALARY" name="basic_salary" value="00" disabled>
                           <label for="basic_salary">BASIC SALARY</label>
                       </div> --}}
                   </div>


                   <div class="col-md-12 col-12">
                     <h4 class="text-uppercase">ADDITION</h4>
                     <hr>
                   </div>



                   @foreach ($salary_benifits as $item)
                   @if ($item->benifit_type === "Add")
                   <div class="col-md-12 col-12">
                       <div class="form-label-group">
                         <input type="hidden" name="benifit_id_add[]" value="{{ $item->id }}">
                           <input value="" type="text" data-benifitType="{{$item->benifit_type}}" id="{{$item->salary_benifits}}" class="grossCalcAdd form-control prc input" placeholder="{{$item->salary_benifits}}" name="benifit_add_value[]">
                           <label for="home_rent">{{$item->salary_benifits}}</label>
                       </div>
                   </div>
                   @endif
                   @endforeach





                                     <div class="col-md-12 col-12">
                                       <h4 class="text-uppercase">DEDUCTION</h4>
                                       <hr>
                                     </div>

                                       @foreach ($salary_benifits as $item)
                                       @if ($item->benifit_type === "Deduct")
                                       <div class="col-md-12 col-12">
                                           <div class="form-label-group">
                                             <input type="hidden" name="benifit_id_deduct[]" value="{{ $item->id }}">
                                               <input value="" type="text" data-benifitType="{{$item->benifit_type}}" id="{{$item->salary_benifits}}" class="grossCalcDeduct form-control prc input" placeholder="{{$item->salary_benifits}}" name="benifit_value_deduct[]">
                                               <label for="home_rent">{{$item->salary_benifits}}</label>
                                           </div>
                                       </div>
                                       @endif
                                       @endforeach


                                     <div class="col-md-12 col-12">
                                       <h4 class="text-uppercase">GROSS SALARY</h4>
                                       <hr>
                                     </div>

                                     <div class="col-md-12 col-12 ttgro">
                                         <div class="form-label-group">
                                             <input type="text" id="gross_salary" class="form-control" placeholder="GROSS SALARY" name="gross_salary" disabled>
                                             <label for="gross_salary">GROSS SALARY</label>
                                         </div>
                                     </div>

                                     <div id="gross" style="display:none;"></div>




               </div>
             </div>

           </div>


           <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
             <div class="add-data-btn">
               <button class="btn btn-primary" type="submit">Add Data</button>
             </div>
             <div class="cancel-data-btn">
               <button class="btn btn-outline-danger">Cancel</button>
             </div>
           </div>


         </form>

       </div>

     </div>
   </div>
   <!-- add new sidebar ends -->
 </section>
 <!-- Data list view end -->


 <!-- // Here we End content -->


@endsection




@section('customizer')

 @include('dashboard.mainpage.widgets.customizer')

@endsection

@section('footer')

 @include('dashboard.mainpage.widgets.footer')

@endsection

@section('include_js')

 @include('dashboard.salary.salary_setup.salary_setup_js')

@endsection

@section('custom_js')

 <script type="text/javascript">
 let updateSalary=0;
   $(document).on('click', '#delete', function(){
       var id = $(this).attr('id');
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       if(confirm("Are you sure you want to Delete this data?"))
       {
           $.ajax({
               url:"{{route('activation_multi_delete')}}",
               mehtod:"get",
               data:{id:id},
               success:function(data)
               {
                   $('#table_data').DataTable().ajax.reload();
               }
           })
       }
       else
       {
           return false;
       }
   });
</script>





<script type="text/javascript">
   $(document).ready(function() {
      $('#employee_name').change(function() {
         var employee_id = $(this).val();
            // alert(employee_id);
     // ajax setup
     $.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
     });
   //
   //   // ajax setup request start
   //
     $.ajax({
   type: 'POST',
   url: '/app/v1/dashboard/get/employee/basic/salary',
   data: {
       employee_id: employee_id
   },
   success: function(data) {
       // $(".basic_salary").val(data);
       // document.getElementById('basic_salary').value = "asd";
       let testHtml=`
       <div class="form-label-group">
           <input type="text" id="basic_salary" class="form-control basic_salary input" placeholder="BASIC SALARY" name="basic_salary" value="${data}" disabled>
           <label for="basic_salary">BASIC SALARY</label>
       </div>
       `;
       document.querySelector('.ttinsert').innerHTML = testHtml;
       updateSalary=Number(data);
       // alert(data);
   }
     });
     // ajax setup request end
 });
   });
</script>

<script type="text/javascript">
   // let updateSalary = bs.value;
   let getSalary=updateSalary;
   let totalAdd = 0;
   let totalSub=0;
   $(".grossCalcAdd").keyup(function (e) {
       getSalary=updateSalary;
       let calType = e.target.dataset.benifittype;
       let claValue = e.target.value;
       // let allField = $(".grossCalcAdd");
       totalAdd = 0;
       let allField =  document.querySelectorAll('.grossCalcAdd');
       allField.forEach((item) => {
         let daa = ca(item.value);
         totalAdd+=daa;
       });
       // totalAdd+=totalAdd;
       let newSalary = getSalary+totalAdd-totalSub;
       console.log(newSalary);
       $('#gross_salary').val(newSalary);
       document.getElementById('gross').innerHTML = `
           <input type="number" id="gg" name="gross_salary" value="${newSalary}">
       `;
   });
   $(".grossCalcDeduct").keyup(function (e) {
       // updateSalary=Number(bs.value);
       let calType = e.target.dataset.benifittype;
       let claValue = e.target.value;
       // let allField = $(".grossCalcDeduct");
       totalSub=0;
       let allField =  document.querySelectorAll('.grossCalcDeduct');
       allField.forEach((item) => {
         let daa = cd(item.value);
         totalSub+=daa;
       });
       // totalSub+=totalSub;
       let newSalary = getSalary-totalSub+totalAdd;
       console.log(newSalary);
       $('#gross_salary').val(newSalary);
       document.getElementById('gross').innerHTML = `
           <input type="number" id="gg" name="gross_salary" value="${newSalary}">
       `;
   });
   function ca(va) {
     if (va == '') {
       va = 0
     }
     return Number(va);
   }
   function cd(va) {
     if (va == '') {
       va = 0
     }
     return Number(va);
   }
</script>


@endsection
