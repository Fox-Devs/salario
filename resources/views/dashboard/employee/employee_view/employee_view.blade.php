@extends('dashboard.mainpage.app', ['title' => $employee_view->fname . ' ' . $employee_view->lname ])

@section('include_css')

  @include('dashboard.employee.employee_view.employee_view_css')

@endsection

@section('custom_css')




@endsection


@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ Route::currentRouteNamed() }}"></a>
  </li>
@endsection


@section('content')


<!-- // Here we put content -->



<!-- // Here we put content -->
<!-- page users view start -->
<section class="page-users-view">
  <div class="row">
    <!-- account start -->
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Account</div>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="users-view-image">
              <img src="{{ asset('uploads/employee') }}/{{ $employee_view->photo }}"
                class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
            </div>
            <div class="col-12 col-sm-9 col-md-6 col-lg-5">
              <table>

                <tr>
                  <td class="font-weight-bold">Name</td>
                  <td>{{ $employee_view->fname }} {{ $employee_view->lname }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Email</td>
                  <td>{{ $employee_view->email }}</td>
                </tr>

                <tr>
                  <td class="font-weight-bold">NID</td>
                  <td>{{ $employee_view->nid }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Blood Group</td>
                  <td>{{ $employee_view->blood }}</td>
                </tr>

              </table>
            </div>
            <div class="col-12 col-md-12 col-lg-5">
              <table class="ml-0 ml-sm-0 ml-lg-0">
                <tr>
                  <td class="font-weight-bold">Status</td>
                  <td>{{ $employee_view->relationBetweenStatus->name }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Designation</td>
                  <td>{{ $employee_view->relationBetweenDesignation->name }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Joining Date</td>
                  <td>{{ $employee_view->joining_date }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Basic Salary</td>
                  <td>{{ $employee_view->basic_salary }}</td>
                </tr>
                <tr>
                  <td class="font-weight-bold">Team Name</td>
                  <td>
                    @isset($employee_view->team)
                      {{ $employee_view->team }}
                      @else
                        NaN
                    @endisset
                  </td>
                </tr>

              </table>
            </div>
            <div class="col-12">
              <a href="{{ url('/app/v1/dashboard/employee/edit/') }}/{{ $employee_view->id }}/{{ $employee_view->slug }}" class="btn btn-primary mr-1"><i class="feather icon-edit-1"></i> Edit</a>
              <a class="btn btn-outline-danger" href="{{ url('/app/v1/dashboard/employee/terminate/') }}/{{ $employee_view->id }}/{{ $employee_view->slug }}"><i class="feather icon-trash-2"></i> TERMINATE</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- account end -->
    <!-- information start -->
    <div class="col-md-6 col-12 ">
      <div class="card">
        <div class="card-header">
          <div class="card-title mb-2">Information</div>
        </div>
        <div class="card-body">
          <table>
            <tr>
              <td class="font-weight-bold">Birth Date </td>
              <td>{{ $employee_view->dob }}
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">Mobile</td>
              <td>{{ $employee_view->contact_number }}</td>
            </tr>

            <tr>
              <td class="font-weight-bold">Gender</td>
              <td>{{ $employee_view->relationBetweenGender->name }}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Contact</td>
              <td>email, message, phone
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- information start -->
    <!-- social links end -->
    <div class="col-md-6 col-12 ">
      <div class="card">
        <div class="card-header">
          <div class="card-title mb-2">Social Links</div>
        </div>
        <div class="card-body">
          <table>
            <tr>
              <td class="font-weight-bold">Facebook</td>
              <td>{{ $employee_view->facebook }}
              </td>
            </tr>

            <tr>
              <td class="font-weight-bold">Github</td>
              <td>{{ $employee_view->github }}
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">CodePen</td>
              <td>{{ $employee_view->codepen }}
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">Linkedin</td>
              <td>{{ $employee_view->linkedin }}
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <!-- social links end -->

  </div>
</section>
<!-- page users view end -->


<!-- // Here we End content -->


<!-- // Here we End content -->


    <!-- END: Content-->

@endsection

@section('customizer')

  @include('dashboard.mainpage.widgets.customizer')

@endsection

@section('footer')

  @include('dashboard.mainpage.widgets.footer')

@endsection

@section('include_js')

  @include('dashboard.employee.employee_view.employee_view_js')

@endsection

@section('custom_js')



@endsection
