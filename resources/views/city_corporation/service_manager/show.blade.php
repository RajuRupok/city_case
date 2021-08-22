@extends('layouts.city_corporation.app')

@section('page_title', 'Support Manager Details')

@section('css_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection

@section('breadcrumb_section')
    <li class="breadcrumb-item">Support Managers</li>
    <li class="breadcrumb-item">
      <a href="{{ route('city_corporation.service_manager.index') }}">All Support Managers</a>
    </li>
    <li class="breadcrumb-item">Support Manager Details</li>
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
                                <h4 class="text-bold">{{ $service_manager->name }}</h4>
                            </div>
                            <div class="author-box-job">{{ $service_manager->role }}</div>
                        </div>
                        <div class="py-1">
                            <p class="clearfix">
                                <span class="float-left">
                                    Email:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $service_manager->email }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Mobile:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $service_manager->mobile }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    NID:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $service_manager->nid }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Address:
                                </span>
                                <span class="float-right text-muted">
                                    {{ $service_manager->address }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Category:
                                </span>
                                <span class="float-right text-muted">
                                    {{ optional($service_manager->category)->name }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Joined At:
                                </span>
    
                                @php 
                                    $dd = new DateTime($service_manager->created_at); 
                                    $date = $dd->format('d-m-Y');
                                @endphp
    
                                <span class="float-right text-muted">
                                    {{ $date }}
                                </span>
                            </p>
                            <p class="clearfix">
                                <span class="float-left">
                                    Status:
                                </span>
                                <span class="float-right text-uppercase" style="font-weight: 900;">
                                    {{ $service_manager->status }}
                                </span>
                            </p>
                        </div>
                    </div>

                    <div class="card-footer text-center pt-0">
                        @if ($service_manager->status == 'active')
                            <a href="{{ route('city_corporation.service_manager.status', ['id' => $service_manager, 'status' => 'inactive']) }}" class="btn btn-dark confirmation">Deactivate</a>
                        @elseif ($service_manager->status == 'inactive')
                            <a href="{{ route('city_corporation.service_manager.status', ['id' => $service_manager, 'status' => 'active']) }}" class="btn btn-dark confirmation">Activate</a>
                        @endif

                        <a href="{{ route('city_corporation.service_manager.edit', ['id' => $service_manager->id]) }}" class="btn btn-dark m-l-5">Edit</a>
                    </div>
                </div>
            </div>
    
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ optional($service_manager->category)->name }} Related Cases</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th class="text-center">Sl.</th>
                                        <th>Case Ticket</th>
                                        <th>Created At</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cases as $sl => $case)
                                        <tr>
                                            <td>{{ $sl+1 }}</td>
                                            <td>
                                                {{ $case->ticket }}
                                            </td>
        
                                            @php 
                                                $created_at = new DateTime($case->created_at);
                                            @endphp        
                                            <td>{{ $created_at->format('d M Y') }}</td>

                                            <td class="text-uppercase text-bold">
                                                {{ $case->status }}
                                            </td>
                                            <td>
                                                <a href="{{ route('city_corporation.case.show', ['id' => $case->id]) }}" target="_blank" class="btn btn-dark btn-sm">Details</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
    <!-- JS Libraies -->
    <script src="{{ asset('backend/assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('backend/assets/js/page/datatables.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
