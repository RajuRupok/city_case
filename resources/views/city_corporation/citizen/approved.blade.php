@extends('layouts.city_corporation.app')

@section('page_title', 'Approved Citizens')

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
    <li class="breadcrumb-item">Citizens</li>
    <li class="breadcrumb-item active">Approved Citizens</li>
@endsection

@section('main_content')
    {{-- ========================================================================
    ============================< Main Section Starts >==========================
    ======================================================================== --}}


    
    <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Approved Citizens</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">Sl.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Registered At</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <tbody>
                          @foreach ($citizens as $sl => $citizen)
                          <tr>
                              <td>{{ $sl+1 }}</td>
                              <td>
                                  {{ $citizen->name }}
                              </td>
                              <td>
                                  {{ $citizen->email }}
                              </td>
                              <td>
                                  {{ $citizen->mobile }}
                              </td>

                              @php
                                  $dd = new DateTime($citizen->created_at);
                                  $date = $dd->format('d-m-Y');
                              @endphp

                              <td>{{ $date }}</td>
                              <td>
                                  <a href="{{ route('city_corporation.citizen.show', ['id' => $citizen->id]) }}" class="btn btn-dark btn-sm">Details</a>
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
