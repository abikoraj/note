@extends('user.layout')
@section('title')
    User Login
@endsection
@section('content')
    <div class="form-wrapper col-md-4 shadow">
        <div class="p-3 text-center">
            <img class="mb-4" src="" alt="" width="72" height="57">
            <h1 class="text-muted">User Login</h1>
        </div>
        <div class="form-signin p-3">
            @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show py-1 px-2 " role="alert">
                    <small>{{ session()->get('message') }}</small>
                    <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{ route('user.login') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="tel" class="form-control" id="floatingInput" required name="phone"
                        placeholder="Phone Number">
                    <label for="floatingInput">Phone Number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" name="password" id="floatingPassword"
                        placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>

                <div class="form-text mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                    <label class="float-end">
                        <a href="">Forget Password?</a>
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="my-3 text-center text-muted">No Account? Sign up <a
                        href="{{ route('user.register') }}">here</a>.</p>
                <p class="my-3 text-muted text-center">&copy; 2022</p>
            </form>
        </div>

    </div>
@endsection
