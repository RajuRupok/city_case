@extends('layouts.citizen.app')

@section('page_title', '| My Cases | Details')

@section('stylesheet_links')
    {{--  External CSS  --}}

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
    </style>
@endsection

@section('content')
<!-- ======= My Cases Section ======= -->
<section id="myCases" class="features my-cases mt-5" style="min-height: 90vh;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ 'Case_Title_Here' }}</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
            {!! 'Case_Full_Details_Here' !!}
        </div>

        <hr>
        
        <div class="section-title" data-aos="fade-up">
            <h2>{{ __('Case Review') }}</h2>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="300">
            <div class="col-12">
                <p>Rating: <span class="text-bold">Good</span></p>
                <p class="mt-2">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Vero, temporibus.
                </p>
            </div>
            <form action="#" method="post">
                @csrf
                <div class="col-md-12 mb-3">
                    <label for="rating">{{ __('Rating') }} <sup class="text-danger">*</sup></label>
                    <select name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                        <option selected>{{ __('Select Rating') }}</option>
                        <option value="Bad">Bad</option>
                        <option value="Average">Average</option>
                        <option value="Good">Good</option>
                        <option value="Best">Best</option>
                    </select>
    
                    @error('rating')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="col-md-12">
                    <label for="review">{{ __('Write Review') }} <sup class="text-danger">*</sup></label>
                    <textarea id="review" name="review" class="form-control @error('review') is-invalid @enderror" placeholder="Write Your Review" required rows="4">{{ old('review') }}</textarea>
    
                    @error('review')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-dark btn-custom btn-block">{{ __('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End My Cases Section -->
@endsection


@section('script_links')
    {{--  External Javascript  --}}

@endsection

@section('scripts')
    {{--  External Javascript  --}}

@endsection
