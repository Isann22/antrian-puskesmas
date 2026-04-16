<!DOCTYPE html>
<html lang="id" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard - Sistem Antrian Puskesmas')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-base-200 min-h-screen font-sans text-base-content antialiased">
    
    <div class="drawer lg:drawer-open">
        <input id="dashboard-drawer" type="checkbox" class="drawer-toggle" />
        
        <!-- Main Content -->
        <div class="drawer-content flex flex-col bg-base-200">
            <!-- Mobile Navbar -->
            <div class="navbar bg-base-100 shadow-sm sticky top-0 z-10 lg:hidden px-4">
                <div class="flex-none">
                    <label for="dashboard-drawer" aria-label="open sidebar" class="btn btn-square btn-ghost">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </label>
                </div>
                <div class="flex-1">
                    <a class="btn btn-ghost text-xl normal-case font-bold text-primary" href="{{ route('dashboard.index') }}" wire:navigate>Puskesmas</a>
                </div>
            </div>

            <!-- Page Content -->
            <main class="flex-1 p-6 md:p-10 max-w-7xl">
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-base-content tracking-tight">@yield('page_title', 'Dashboard')</h1>
                </div>
                
                <!-- Safe area for Livewire components -->
                <div class="w-full">
                    {{ $slot ?? '' }}
                    @yield('content')
                </div>
            </main>
        </div> 

        <!-- Sidebar -->
        <div class="drawer-side z-50">
            <label for="dashboard-drawer" aria-label="close sidebar" class="drawer-overlay"></label> 
            <aside class="bg-base-100 min-h-screen w-80 shadow-lg border-r border-base-200 flex flex-col">
                <div class="p-6 border-b border-base-200 flex items-center justify-center">
                    <span class="text-2xl font-black text-primary tracking-tight">Puskesmas Admin</span>
                </div>
                
                <ul class="menu p-4 w-full text-base-content flex-1 text-base gap-2">
                    <li>
                        <a href="{{ route('dashboard.index') }}" wire:navigate class="{{ request()->routeIs('dashboard.index') ? 'flex items-center justify-between bg-base-200 font-bold text-primary' : 'flex items-center justify-between hover:bg-base-200/50' }}">
                            <span>Halaman Utama</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /></svg>
                        </a>
                    </li>
                    
                    <li class="menu-title mt-4 font-bold text-base-content/50 uppercase tracking-widest text-xs">Poli Tersedia</li>
                    <li>
                        <a href="{{ route('dashboard.poliUmum') }}" wire:navigate class="{{ request()->routeIs('dashboard.poliUmum') ? 'bg-base-200 font-bold text-primary' : 'hover:bg-base-200/50' }}">
                            Poli Umum
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.poliGigi') }}" wire:navigate class="{{ request()->routeIs('dashboard.poliGigi') ? 'bg-base-200 font-bold text-primary' : 'hover:bg-base-200/50' }}">
                            Poli Gigi
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('dashboard.poliBalita') }}" wire:navigate class="{{ request()->routeIs('dashboard.poliBalita') ? 'bg-base-200 font-bold text-primary' : 'hover:bg-base-200/50' }}">
                            Poli Balita
                        </a>
                    </li>
                    
                    <li class="menu-title mt-4 font-bold text-base-content/50 uppercase tracking-widest text-xs">Laporan Antrian</li>
                    <li>
                        <a href="{{ route('dashboard.laporan') }}" wire:navigate class="{{ request()->routeIs('dashboard.laporan') ? 'flex items-center justify-between bg-base-200 font-bold text-primary' : 'flex items-center justify-between hover:bg-base-200/50' }}">
                            <span>Riwayat Laporan</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                        </a>
                    </li>
                </ul>
                
                <div class="p-6 mt-auto border-t border-base-200">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-error btn-outline w-full shadow-sm hover:shadow-md transition-shadow">Logout Sistem</button>
                    </form>
                </div>
            </aside>
        </div>
    </div>

    @livewireScripts
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('closeModal', () => {
                document.querySelectorAll('dialog[open]').forEach(dialog => dialog.close());
            });
        });
    </script>
</body>
</html>
