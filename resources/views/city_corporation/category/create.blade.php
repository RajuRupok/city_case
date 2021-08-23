@extends('layouts.city_corporation.app')

@section('page_title', 'Create New Category')

@section('css_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="{{ asset('assets/bundles/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection

@section('breadcrumb_section')
    <li class="breadcrumb-item">Categories</li>
    <li class="breadcrumb-item active">Create New Category</li>
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
                    <h4>Create New Category</h4>
                </div>
                <form action="{{ route('city_corporation.category.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category Name <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" required placeholder="Ex: Water Service" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
        
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Short Name <sup class="text-danger">*</sup></label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" minlength="4" maxlength="4" required placeholder="Ex: WTSR" name="short_name" value="{{ old('short_name') }}" class="form-control text-uppercase @error('short_name') is-invalid @enderror">
        
                                @error('short_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-dark float-right m-b-15">Create Category</button>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
