<div class="card-header">{{ __('Expert Login') }}</div>
<div class="card-body">
    <form method="POST" action="{{ route('expert.login.submit') }}">
        @csrf
        <div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="far fa-envelope"></i></div>
                        </div>
                        <input id="email" type="email" placeholder="Email Id"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-key"></i></div>
                        </div>
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-6 offset-md-3">
                    <div class="form-check custom-control">
                        <input class="form-check-input custom-checkbox" type="checkbox" name="remember" id="remember" {{
                            old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-2">
                    <button type="submit" class="btn login-btn">
                        {{ __('Sign in') }}
                    </button>
                    @if (Route::has('password.request'))
                    <br>
                    <br>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>