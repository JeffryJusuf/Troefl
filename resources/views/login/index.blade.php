@extends('layouts.main')

@section('auth')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <main class="form-signin">
        <a href="/">
            <img class="mb-4" src="/img/troefl-logo.png" alt="" width="100" height="100">
        </a>
        <p class="h3 mb-3 fw-normal">Login to <img src="/img/troefl-text.png" alt="" width="125"></p>
        <form action="/login" method="POST" class="text-secondary">
            @csrf
            <div class="form-floating">
                <input type="text" name="login" class="form-control @error('login') is-invalid @enderror"
                    id="login" placeholder="login" required value="{{ old('login') }}">
                <label for="login">Email or Username</label>
                @error('login')
                    <div class="invalid-tooltip">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control @error('login') is-invalid @enderror" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button class="btn btn-secondary w-100 py-2 my-3" type="submit">Login</button>
            <small class="text-secondary">Need an account? 
                <a href="/register" class="text-decoration-none">Register here</a>
            </small>
        </form>
    </main>
@endsection
