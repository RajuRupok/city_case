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
    *[data-href] {
        cursor: pointer !important;
        border-bottom: 1px solid #efefef !important;
        transition: 0.3s all ease-in-out;
    }
    *[data-href]:hover {
      background-color: #efefefef;
      transition: 0.3s all ease-in-out;
    }
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
            <form action="{{ route('city_corporation.case.index') }}" method="get" id="filter-case-form">
              {{-- @csrf --}}
              <div class="card-header">
                <h4>Filter Cases</h4>
              </div>

              <div class="card-body">
                <div class="row">
                  <div class="col-md-3">
                    <label>Category</label>
                    <select class="form-control select2" name="category_id" id="case_category">
                      <option value="">Select Category</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($request->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label>Status</label>
                    <select class="form-control select2" name="status" id="case_status">
                      <option value="">Select Status</option>
                      <option value="pending" @if ($request->status == 'pending') selected @endif>{{ __('Pending') }}</option>
                      <option value="running" @if ($request->status == 'running') selected @endif>{{ __('Running') }}</option>
                      <option value="completed" @if ($request->status == 'completed') selected @endif>{{ __('Completed') }}</option>
                      <option value="canceled" @if ($request->status == 'canceled') selected @endif>{{ __('Canceled') }}</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label>Date Range</label>
                    <div class="input-group">
                      <input type="date" class="form-control datepicker-custom" id="case-date-start" name="start_date" value="{{ $request->start_date }}">
                      <input type="date" class="form-control datepicker-custom" id="case-date-end" name="end_date" value="{{ $request->end_date }}">
                    </div>
                  </div>
                </div>
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
                  <table class="table table-bordered" id="tableExport">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">Sl.</th>
                        <th scope="col">Ticket</th>
                        <th scope="col">Category</th>
                        <th scope="col">Title</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                      <tbody>
                          @foreach ($cases as $sl => $case)
                            <tr data-href="{{ route('city_corporation.case.show', ['id' => $case->id]) }}">
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
                                {{-- <td>
                                    <a href="{{ route('city_corporation.case.show', ['id' => $case->id]) }}" class="btn btn-dark btn-sm">Details</a>
                                </td> --}}
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
    <script src="{{ asset('backend/assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/page/datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function() {
            // Table Row Link
            $('*[data-href]').click(function(){
                window.location = $(this).data('href');
                return false;
            });

            var $caseCategory = $("#case_category");
            $caseCategory.select2();
            $caseCategory.on("change", function (e) {
                $('#filter-case-form').submit();
            });
            var $caseStatus = $("#case_status");
            $caseStatus.select2();
            $caseStatus.on("change", function (e) {
                $('#filter-case-form').submit();
            });

            $("#case-date-start").change(function(){
                $('#filter-case-form').submit();
            });
            $("#case-date-end").change(function(){
                $('#filter-case-form').submit();
            });
      });

    </script>
@endsection
