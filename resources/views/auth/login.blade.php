<div class="col-12 p-0 mt-4">
    <div class="card border rounded border-dark">
        <div class="card-body border-0 p-0">
            <form class="login-form col-12" method="POST" action="{{ route('login') }}">
                @csrf
                <h2 class="text-uppercase font-weight-bold mb-0">Client portal login</h2>
                <hr class="border-dark mt-0 pt-0">
                <div class="form-group row">
                    <label for="email" class="col-12 col-form-label">{{ __('E-Mail Address') }}</label>
                    <div class="col-12">
                        <input id="email" type="email"
                               class="border-dark form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-12 col-form-label">{{ __('Password') }}</label>
                    <div class="col-12">
                        <input id="password" type="password"
                               class="border-dark form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                               required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"
                                       name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-12">
                        <button type="submit" class="btn btn-outline-dark col">
                            LOGIN
                        </button>

                        {{--<a class="btn btn-link" href="{{ route('password.request') }}">--}}
                            {{--{{ __('Forgot Your Password?') }}--}}
                        {{--</a>--}}
                    </div>
                    <div class="col-12 text-center mt-2">
                        <a href="{{ route('register') }}">Want to join soul plug nation? Sign up</a>
                    </div>
                    <div class="col-12 text-center mt-2">
                        <a href="{{ url('password/reset') }}">Forgot your password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>