@extends('layouts.city_corporation.app')

@section('page_title', 'Case Details Details')

@section('css_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/select2/dist/css/select2.min.css') }}">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection

@section('breadcrumb_section')
    <li class="breadcrumb-item">Cases</li>
    <li class="breadcrumb-item">
      <a href="{{ route('city_corporation.category.index') }}">All Cases</a>
    </li>
    <li class="breadcrumb-item">Details ({{ $case->ticket }})</li>
@endsection

@section('main_content')
    {{-- ========================================================================
    ============================< Main Section Starts >==========================
    ======================================================================== --}}    
    <div class="section-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card author-box">
                    <div class="card-body">
                        <div class="author-box-center">
                            <div class="author-box-name">
                                <h4 class="text-bold">{{ __('Case Summary') }}</h4>
                            </div>
                        </div>
                        <div class="py-1">
                            <p class="clearfix">
                                <span class="float-left">
                                    Ticket:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $case->ticket }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Title:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $case->title }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Location:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $case->location }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Case Creator:
                                </span>
                                <span class="float-right text-muted">
                                    <a href="{{ route('city_corporation.citizen.show', ['id' => $case->citizen->id]) }}" target="_blank" class="text-bold">
                                        {{ $case->citizen->name }}
                                    </a>
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Created At:
                                </span>    
                                @php 
                                    $dd = new DateTime($case->created_at); 
                                    $date = $dd->format('d-m-Y');
                                @endphp    
                                <span class="float-right text-muted">
                                    {{ $date }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Category:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $case->category->name }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Support Staff:
                                </span>
                                <span class="float-right text-muted">
                                    @if ($case->support_staff != NULL)
                                        <a href="{{ route('city_corporation.support_staff.show', ['id' => optional($case->support_staff)->id]) }}" target="_blank" class="text-bold">
                                            {{ optional($case->support_staff)->name }}
                                        </a>
                                    @else
                                        Not Assigned
                                    @endif
                                </span>
                            </p>

                            @if ($case->support_staff != NULL)
                                <p class="clearfix">
                                    <span class="float-left">
                                        Support Staff Assigned At:
                                    </span>    
                                    @php 
                                        $dd = new DateTime($case->started_at); 
                                        $started_at = $dd->format('d-m-Y');
                                    @endphp    
                                    <span class="float-right text-muted">
                                        {{ $started_at }}
                                    </span>
                                </p>                                
                            @endif

                            <p class="clearfix">
                                <span class="float-left">
                                    Status:
                                </span>
                                <span class="float-right text-uppercase" style="font-weight: 900;">
                                    {{ $case->status }}
                                </span>
                            </p>

                            @if ($case->support_staff != NULL && $case->status == 'completed')
                                <p class="clearfix">
                                    <span class="float-left">
                                        Case Completed At:
                                    </span>    
                                    @php 
                                        $dd = new DateTime($case->ended_at); 
                                        $ended_at = $dd->format('d-m-Y');
                                    @endphp    
                                    <span class="float-right text-muted">
                                        {{ $ended_at }}
                                    </span>
                                </p>                                
                            @elseif ($case->support_staff != NULL && $case->status == 'canceled')
                                <p class="clearfix">
                                    <span class="float-left">
                                        Case Canceled At:
                                    </span>    
                                    @php 
                                        $dd = new DateTime($case->ended_at); 
                                        $ended_at = $dd->format('d-m-Y');
                                    @endphp    
                                    <span class="float-right text-muted">
                                        {{ $ended_at }}
                                    </span>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    
            <div class="col-md-8">
                <div class="card card-secondary">
                    <div class="card-header">
                      <h4>Case Details</h4>
                      @if ($case->status != 'completed' || 'canceled')
                        <div class="card-header-action">
                            @if ($case->status == 'pending' || $case->status == 'running')
                                <a href="{{ route('city_corporation.case.cancel', ['case_id' => $case->id]) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are You Sure Want to Cancel This Case?');">Cancel</a>                                
                            @endif

                            @if ($case->status == 'pending')
                                <a href="javascript:void(0);" type="button" data-toggle="modal"
                                data-target=".bd-example-modal-sm" class="btn btn-success btn-sm">Approve</a>

                                {{-- Modal Here --}}
                                @include('city_corporation.case.modals.assign_supporter')
                            @endif
                        </div>
                      @endif
                    </div>
                    <div class="card-body">
                        {!! $case->details !!}
                    </div>
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
    <script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
