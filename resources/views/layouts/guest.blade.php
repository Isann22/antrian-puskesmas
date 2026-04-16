<!DOCTYPE html>
<html lang="id" data-theme="emerald">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Antrian Puskesmas')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-base-200 min-h-screen font-sans text-base-content antialiased flex flex-col">
    <div class="navbar bg-base-100 shadow-sm px-8">
        <div class="flex-1">
            <a href="{{ route('home.page') }}" wire:navigate class="btn btn-ghost text-xl normal-case font-bold text-primary">Sistem Antrian Puskesmas</a>
        </div>
        <div class="flex-none gap-2">
            @guest
                <a href="{{ route('login') }}" wire:navigate class="btn btn-primary btn-sm">Masuk / Daftar</a>
            @else
                @role('admin')
                    <a href="{{ route('dashboard.index') }}" wire:navigate class="btn btn-outline btn-sm">Dashboard Admin</a>
                @endrole
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-error btn-sm">Logout</button>
                </form>
            @endguest
        </div>
    </div>
    
    <main class="container mx-auto px-4 py-8 flex-1">
        {{ $slot ?? '' }}
        @yield('content')
    </main>

    <footer class="footer footer-center p-4 bg-base-100 text-base-content mt-12 shadow-inner">
        <aside>
            <p>Copyright © {{ date('Y') }} - Sistem Antrian Puskesmas</p>
        </aside>
    </footer>

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
