@extends('layouts.citizen.app')

@section('page_title', '| Profile')

@section('stylesheet_links')
    {{--  External CSS  --}}

@endsection

@section('stylesheet')
    {{--  External CSS  --}}

@endsection

@section('content')
<!-- ======= Profile Section ======= -->
<section id="profile" class="profile mt-5" style="min-height: 90vh;">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>{{ auth()->user()->name }}</h2>
            {{-- <p>{{ __('All services that are provided by Us') }}</p> --}}
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="300">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="float-start text-bold">Profile</h2>
                        <a href="{{ route('citizen.profile.edit') }}" class="btn btn-dark btn-custom float-end">Edit</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody class="tbody">
                                <tr>
                                    <th>Full Name</th>
                                    <td>{{ auth()->user()->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile No.</th>
                                    <td>{{ auth()->user()->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>NID</th>
                                    <td>{{ auth()->user()->nid }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ auth()->user()->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Profile Section -->
@endsection


@section('script_links')
    {{--  External Javascript  --}}

@endsection

@section('scripts')
    {{--  External Javascript  --}}

@endsection
