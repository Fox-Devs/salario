
@extends('dashboard.mainpage.app', ['title' => 'Manage Salary'])


@section('include_css')

 @include('dashboard.salary.manage_salary.manage_salary_css')

@endsection

@section('breadcrumb')
 <li class="breadcrumb-item"><a href="{{ Route::currentRouteNamed() }}"></a>
 </li>
@endsection

@section('content')


 <!-- // Here we End content -->
 <!-- Data list view starts -->
<section id="data-thumb-view" class="data-thumb-view-header">
  <div class="action-btns d-none">
    <div class="btn-dropdown mr-1 mb-1">
      <div class="btn-group dropdown actions-dropodown">
        <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Actions
        </button>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
          <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
          <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
          <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
        </div>
      </div>
    </div>
  </div>
  <!-- dataTable starts -->
  <div class="table-responsive">
    <table class="table data-thumb-view">
      <thead>
        <tr>
          <th></th>
          <th>Image</th>
          <th>NAME</th>
          <th>DESIGNATION</th>
          <th>TOTAL SALARY</th>
          <th>STATUS</th>
          <th>SALARY MONTH</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($salaries as $salary)
        <tr>
          <td></td>
          <td class="product-img"><img src="{{ asset('uploads/employee') }}/{{ $salary->relatonBetweenEmployee->photo }}" alt="Img placeholder">
          </td>
          <input type="hidden" id="emId" name="emId" value="{{$salary->relatonBetweenEmployee->id}}">
          <td class="product-name">{{ $salary->relatonBetweenEmployee->fname.' '.$salary->relatonBetweenEmployee->lname }}</td>
          <td class="product-category">{{ $salary->relatonBetweenEmployee->relationBetweenDesignation->name }}</td>
          <input type="hidden" value="{{ $salary->gross_salary }}">
          <td class="product-category" id="sal">৳{{ $salary->gross_salary }}</td>
          <td class="product-category">{{ $salary->relatonBetweenEmployee->relationBetweenStatus->name }}</td>

          <td class="product-price">{{ Carbon\Carbon::now()->format('M') }} {{ Carbon\Carbon::now()->year }}</td>
          <td class="product-action">
            <span class="action-edit"><i class="feather icon-edit"></i>PAY NOW</span>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  <!-- dataTable ends -->

  <!-- add new sidebar starts -->
  <div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
      <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
        <div>
          <h4 class="text-uppercase">List View Data</h4>
        </div>
        <div class="hide-data-sidebar">
          <i class="feather icon-x"></i>
        </div>
      </div>
      <div class="data-items pb-3">
        <form method="post" action="{{route('paySalaryNow')}}">
            @csrf
          <div class="data-fields px-2 mt-3">
            <div class="row">
                <input type="hidden" name="employeeId" id="employeeId">
              <div class="col-md-12 col-12">
                  <div class="form-label-group">
                      <input type="hidden" name="nameToPayinput" id="nameToPayinput">
                      <input type="text" id="nameToPay" class="form-control" placeholder="EMPLOYEE NAME" name="nameToPay" disabled>
                      <label for="first-name-column">EMPLOYEE NAME</label>
                  </div>
              </div>

              <div class="col-md-12 col-12">
                  <div class="form-label-group">
                      <input type="hidden" name="moneyToPayinput" id="moneyToPayinput">
                      <input type="text" id="moneyToPay" class="form-control" placeholder="TOTAL SALARY" name="moneyToPay" disabled>
                      <label for="first-name-column">TOTAL SALARY</label>
                  </div>
              </div>


              <div class="col-md-12 col-12">
                  <div class="form-group" data-select2-id="142">
                      <select class="select2 form-control select2-hidden-accessible" name="payMethod" data-select2-id="4" tabindex="-1" aria-hidden="true">
                          <optgroup label="PAYMENT METHOD" data-select2-id="142">
                              <option value="0" data-select2-id="6">CASH PAYMENT</option>
                              <option value="1" data-select2-id="8">BANK PAYMENT</option>
                          </optgroup>
                      </select>
                  </div>
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

 @include('dashboard.salary.manage_salary.manage_salary_js')

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
<script>
    $('.action-edit').click(function () {
        let htmlElement = this.parentElement.parentElement;
        let id = htmlElement.childNodes[5].value;
        let name = htmlElement.childNodes[7].textContent;
        let money = htmlElement.childNodes[11].value;
        document.getElementById('employeeId').value = id;
        document.getElementById('nameToPay').value = name;
        document.getElementById('moneyToPay').value = money;
        document.getElementById('nameToPayinput').value = name;
        document.getElementById('moneyToPayinput').value = money;

    });
</script>





@endsection
