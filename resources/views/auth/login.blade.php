@extends('auth.index')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 100%; max-width: 400px;">
        <h3 class="text-center mb-3 text-primary">⚡ Voltix Login</h3>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form method="POST" action="{{ route('login.post') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    class="form-control"
                    id="email"
                    required
                    autofocus>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="password"
                    required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </form>
    </div>
</div>
@endsection
