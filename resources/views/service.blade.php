@extends('layouts.citizen.app')

@section('page_title', '| Services')

@section('stylesheet_links')
    {{--  External CSS  --}}

@endsection

@section('stylesheet')
    {{--  External CSS  --}}

@endsection

@section('content')
<!-- ======= Features Section ======= -->
<section id="features" class="features mt-5" style="min-height: 90vh;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ __('Services') }}</h2>
            <p>{{ __('All services that are provided by Us') }}</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
            @foreach ($services as $service)
                <div class="col-md-4 mb-4">
                    <div class="icon-box">
                        <i class="ri-quill-pen-line" style="color: var(--primaryColor);"></i>
                        <h3>
                            <a href="javascript:void(0);">{{ $service->name }}</a>
                        </h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- End Features Section -->
@endsection


@section('script_links')
    {{--  External Javascript  --}}

@endsection

@section('scripts')
    {{--  External Javascript  --}}

@endsection
