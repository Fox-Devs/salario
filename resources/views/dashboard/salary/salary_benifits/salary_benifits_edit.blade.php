@extends('dashboard.mainpage.app',['title'=> $salary_edit->salary_benifits])

@section('include_css')

  @include('dashboard.status.activation.activation_css')

@endsection


@section('content')


<!-- // Here we put content -->


<section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Editing <i data-feather="arrow-right"></i> {{ $salary_edit->salary_benifits }}</h4> </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" action="{{ url('/app/v1/dashboard/salary/benifits/update') }}/{{ $salary_edit->id }}/{{ $salary_edit->slug }}" method="post">
                                          @csrf
                                            <div class="form-body">
                                                <div class="row">


                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="first-name-column" class="form-control" placeholder="Salary Benifits" name="salary_benifits" value="{{ $salary_edit->salary_benifits }}">
                                                            <label for="first-name-column">Salary Benifits</label>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 col-12">
                                                        <div class="form-label-group">
                                                            <input type="text" id="first-name-column" class="form-control" placeholder="Benifit Type" name="benifit_type" value="{{ $salary_edit->benifit_type }}">
                                                            <label for="first-name-column">Benifit Type</label>
                                                        </div>
                                                    </div>



                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Update</button>
                                                        <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


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

  @include('dashboard.status.activation.activation_js')

@endsection

@section('include_js')

  @include('dashboard.status.activation.activation_js')

@endsection
