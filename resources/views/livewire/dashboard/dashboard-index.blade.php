<div class="w-full">
    <!-- Welcome Card -->
    <div class="card bg-primary text-primary-content shadow-sm mb-8 mt-2">
        <div class="card-body">
            <h2 class="card-title text-2xl">Selamat Datang, {{ auth()->user()->name }}</h2>
            <p class="text-primary-content/80 mt-1">SISTEM ANTRIAN PUSKESMAS ONLINE</p>
        </div>
    </div>

    <!-- Stats Section -->
    <h3 class="text-xl font-bold mb-4 text-base-content">Antrian Aktif Masuk</h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        <!-- Stat Poli Umum -->
        <div class="card bg-base-100 shadow-sm border border-base-200 hover:border-primary/50 transition-colors">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base-content/60 font-medium">Poli Umum</h3>
                        <div class="text-4xl font-bold mt-2 text-base-content">{{ $poliUmum }}</div>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5V4a2 2 0 00-2-2H4a2 2 0 00-2 2v16h5m8 0v-5a2 2 0 00-2-2h-2a2 2 0 00-2 2v5m8 0H7" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('dashboard.poliUmum') }}" wire:navigate class="text-sm font-medium text-primary hover:underline">Lihat Antrian →</a>
                </div>
            </div>
        </div>

        <!-- Stat Poli Gigi -->
        <div class="card bg-base-100 shadow-sm border border-base-200 hover:border-primary/50 transition-colors">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base-content/60 font-medium">Poli Gigi</h3>
                        <div class="text-4xl font-bold mt-2 text-base-content">{{ $poliGigi }}</div>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('dashboard.poliGigi') }}" wire:navigate class="text-sm font-medium text-primary hover:underline">Lihat Antrian →</a>
                </div>
            </div>
        </div>

        <!-- Stat Poli Balita -->
        <div class="card bg-base-100 shadow-sm border border-base-200 hover:border-primary/50 transition-colors">
            <div class="card-body">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-base-content/60 font-medium">Poli Balita</h3>
                        <div class="text-4xl font-bold mt-2 text-base-content">{{ $poliBalita }}</div>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.514" />
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('dashboard.poliBalita') }}" wire:navigate class="text-sm font-medium text-primary hover:underline">Lihat Antrian →</a>
                </div>
            </div>
        </div>

    </div>
</div>
