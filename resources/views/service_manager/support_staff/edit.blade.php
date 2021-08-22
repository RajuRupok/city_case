@extends('layouts.service_manager.app')

@section('page_title', 'Edit Support Staff')

@section('css_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/select2/dist/css/select2.min.css') }}">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection

@section('breadcrumb_section')
    <li class="breadcrumb-item">Support Staffs</li>
    <li class="breadcrumb-item active">Edit Support Staff</li>
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
                    <h4>Edit Support Staff</h4>
                </div>
                <form action="{{ route('service_manager.support_staff.update', ['id' => $support_staff->id]) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" required placeholder="Name" value="{{ $support_staff->name }}" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mobile <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" required placeholder="Mobile Number" value="{{ $support_staff->mobile }}" name="mobile" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NID <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" value="{{ $support_staff->nid }}" minlength="10" maxlength="15" required placeholder="NID" name="nid" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                              <textarea name="address" class="form-control" placeholder="Address" required rows="4">{{ $support_staff->address }}</textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                              <select class="form-control select2" name="category_id" required>
                                <option>Select Category</option>
                                @foreach ($categories as $category)
                                  <option @if ($support_staff->category_id == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                              </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" value="{{ $support_staff->email }}" required placeholder="Login Email" name="email" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark float-right m-b-15">Update Support Staff</button>
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
    <!-- JS Libraies -->
    <script src="{{ asset('assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('assets/js/page/create-post.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
