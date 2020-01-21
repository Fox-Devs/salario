@extends('dashboard.mainpage.app', ['title' => $employee_edit->fname . ' ' . $employee_edit->lname ])

@section('include_css')

  @include('dashboard.employee.employee_edit.employee_edit_css')

@endsection

@section('custom_css')

  <style media="screen">

  .image-preview-input {
  position: relative;
  overflow: hidden;
  margin: 0px;
  color: #333;
  background-color: #fff;
  border-color: #ccc;
  padding: 0 !important;
  }
  .image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
  }
  .image-preview-input-title {
  margin-left:2px;
  }

  #dynamic{
  width: 100px;
  }

  /* .bs-popover-bottom{
  left: 200px !important;
  } */
  </style>

@endsection


@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{ Route::currentRouteNamed() }}"></a>
  </li>
@endsection


@section('content')

  <!-- BEGIN: Content-->


<!-- // Here we put content -->

<!-- BEGIN:users edit -->

<section class="users-edit">
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        <ul class="nav nav-tabs mb-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account"
              aria-controls="account" role="tab" aria-selected="true">
              <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Account</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information"
              aria-controls="information" role="tab" aria-selected="false">
              <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Information</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social"
              aria-controls="social" role="tab" aria-selected="false">
              <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Social</span>
            </a>
          </li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- users edit media object start -->

            <form action="{{ url('/app/v1/dashboard/employee/update/photo') }}/{{ $employee_edit->id }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="media mb-2">
                <a class="mr-2 my-25" href="#">
                  <img src="{{ asset('uploads/employee') }}/{{ $employee_edit->photo }}" alt="{{ $employee_edit->fname . ' ' . $employee_edit->lname }}"
                    class="users-avatar-shadow rounded" height="90" width="90">
                </a>
                <div class="media-body mt-50">
                  <h4 class="media-heading">{{ $employee_edit->fname . ' ' . $employee_edit->lname }}</h4>
                  {{-- <div class="col-12 d-flex mt-1 px-0">
                    <a href="#" class="btn btn-primary d-none d-sm-block mr-75">Change</a>
                    <a href="#" class="btn btn-primary d-block d-sm-none mr-75"><i
                        class="feather icon-edit-1"></i></a>
                    <a href="#" class="btn btn-outline-danger d-none d-sm-block">Remove</a>
                    <a href="#" class="btn btn-outline-danger d-block d-sm-none"><i class="feather icon-trash-2"></i></a>
                  </div> --}}
<div class="col-3 d-flex mt-1 px-0">
                  <!-- image-preview-filename input [CUT FROM HERE]-->
                       <div class="input-group image-preview" style="width:50%;">
                           <input style="display: none;" required type="text" value="{{ old('photo') }}" name="photo" class="form-control image-preview-filename" disabled="disabled" placeholder="Click Browse To Upload Image"> <!-- don't give a name === doesn't send on POST/GET -->
                           <span class="input-group-btn">
                               <!-- image-preview-clear button -->
                               {{-- <button type="button" class="btn btn-warning image-preview-clear">
                                   <span class="glyphicon glyphicon-remove"></span> Clear
                               </button> --}}
                               <!-- image-preview-input -->
                               <div class="btn btn-default image-preview-input">
                                   <span class="glyphicon glyphicon-folder-open"></span>
                                   <span class="image-preview-input-title btn btn-primary">Browse</span>
                                   <input required type="file" value="{{ old('photo') }}" accept="image/png, image/jpeg, image/gif" name="photo"/> <!-- rename it -->
                               </div>
                           </span>


                       </div>
                       <button id="image-button" type="submit" class="btn btn-success" style="display:none;">Submit</button>

                       <!-- /input-group image-preview [TO HERE]-->
