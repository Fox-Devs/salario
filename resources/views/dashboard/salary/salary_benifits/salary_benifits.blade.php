@extends('dashboard.mainpage.app', ['title' => 'Salary Benifits'])

@section('include_css')

  @include('dashboard.salary.salary_benifits.salary_benifits_css')

@endsection


@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ Route::currentRouteNamed() }}"></a>
  </li>
@endsection


@section('content')


<!-- // Here we put content -->

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
          <a class="dropdown-item" href="{{ route('activation_multi_delete') }}" id="delete"><i data-feather="trash"></i>Delete All</a>
        </div>
      </div>
    </div>
  </div>

  <!-- DataTable starts -->
  <div class="table-responsive">
    <table class="table data-list-view" id="table_data">
      <thead>
        <tr>
          <th></th>
          <th>COMMENTS</th>
          <th>ID</th>
          <th>ACTION</th>
        </tr>
      </thead>
      <tbody>






        @foreach ($salary_benifits as $salary_benifit)

<form action="{{ route('activation_multi_delete') }}" method="post">

          <tr>
            <td></td>
            {{-- <td id="delete">
              <input type="hidden" name="delete[]" value="{{ $activation->id }}">
            </td> --}}
            <td class="product-name">{{ $salary_benifit->salary_benifits }}</td>
            <td class="product-category">{{ $salary_benifit->benifit_type }}</td>
            <td class="product-action">
              <span>
                <a href="{{ url('/app/v1/dashboard/salary/benifits/edit') }}/{{ $salary_benifit->id }}/{{ $salary_benifit->slug }}">
                  <i data-feather="edit" class="primary"></i>
                </a>
                </span>
              <span class="action-delete"><a href="{{ url('/app/v1/dashboard/salary/benifits/delete') }}/{{ $salary_benifit->id }}/{{ $salary_benifit->slug }}"><i data-feather="trash" class="danger"></i></a>
              </span>
            </td>
          </tr>

          </form>

        @endforeach

      </tbody>
    </table>
  </div>
  <!-- DataTable ends -->

  <!-- add new sidebar starts -->
  <div class="add-new-data-sidebar">
    <div class="overlay-bg"></div>
    <div class="add-new-data">
      <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
        <div>
          <h4 class="text-uppercase">ADD SALARY BENIFITS</h4>
        </div>
        <div class="hide-data-sidebar">
          <i data-feather='x'></i>
        </div>
      </div>
      <div class="data-items pb-3">

        <form action="{{ route('salary_benifits_create') }}" method="post">

          @csrf

          <div class="data-fields px-2 mt-3">
            <div class="row">

              <div class="col-sm-12 data-field-col">
                <label for="salary_benifits">Add Salary Benifit</label>
                <input type="text" name="salary_benifits" class="form-control" id="salary_benifits">
              </div>

              <div class="col-sm-12 data-field-col">
                <label for="benifit_type">Benifit Type</label>
                    <select class="select2 form-control select2-hidden-accessible" required name="benifit_type" data-select2-id="4" tabindex="-1" aria-hidden="true">
                        <optgroup label="Blood Group">
                            <option value="Add">Add</option>
                            <option value="Deduct">Deduct</option>
                        </optgroup>
                    </select>
              </div>


            </div>
          </div>

          <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
              <button class="btn btn-primary" type="submit">Add Data</button>
            </div>
            <div class="cancel-data-btn hide-data-sidebar">
              <a class="btn btn-outline-danger">Cancel</a>
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


    <!-- END: Content-->

@endsection

@section('customizer')

  @include('dashboard.mainpage.widgets.customizer')

@endsection

@section('footer')

  @include('dashboard.mainpage.widgets.footer')

@endsection

@section('include_js')

  @include('dashboard.salary.salary_benifits.salary_benifits_js')

@endsection

@section('custom_js')

  <script type="text/javascript">


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

@endsection
