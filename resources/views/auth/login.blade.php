@extends('layouts.guest')
@section('title', 'Login - Sistem Antrian Puskesmas')

@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <div class="card w-full max-w-md bg-base-100 shadow-sm border border-base-200">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold justify-center mb-6 text-primary">Masuk Ke Akun Anda</h2>
            
            @if (session()->has('success'))
                <div class="alert alert-success shadow-sm mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session()->has('pending'))
                <div class="alert alert-warning shadow-sm mb-4">
                     <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <span>{{ session('pending') }}</span>
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-control mb-4">
                    <label class="label" for="email">
                        <span class="label-text font-medium">Email</span>
                    </label>
                    <input type="email" name="email" id="email" class="input input-bordered @error('email') input-error @enderror w-full" required autofocus>
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-6">
                    <label class="label" for="password">
                        <span class="label-text font-medium">Password</span>
                    </label>
                    <input type="password" name="password" id="password" class="input input-bordered @error('password') input-error @enderror w-full" required>
                    @error('password')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary w-full">Masuk</button>
                </div>
            </form>

            <div class="text-center mt-6">
                <p class="text-sm text-base-content/70">
                    Belum Punya Akun? <a href="/register" class="link link-primary font-medium">Buat Akun</a>
                </p>
            </div>

            <div class="divider my-4">Akun Demo</div>
            
            <div class="bg-base-200 rounded-lg p-4 space-y-3">
                <div class="text-sm">
                    <p class="font-semibold text-primary mb-1">Admin:</p>
                    <p class="text-base-content/70">Email: <span class="font-mono">admin@gmail.com</span></p>
                    <p class="text-base-content/70">Password: <span class="font-mono">1234</span></p>
                </div>
                <div class="divider my-2"></div>
                <div class="text-sm">
                    <p class="font-semibold text-secondary mb-1">Pasien:</p>
                    <p class="text-base-content/70">Email: <span class="font-mono">pasien@gmail.com</span></p>
                    <p class="text-base-content/70">Password: <span class="font-mono">1234</span></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