</div>

                </div>
              </div>

            </form>



            <!-- users edit media object ends -->
            <!-- users edit account form start -->
            <form class="form" action="{{ url('/app/v1/dashboard/employee/update') }}/{{ $employee_edit->id }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname" value="{{ $employee_edit->fname }}" required>
                                <label for="first-name-column">First Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" id="last-name-column" class="form-control" placeholder="Last Name" name="lname" value="{{ $employee_edit->lname }}" required>
                                <label for="last-name-column">Last Name</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="email" id="email-column" class="form-control" placeholder="Email" name="email" value="{{ $employee_edit->email }}" required>
                                <label for="email-column">Email</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="number" id="nid-floating" class="form-control" name="nid" placeholder="NID" value="{{ $employee_edit->nid }}" required>
                                <label for="nid-floating">NID</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" name="dob" class="form-control pickadate picker__input picker__input--active" value="{{ $employee_edit->dob }}" required readonly="" id="P656780448" aria-haspopup="true" aria-readonly="false" aria-owns="P656780448_root" required placeholder="Date Of Birth"
                                  data-validation-required-message="This birthdate field is required">
                                <label for="email-column">Date Of Birth</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="141">
                                <select data-placeholder="Select a Gender..." name="gender_id" required value="{{ $employee_edit->gender_id }}" class="select2-icons form-control select2-hidden-accessible" id="select2-icons" data-select2-id="select2-icons" tabindex="-1" aria-hidden="true">
                                  <option value="{{ $employee_edit->gender_id }}" data-icon="{{ $employee_edit->gender_id === 1 ? "fa fa-mars" : "fa fa-venus" }}" selected="">{{ $employee_edit->relationBetweenGender->name }}</option>

                                    <optgroup label="Gender" data-select2-id="143">

                                      @foreach ($genders as $gender)
                                        <option value="{{ $gender->id }}" data-icon="{{ $gender->id === 1 ? "fa fa-mars" : "fa fa-venus" }}">{{ $gender->name }}</option>
                                      @endforeach


                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="142">
                                <select class="select2 form-control select2-hidden-accessible" value="{{ old('blood') }}" required name="blood" data-select2-id="4" tabindex="-1" aria-hidden="true">

                                  <option value="{{ $employee_edit->blood }}" selected=" ">{{ $employee_edit->blood }}</option>

                                    <optgroup label="Blood Group">
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group" data-select2-id="156">
                                <select name="designation_id" value="{{ old('designation_id') }}" required class="select2-theme form-control select2-hidden-accessible" id="select2-theme" data-select2-id="select2-theme" tabindex="-1" aria-hidden="true">

                                  <option value="{{ $employee_edit->designation_id }}" selected=" ">{{ $employee_edit->relationBetweenDesignation->name }}</option>

                                    <optgroup label="Management" data-select2-id="157">
                                      @foreach ($designations as $designation)

                                        <option value="{{ $designation->id }}">{{ $designation->name }}</option>
                                      @endforeach

                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" name="joining_date" value="{{ $employee_edit->joining_date }}" required class="form-control pickadate picker__input picker__input--active" readonly="" id="P656780449" aria-haspopup="true" aria-readonly="false" aria-owns="P656780449_root">
                                <label for="P656780449">Joining Date</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="number" id="salary-column" class="form-control" value="{{ $employee_edit->basic_salary }}" required placeholder="Basic Salary" name="basic_salary">
                                <label for="salary-column">Basic Salary</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="number" id="Contact-column" class="form-control" placeholder="Contact Number" required value="{{ $employee_edit->contact_number }}" name="contact_number">
                                <label for="Contact-column">Contact Number</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-label-group">
                                <input type="text" id="Team-column" class="form-control" placeholder="Team Name (Optional)" value="{{ $employee_edit->team }}" name="team">
                                <label for="Team-column">Team Name</label>
                            </div>
                        </div>

                        <div class="form-group col-12">
                            <ul class="list-unstyled mb-0">

                              <li class="d-inline-block mr-2">
                                  <fieldset>
                                      <div class="vs-radio-con">
                                          <input checked type="radio" required name="status_id" value="{{ $employee_edit->status_id }}"> <span class="vs-radio">
                                            <span class="vs-radio--border"></span> <span class="vs-radio--circle"></span> </span> <span class="">{{ $employee_edit->relationBetweenStatus->name }}</span> </div>
                                  </fieldset>
                              </li>

                              ||

                              @foreach ($activations as $activation)

                                <li class="d-inline-block mr-2">
                                    <fieldset>
                                        <div class="vs-radio-con">
                                            <input type="radio" required name="status_id" value="{{ $activation->id }}"> <span class="vs-radio">
                    <span class="vs-radio--border"></span> <span class="vs-radio--circle"></span> </span> <span class="">{{ $activation->name }}</span> </div>
                                    </fieldset>
                                </li>

                              @endforeach

                            </ul>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- users edit account form ends -->
          </div>
          <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
            <!-- users edit Info form start -->
            <form novalidate action="{{ url('/app/v1/dashboard/employee/update/information') }}/{{ $employee_edit->id }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row mt-1">

                <div class="col-12 col-sm-6">
                  <h5 class="mb-1 mt-2 mt-sm-0"><i class="feather icon-map-pin mr-25"></i>Address</h5>
                  <div class="form-group">
                    <div class="controls">
                      <label>Address</label>
                      <input type="text" name="address" class="form-control" value="{{ $employee_edit->address }}" required
                        placeholder="Address Line 1" data-validation-required-message="This Address field is required">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="controls">
                      <label>Postcode</label>
                      <input type="text" class="form-control" required placeholder="postcode" name="post_code" value="{{ $employee_edit->post_code }}"
                        data-validation-required-message="This Postcode field is required">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="controls">
                      <label>District</label>
                      <input type="text" name="district" class="form-control" required value="{{ $employee_edit->district }}"
                        data-validation-required-message="This Time Zone field is required">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="controls">
                      <label>City</label>
                      <input type="text" class="form-control" name="city" required value="{{ $employee_edit->city }}"
                        data-validation-required-message="This Time Zone field is required">
                    </div>
                  </div>


                </div>
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                  <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                    Changes</button>
                  <button type="reset" class="btn btn-outline-warning">Reset</button>
                </div>
              </div>
            </form>
            <!-- users edit Info form ends -->
          </div>


          <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
            <!-- users edit socail form start -->
            <form novalidate action="{{ url('/app/v1/dashboard/employee/update/social') }}/{{ $employee_edit->id }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col-12 col-sm-6">

                  <fieldset>

                    <label>Facebook</label>
                    <div class="input-group mb-75">
                      <div class="input-group-prepend">
                        <span class="input-group-text feather icon-facebook" id="basic-addon4"></span>
                      </div>
                      <input type="text" class="form-control" name="facebook" value="{{ $employee_edit->facebook }}"
                        placeholder="https://www.facebook.com/" aria-describedby="basic-addon4">
                    </div>


                    <label>Linkedin</label>
                    <div class="input-group mb-75">
                      <div class="input-group-prepend">
                        <span class="input-group-text feather icon-linkedin" id="basic-addon5"></span>
                      </div>
                      <input type="text" class="form-control" name="linkedin" value="{{ $employee_edit->linkedin }}"
                        placeholder="https://www.linkedin.com/" aria-describedby="basic-addon5">
                    </div>


                  </fieldset>
                </div>
                <div class="col-12 col-sm-6">
                  <label>Github</label>
                  <div class="input-group mb-75">
                    <div class="input-group-prepend">
                      <span class="input-group-text feather icon-github" id="basic-addon9"></span>
                    </div>
                    <input type="text" class="form-control" name="github" value="{{ $employee_edit->github }}"
                      placeholder="https://www.github.com/" aria-describedby="basic-addon9">
                  </div>
                  <label>Codepen</label>
                  <div class="input-group mb-75">
                    <div class="input-group-prepend">
                      <span class="input-group-text feather icon-codepen" id="basic-addon12"></span>
                    </div>
                    <input type="text" class="form-control" name="codepen" value="{{ $employee_edit->codepen }}"
                      placeholder="https://www.codepen.com/" aria-describedby="basic-addon12">
                  </div>

                </div>
                <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                  <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                    Changes</button>
                  <button type="reset" class="btn btn-outline-warning">Reset</button>
                </div>
              </div>
            </form>
            <!-- users edit socail form ends -->
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

  @include('dashboard.employee.employee_edit.employee_edit_js')

