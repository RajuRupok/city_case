<!-- General JS Scripts -->
<script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

@yield('script_links')

<!-- Template JS File -->
<script src="{{ asset('backend/assets/js/scripts.js') }}"></script>
{{-- Confirmation Alert --}}
<script src="{{ asset('backend/assets/js/confirmation_alert/jquery-confirmv3.3.2.min.js') }}"></script>

@yield('custom_script')

<!-- Custom JS File -->
<script src="{{ asset('backend/assets/js/custom.js') }}"></script>
<script src="{{ asset('backend/assets/js/responsive.js') }}"></script>
