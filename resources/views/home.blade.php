@extends('layouts.guest')
@section('title', 'Beranda - Sistem Antrian Puskesmas')

@section('content')
    <div class="hero min-h-[60vh] bg-base-100 rounded-box shadow-sm mb-12 border border-base-200">
        <div class="hero-content text-center">
            <div class="max-w-2xl">
                <h1 class="text-5xl font-extrabold text-primary mb-6 tracking-tight">Puskesmas Digital</h1>
                <p class="py-6 text-base-content/80 text-lg">
                    Sistem Antrian Online Puskesmas memudahkan Anda dalam mengambil antrian sesuai Poliklinik tanpa harus
                    menunggu terlalu lama di ruang tunggu fisik.
                </p>
                <div class="mt-4">
                    <a href="{{ route('antrian.index') }}" wire:navigate
                        class="btn btn-primary btn-lg shadow-sm w-full sm:w-auto">Ambil Antrian Sekarang</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold tracking-tight text-base-content">Layanan Poliklinik</h2>
        <p class="text-base-content/60 mt-2">Daftar poli utama yang tersedia untuk pelayanan masyarakat.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 justify-center">

        <!-- Poli Umum -->
        <div class="card bg-base-100 shadow-sm border border-base-200 hover:border-primary/50 transition-colors">
            <div class="card-body items-start">
                <div class="rounded-full bg-primary/10 p-3 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h2 class="card-title text-base-content">Poli Umum</h2>
                <p class="text-sm text-base-content/70 mt-1">Pemeriksaan kesehatan, pengobatan, dan edukasi medis dasar
                    untuk masyarakat umum.</p>
            </div>
        </div>

        <!-- Poli Gigi -->
        <div class="card bg-base-100 shadow-sm border border-base-200 hover:border-primary/50 transition-colors">
            <div class="card-body items-start">
                <div class="rounded-full bg-primary/10 p-3 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h2 class="card-title text-base-content">Poli Gigi</h2>
                <p class="text-sm text-base-content/70 mt-1">Pemeriksaan kesehatan gigi dan mulut serta tindakan medis.</p>
            </div>
        </div>

        <!-- Poli Balita -->
        <div class="card bg-base-100 shadow-sm border border-base-200 hover:border-primary/50 transition-colors">
            <div class="card-body items-start">
                <div class="rounded-full bg-primary/10 p-3 mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.514" />
                    </svg>
                </div>
                <h2 class="card-title text-base-content">Poli Balita</h2>
                <p class="text-sm text-base-content/70 mt-1">Pemeriksaan rutin, imunisasi, dan penanganan penyakit balita.
                </p>
            </div>
        </div>

    </div>
@endsection
