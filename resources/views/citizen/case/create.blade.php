@extends('layouts.citizen.app')

@section('page_title', '| My Cases')

@section('stylesheet_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/summernote-bs4.css') }}">
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
                    <form action="#" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="category">Case Category <sup class="text-danger">*</sup></label>
                                    <select name="category" class="form-select @error('category') is-invalid @enderror" required>
                                        <option selected>Select Category</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
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
@endsection

@section('scripts')
    {{--  External Javascript  --}}
    <script>
        "use strict";
        $(document).ready(function() {
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