@endsection

@section('custom_js')


  <script type="text/javascript">
  $(document).on('click', '#close-preview', function(){
      $('.image-preview').popover('hide');
      // Hover befor close the preview
      $('.image-preview').hover(
          function () {
             $('.image-preview').popover('show');
          },
           function () {
             $('.image-preview').popover('hide');
          }
      );
  });

  $(function() {
      // Create the close button
      var closebtn = $('<button/>', {
          type:"button",
          text: 'x',
          id: 'close-preview',
          style: 'font-size: initial;',
      });
      closebtn.attr("class","close pull-right");
      // Set the popover default content
      $('.image-preview').popover({
          trigger:'manual',
          html:true,
          title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
          content: "There's no image",
          placement:'bottom'
      });
      // Clear event
      $('.image-preview-clear').click(function(){
          $('.image-preview').attr("data-content","").popover('hide');
          $('.image-preview-filename').val("");
          $('.image-preview-clear').hide();
          $('.image-preview-input input:file').val("");
          $(".image-preview-input-title").text("Browse");
      });
      // Create the preview image
      $(".image-preview-input input:file").change(function (){
          var img = $('<img/>', {
              id: 'dynamic',
              width:100,
              height:100
          });
          var file = this.files[0];
          var reader = new FileReader();
          // Set preview image into the popover data-content
          reader.onload = function (e) {
              $(".image-preview-input-title").text("Change");
              $(".image-preview-clear").show();
              $(".image-preview-filename").val(file.name);
              img.attr('src', e.target.result);
              $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
          }
          reader.readAsDataURL(file);
          document.getElementById('image-button').style='display:block';
      });
  });
  </script>

@endsection
