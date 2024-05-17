@extends('layouts.auth')

@section('container')
    <main class="form-registration">
        <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <p class="h3 mb-3 fw-normal">Create Your Account</p>
        <form action="/register" method="POST" class="text-secondary">
            @csrf
            <div class="form-floating">
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                    id="username" placeholder="Username" required value="{{ old('username') }}">
                <label for="username">Username</label>
                @error('username')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                    id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-secondary w-100 py-2 my-3" type="submit">Register</button>
            <small class="text-secondary">Already have an account? 
                <a href="/login" class="text-decoration-none">Sign in</a>
                </small>
        </form>
    </main>
@endsection
