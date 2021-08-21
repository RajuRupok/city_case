@extends('layouts.citizen.app')

@section('page_title', '| My Cases')

@section('stylesheet_links')
    {{--  External CSS  --}}

@endsection

@section('stylesheet')
    {{--  External CSS  --}}

@endsection

@section('content')
<!-- ======= My Cases Section ======= -->
<section id="myCases" class="features my-cases mt-5" style="min-height: 90vh;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ __('My All Cases') }}</h2>
            {{-- <p>{{ __('All services that are provided by Us') }}</p> --}}
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
            @foreach ($cases as $case)
                <div class="col-md-4 mb-4">
                    <div class="icon-box">
                        <i class="ri-gradienter-line" style="color: var(--primaryColor);"></i>
                        <h3>
                            <a href="{{ route('citizen.case.show', ['case_id' => decbin($case->id)]) }}">
                                {{ $case->title }}
                            </a>
                        </h3>
                    </div>
                </div>                
            @endforeach
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
