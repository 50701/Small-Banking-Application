@extends('layouts/layout2')

@section('content')

<form id="password-form" class="card card-md" action="{{ route('login') }}" method="post" autocomplete="off" data-bitwarden-watching="1">
    @csrf
    <div class="card-body">
        <h2 class="card-title text-center mb-4">Login to your account</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        @if ($errors->any())
            <div class="alert alert-warning" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon alert-icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg>
                    </div>
                    <div>
                        Uh oh, something went wrong 
                    </div>
                </div>
                <div class="errors_heilight">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label email required">Email address</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label password required">
                Password 
                <span class="form-label-description">
                    <a href="#">I forgot password</a>
                </span>
            </label>
            <div class="input-group input-group-flat">
                <input type="password" class="form-control" placeholder="Password" autocomplete="off" id="password" name="password" required>
                <span class="input-group-text">
                    <a href="#" class="link-secondary" id="toggle-password" data-bs-toggle="tooltip" aria-label="Show password" data-bs-original-title="Show password"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6"></path></svg>
                    </a>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label class="form-check">
                <input type="checkbox" class="form-check-input" name="remember">
                <span class="form-check-label">Remember me</span>
            </label>
        </div>
        <div class="form-footer">
            <button type="submit" class="btn btn-primary w-100">Sign in</button>
        </div>
    </div>
</form>

<div class="text-center text-secondary mt-3">
    Don't have account yet?  <a href="{{ route('signup.form'); }}" tabindex="-1">Sign up</a>
</div>

@endsection