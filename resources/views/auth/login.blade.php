@extends('core.core')

@section('title')
    Login
@endsection

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Alata&display=swap');
    *{
        font-family: 'Alata', sans-serif;
    }
    body{
        background-color: rgb(236, 236, 236)
    }
</style>
<div class="container">

    <div class="container d-flex justify-content-center mt-3 mb-3">
        <h3>Website Rawat Inap</h3>
    </div>
    <div class="row justify-content-center">

        <div id="kartu" class="card" style="width: 280px; padding: 0px">
            <div class="d-flex justify-content-center mt-3 mb-2">
                <h4>Log in</h4>
            </div>
            <div class="card-body" style="padding: 10px">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="container mb-3">
                        <div class="form-group input-group-sm">
                            <label style="font-size: 15px" for="email">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="container mb-3">
                        <div class="form-group input-group-sm">
                            <label style="font-size: 15px" for="password">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>

                    <div class="container justify-content-center">
                        <div class="form-group input-group-sm">

                                <button type="submit" class="btn btn-block btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                <a style="font-size: 13px" class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif

                                <p class="text-muted d-flex justify-content-center">or</p>
                        </div>
                    </div>
                    <div class="container justify-content-center">
                        <div class="form-group input-group-sm">

                            <a role="button" class="btn btn-block btn-outline-secondary" href="{{ url('/auth/google') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google mr-2" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                </svg>
                                Login dengan Google
                            </a>
                            <a role="button" class="btn btn-block btn-outline-secondary" href="{{ url('/auth/github') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github mr-2" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                </svg>
                                Login dengan Github
                            </a>
                            <a role="button" class="btn btn-block btn-outline-secondary disabled" href="{{ url('/auth/facebook') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook mr-2" viewBox="0 0 16 16">
                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                                </svg>
                                Login dengan Facebook
                            </a>
                        </div>



                    </div>

                    <div class="container">
                        <div class="col-md-8 offset-md-4">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center mt-3">
        <p class="text-muted">Tidak punya akun?</p>
    </div>
    <div class="container d-flex justify-content-center" style="margin-bottom: 100px">

        <a href="{{ route('register') }}" role="button" class="btn btn-outline-secondary btn-sm">Daftar</a>
    </div>
</div>

<!-- Footer -->
<footer class="text-center text-lg-start bg-white text-muted fixed-bottom">

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.025);">
        Website Rawat Inap
      <a class="text-reset fw-bold">Kelompok 8 Ubsi</a>
    </div>
    <!-- Copyright -->
</footer>
  <!-- Footer -->



<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script>
    $('#kartu').hover(
    function () {
        $(this).addClass('shadow-lg');
    },
    function () {
        $(this).removeClass('shadow-lg')
    }
);
</script>

@endsection
