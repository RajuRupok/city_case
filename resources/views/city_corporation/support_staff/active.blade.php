@extends('layouts.city_corporation.app')

@section('page_title', 'Active Support Staffs')

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
    <li class="breadcrumb-item">Support Staffs</li>
    <li class="breadcrumb-item active">Active Support Staffs</li>
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
                <h4>Active Support Staffs</h4>
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
                        <th>Category</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <tbody>
                        @foreach ($support_staffs as $sl => $support_staff)
                          <tr>
                              <td>{{ $sl+1 }}</td>
                              <td>
                                  {{ $support_staff->name }}
                              </td>
                              <td>
                                  {{ $support_staff->email }}
                              </td>
                              <td>
                                  {{ $support_staff->mobile }}
                              </td>
                              <td>
                                  {{ optional($support_staff->category)->name }}
                              </td>
                              <td>
                                  <a href="{{ route('city_corporation.support_staff.show', ['id' => $support_staff->id]) }}" class="btn btn-dark btn-sm">Details</a>
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
