@extends('layouts.city_corporation.app')

@section('page_title', 'All Cases')

@section('css_links')
    {{--  External CSS  --}}
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
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
    <li class="breadcrumb-item active">All Cases</li>
@endsection

@section('main_content')
    {{-- ========================================================================
    ============================< Main Section Starts >==========================
    ======================================================================== --}}


    


    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <form action="#" method="get">
              @csrf
              <div class="card-header">
                <h4>Filter Cases</h4>
              </div>
      
              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label>Category</label>
                    <select class="form-control select2" name="category_id">
                      <option>Select Category</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Status</label>
                    <select class="form-control select2" name="status">
                      <option>Select Status</option>
                      <option value="pending">{{ __('Pending') }}</option>
                      <option value="running">{{ __('Running') }}</option>
                      <option value="completed">{{ __('Completed') }}</option>
                      <option value="canceled">{{ __('Canceled') }}</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>Date Range</label>
                    <div class="input-group">
                      <input type="date" class="form-control datepicker-custom" name="start_date">
                      <input type="date" class="form-control datepicker-custom" name="end_date">
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card-footer">
                  <button class="btn btn-dark float-right m-b-15">Filter Case</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    


        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>All Cases</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped" id="table-1">
                    <thead>
                      <tr>
                        <th class="text-center">Sl.</th>
                        <th>Ticket</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                      <tbody>
                          @foreach ($cases as $sl => $case)
                            <tr>
                                <td class="text-center">{{ $sl+1 }}</td>
                                <td>
                                    {{ $case->ticket }}
                                </td>
                                <td>
                                    {{ optional($case->category)->name }}
                                </td>
                                <td>
                                    {{ $case->title }}
                                </td>
                                <td>
                                  @php 
                                      $dd = new DateTime($case->created_at); 
                                      $date = $dd->format('d-m-Y');
                                  @endphp
                                  {{ $date }}
                                </td>
                                <td class="text-uppercase text-bold" style="font-weight: 900;">{{ $case->status }}</td>
                                <td>
                                    <a href="{{ route('city_corporation.case.show', ['id' => $case->id]) }}" class="btn btn-dark btn-sm">Details</a>
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
    <script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
