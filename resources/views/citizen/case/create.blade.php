@extends('layouts.citizen.app')

@section('page_title', '| My Cases')

@section('stylesheet_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/select2/dist/css/select2.min.css') }}">
@endsection

@section('stylesheet')
    {{--  External CSS  --}}
    <style>
        select, textarea {
            outline: none !important;
            box-shadow: none !important;
            border-radius: 0px !important;
            border: 1px solid var(--primaryColor) !important;
        }
        .modal-backdrop {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1040;
            width: auto;
            height: auto;
            background-color: #000;
        }
        .select2-container .select2-selection--single {
            height: 38px;
            border-radius: 0px !important;
            border-color: var(--primaryColor);
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 34px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 6px;
        }
    </style>
@endsection

@section('content')
<!-- ======= My Cases Section ======= -->
<section id="myCases" class="features my-cases mt-5" style="min-height: 90vh;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ __('Create New Case') }}</h2>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-12">
                <div class="card">
                    <form action="{{ route('citizen.case.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category">Case Category <sup class="text-danger">*</sup></label>
                                    <select name="category" class="form-select select2 @error('category') is-invalid @enderror" required>
                                        <option selected>Select Category</option>
                                        @foreach ($categories as $data)
                                            <option value="{{ $data->id }}">{{ $data->name }}</option>                                            
                                        @endforeach
                                    </select>
        
                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="title">Case Title <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required placeholder="Case Title">
        
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="location">Location <sup class="text-danger">*</sup></label>
                                    <textarea id="location" name="location" class="form-control @error('location') is-invalid @enderror" placeholder="Location" required rows="2">{{ auth()->user()->address ?? old('location') }}</textarea>
        
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <label for="details">Case Description <sup class="text-danger">*</sup></label>
                                    <textarea id="details" name="details" class="form-control @error('details') is-invalid @enderror" placeholder="Details" required rows="4">{{ old('details') }}</textarea>
        
                                    @error('details')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-dark btn-custom float-end mb-3 mt-3">{{ __('Submit Case') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End My Cases Section -->
@endsection


@section('script_links')
    {{--  External Javascript  --}}
    <script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('scripts')
    {{--  External Javascript  --}}
    <script>
        "use strict";
        $(document).ready(function() {
            $(".select2").select2();
            /* -- Form Editors - Summernote -- */
            $('#details').summernote({
                placeholder: 'Write your Case here...',
                height: 320,
                minHeight: null,
                maxHeight: null,
                focus: true,
                toolbar: [
                    ['font', ['bold', 'underline']],
                    ['para', ['ul', 'ol']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'help']]
                ]
            });
        });
    </script>
@endsection
