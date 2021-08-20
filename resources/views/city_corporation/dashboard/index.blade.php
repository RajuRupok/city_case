@extends('layouts.city_corporation.app')

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
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Total Incident</h6>
                            <h4 class="text-right">
                              <i class="fas fa-bolt pull-left bg-indigo c-icon"></i>
                              <span>{{ '$total_incident' }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Total Admin</h6>
                            <h4 class="text-right">
                                <i class="fas fa-user-plus pull-left bg-cyan c-icon"></i>
                                <span>{{ '$total_admin' }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Total Supporter</h6>
                            <h4 class="text-right">
                                <i class="fas fa-check pull-left bg-red c-icon"></i>
                                <span>{{ '$total_supporter' }}</span>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Total Victim</h6>
                            <h4 class="text-right"><i class="fas fa-users pull-left bg-purple c-icon"></i><span>{{ '$total_victim' }}</span></h4>
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
