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
        .ticket {
            display: inline-flex;
            width: fit-content;
            padding: 0px 20px 15px;
            background: #f5f5f5;
            border-radius: 50px;
        }

        .case-pending {
            color: orange;
        }
        .case-running {
            color: blue;
        }
        .case-completed {
            color: green;
        }
        .case-canceled {
            color: red;
        }
    </style>
@endsection

@section('content')
<!-- ======= My Cases Section ======= -->
<section id="myCases" class="features my-cases mt-5" style="min-height: 90vh;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ $case->title }}</h2>
            <div class="ticket">
                <p class="text-bold text-muted">Ticket No: <span class="text-uppercase text-dark">{{ $case->ticket }}</span></p>
            </div>
            <div class="ticket">
                <p class="text-bold text-muted">
                    Status: 
                    <span class="text-uppercase case-{{ $case->status }}">{{ $case->status }}</span>
                </p>
            </div>
            <div class="ticket">
                @php 
                    $dd = new DateTime($case->created_at); 
                    $date = $dd->format('d-m-Y');
                @endphp
                <p class="text-bold text-muted">
                    Created At: 
                    <span class="text-uppercase text-dark">{{ $date }}</span>
                </p>
            </div>

            @if ($case->status == 'completed')
                <div class="ticket">
                    @php 
                        $dd = new DateTime($case->ended_at); 
                        $date = $dd->format('d-m-Y');
                    @endphp
                    <p class="text-bold text-muted">
                        Completed At: 
                        <span class="text-uppercase text-dark">{{ $date }}</span>
                    </p>
                </div>
            @elseif ($case->status == 'canceled')
                <div class="ticket">
                    @php 
                        $dd = new DateTime($case->ended_at); 
                        $date = $dd->format('d-m-Y');
                    @endphp
                    <p class="text-bold text-muted">
                        Canceled At: 
                        <span class="text-uppercase text-dark">{{ $date }}</span>
                    </p>
                </div>
            @endif
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
            {!! $case->details !!}
        </div>

        <hr>

        <div class="row" data-aos="fade-up" data-aos-delay="300">

            @if ($case->status == 'completed')
                <div class="section-title" data-aos="fade-up">
                    <h2>{{ __('Completion Report') }}</h2>
                </div>
                <div class="report">
                    {!! $case->completion_report !!}
                </div>
            @elseif ($case->status == 'canceled')
                <div class="section-title" data-aos="fade-up">
                    <h2>{{ __('Cancelation Reason') }}</h2>
                </div>
                <div class="report">
                    {!! $case->cancelation_reason !!}
                </div>
            @endif
        </div>

        <hr>
        <div class="row justify-content-center">
            <div class="col-12">
                @if ($case->status == 'pending')
                    <h1 class="text-center">
                        <span class="badge bg-warning">
                            {{ __('Case Pending') }}
                        </span>
                    </h1>
                @elseif ($case->status == 'running')
                    <h1 class="text-center">
                        <span class="badge bg-info">
                            {{ __('Case Running') }}
                        </span>
                    </h1>
                @elseif ($case->status == 'canceled')
                    <h1 class="text-center">
                        <span class="badge bg-danger">
                            {{ __('Case Canceled') }}
                        </span>
                    </h1>
                @else
                    <div class="section-title" data-aos="fade-up">
                        <h2>{{ __('Case Review') }}</h2>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-delay="300">
                        @if ($case->review != NULL)
                            <div class="col-12">
                                <p>Rating: <span class="text-bold text-uppercase">{{ optional($case->review)->rating }}</span></p>
                                <p class="mt-2">
                                    {{ optional($case->review)->review }}
                                </p>
                            </div>
                        @endif
                        
                        @if ($case->status == 'completed' && $case->review == NULL)
                            <form action="{{ route('citizen.case.review', ['case_id' => $case->id, 'reviewer_id' => auth()->user()->id]) }}" method="post">
                                @csrf
                                <div class="col-md-12 mb-3">
                                    <label for="rating">{{ __('Rating') }} <sup class="text-danger">*</sup></label>
                                    <select name="rating" class="form-select @error('rating') is-invalid @enderror" required>
                                        <option selected>{{ __('Select Rating') }}</option>
                                        <option value="bad">Bad</option>
                                        <option value="average">Average</option>
                                        <option value="good">Good</option>
                                        <option value="best">Best</option>
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
                        @endif
                    </div>
                @endif
            </div>
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
