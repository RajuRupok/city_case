@extends('layouts.support_staff.app')

@section('page_title', 'Dashboard')

@section('css_links')
    {{--  External CSS  --}}

@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection

@section('breadcrumb_section')
    <li class="breadcrumb-item">Dashboard</li>
@endsection

@section('main_content')
    {{-- ========================================================================
    ============================< Main Section Starts >==========================
    ======================================================================== --}}


    <section class="section">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Total Cases Under Me</h6>
                            <h4 class="text-right">
                              <i class="fas fa-bolt pull-left bg-indigo c-icon"></i>
                              <span>{{ $totalCase }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Total Completed Cases By Me</h6>
                            <h4 class="text-right">
                                <i class="fas fa-check pull-left bg-green c-icon"></i>
                                <span>{{ $totalCompletedCase }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Total Canceled Cases By Me</h6>
                            <h4 class="text-right">
                                <i class="fas fa-times pull-left bg-red c-icon"></i>
                                <span>{{ $totalCanceledCase }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ========================================================================
    =============================< Main Section Ends >===========================
    ======================================================================== --}}
@endsection


@section('script_links')
    {{--  External Javascript Links --}}

@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
