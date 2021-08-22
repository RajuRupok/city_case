@extends('layouts.service_manager.app')

@section('page_title', 'Create New Support Staff')

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection

@section('breadcrumb_section')
    <li class="breadcrumb-item">Support Staffs</li>
    <li class="breadcrumb-item active">Create New Support Staff</li>
@endsection

@section('main_content')
    {{-- ========================================================================
    ============================< Main Section Starts >==========================
    ======================================================================== --}}


    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create New Support Staff</h4>
                </div>
                <form action="{{ route('service_manager.support_staff.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" required placeholder="Name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" required placeholder="Mobile Number" name="mobile" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NID <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" minlength="10" maxlength="15" required placeholder="NID" name="nid" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                              <textarea name="address" class="form-control" placeholder="Address" required rows="4">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" required placeholder="Login Email" name="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="password" required placeholder="Login Password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark float-right m-b-15">Create Support Staff</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>


    {{-- ========================================================================
    =============================< Main Section Ends >===========================
    ======================================================================== --}}
@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
