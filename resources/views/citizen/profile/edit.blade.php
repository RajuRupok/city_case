@extends('layouts.citizen.app')

@section('page_title', '| Edit Profile')

@section('stylesheet_links')
    {{--  External CSS  --}}

@endsection

@section('stylesheet')
    {{--  External CSS  --}}
    <style>
        textarea {
            outline: none !important;
            box-shadow: none !important;
            border-radius: 0px !important;
            border: 1px solid var(--primaryColor) !important;
        }
    </style>
@endsection

@section('content')
<!-- ======= Profile Section ======= -->
<section id="profile" class="profile mt-5" style="min-height: 90vh;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ auth()->user()->name }}</h2>
            {{-- <p>{{ __('All services that are provided by Us') }}</p> --}}
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-start text-bold">Edit Profile</h2>
                        <a href="{{ route('citizen.profile.index') }}" class="btn btn-dark btn-custom float-end">Back</a>
                    </div>

                    <form action="#" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="name">Full Name <sup class="text-danger">*</sup></label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name ?? old('name') }}" required placeholder="Full Name">
        
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email <sup class="text-danger">*</sup></label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email ?? old('email') }}" required placeholder="Email">
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="mobile">Mobile No. <sup class="text-danger">*</sup></label>
                                    <input type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ auth()->user()->mobile ?? old('mobile') }}" required placeholder="Mobile">
        
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="nid">NID <sup class="text-danger">*</sup></label>
                                    <input type="number" minlength="10" maxlength="15" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ auth()->user()->nid ?? old('nid') }}" required placeholder="NID">
        
                                    @error('nid')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label for="address">Address <sup class="text-danger">*</sup></label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" required rows="4">{{ auth()->user()->address ?? old('address') }}</textarea>
        
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button class="btn btn-dark btn-custom float-end mb-3 mt-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Profile Section -->
@endsection


@section('script_links')
    {{--  External Javascript  --}}

@endsection

@section('scripts')
    {{--  External Javascript  --}}

@endsection
