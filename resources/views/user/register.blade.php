@extends('user.layout')
@section('title')
    User Sign-up
@endsection
@section('content')
    <div class="form-wrapper col-md-6 shadow px-3">
        <div class="pt-3 text-center">
            <!-- <img class="mb-3" src="" alt="" width="72" height="57"> -->
            <h2 class="text-muted">Register User</h2>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="p-3">
            <form class="row g-2 text-muted" action="{{ route('user.register') }}" method="POST">
                @csrf
                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" required
                        minlength="10" maxlength="10">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">School / College</label>
                    <input type="text" class="form-control" name="school" value="{{ old('school') }}" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                {{-- <div class="col-md-6">
                    <label for="staticEmail" class="col-form-label">Confirm Password</label>
                    <input type="password" class="form-control">
                </div> --}}
                <button class="w-100 btn btn-primary" type="submit">Sign Up</button>
                <p class="my-3 text-center ">Already have an account? Sign In <a
                        href="{{ route('user.login') }}">here</a>.</p>
                <p class=" text-muted text-center m-0">&copy; 2022</p>
            </form>
        </div>

    </div>
@endsection
