<!-- Modal -->
<div class="modal fade" id="loginToCCM" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginToCCMLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" action="{{ route('login_with_email') }}">
        @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-bold" id="loginToCCMLabel">{{ __('Login to CCM') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <input id="password" type="password" class="form-control mb-0 @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-dark btn-custom">{{ __('LOGIN') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
