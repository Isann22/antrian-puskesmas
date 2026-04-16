@extends('layouts.guest')
@section('title', 'Buat Akun - Sistem Antrian Puskesmas')

@section('content')
<div class="flex justify-center items-center min-h-[60vh]">
    <div class="card w-full max-w-md bg-base-100 shadow-sm border border-base-200">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold justify-center mb-4 text-primary">Buat Akun Baru</h2>
            
            @if ($errors->any())
                <div class="alert alert-error shadow-sm mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <div>
                        <ul class="list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                
                <div class="form-control mb-4">
                    <label class="label" for="name">
                        <span class="label-text font-medium">Nama Lengkap</span>
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="input input-bordered @error('name') input-error @enderror w-full" required autofocus>
                    @error('name')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-4">
                    <label class="label" for="email">
                        <span class="label-text font-medium">Email</span>
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="input input-bordered @error('email') input-error @enderror w-full" required>
                    @error('email')
                        <label class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </label>
                    @enderror
                </div>

                <div class="form-control mb-4">
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

                <div class="form-control mb-6">
                    <label class="label" for="password_confirmation">
                        <span class="label-text font-medium">Konfirmasi Password</span>
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="input input-bordered w-full" required>
                </div>

                <div class="flex flex-col gap-2 mt-6">
                    <button type="submit" class="btn btn-primary w-full">Daftar Akun</button>
                    <a href="/login" class="btn btn-outline w-full">Kembali ke Login</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
