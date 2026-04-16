<div>
    <div class="mb-6">
        <h2 class="text-3xl font-bold text-base-content tracking-tight">Daftar Antrian</h2>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success shadow-sm mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if ($cekAntrian > 0)
        <!-- Data Table Antrian Milik User Login -->
        <h3 class="font-bold text-lg mb-2">Antrian Saya</h3>
        <div class="overflow-x-auto bg-base-100 rounded-box shadow-sm mb-8 border border-base-200">
            <table class="table table-zebra w-full">
                <thead class="bg-primary text-primary-content">
                    <tr>
                        <th>No Antrian</th>
                        <th>Nama</th>
                        <th>Poli</th>
                        <th>Tgl Antrian</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailAntrian as $item)
                        <tr>
                            <td class="font-bold text-lg">{{ $item->no_antrian }}</td>
                            <td>{{ $item->nama }}</td>
                            <td><span class="badge badge-accent badge-sm">{{ $item->poli }}</span></td>
                            <td>{{ $item->tanggal_antrian }}</td>
                            <td class="text-center flex justify-center gap-2">

                                <button type="button" wire:click="editAntrian({{ $item->id }})" class="btn btn-sm btn-warning" onclick="document.getElementById('editAntrian_modal').showModal()">
                                    Edit
                                </button>
                                <button type="button" wire:click="deleteAntrian({{ $item->id }})" class="btn btn-sm btn-error" onclick="document.getElementById('deleteAntrian_modal').showModal()">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    @include('livewire.antrian.editAntrian')
    @include('livewire.antrian.createAntrian')
    @include('livewire.antrian.deleteAntrian')

    <!-- Tombol Ambil Antrian -->
    <div class="mb-8">
        <button type="button" class="btn btn-primary shadow-sm px-6" onclick="document.getElementById('createAntrian_modal').showModal()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Ambil Antrian Baru
        </button>
    </div>

    <!-- Status Antrian Saat Ini -->
    <div class="mb-4 mt-8">
        <h3 class="font-bold text-xl text-base-content tracking-tight">Antrian Sedang Dilayani</h3>
        <p class="text-sm text-base-content/60">Nomor antrian yang saat ini sedang dipanggil di masing-masing poliklinik.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Status Poli Umum -->
        <div class="card bg-base-100 shadow-sm border border-base-200">
            <div class="card-body items-center text-center">
                <h2 class="card-title text-base-content/80">Poli Umum</h2>
                <div class="text-5xl font-black text-primary my-2">
                    {{ $antrianSekarang['umum'] ? $antrianSekarang['umum']->no_antrian : '-' }}
                </div>
            </div>
        </div>

        <!-- Status Poli Gigi -->
        <div class="card bg-base-100 shadow-sm border border-base-200">
            <div class="card-body items-center text-center">
                <h2 class="card-title text-base-content/80">Poli Gigi</h2>
                <div class="text-5xl font-black text-emerald-600 my-2">
                    {{ $antrianSekarang['gigi'] ? $antrianSekarang['gigi']->no_antrian : '-' }}
                </div>
            </div>
        </div>

        <!-- Status Poli Balita -->
        <div class="card bg-base-100 shadow-sm border border-base-200">
            <div class="card-body items-center text-center">
                <h2 class="card-title text-base-content/80">Poli Balita</h2>
                <div class="text-5xl font-black text-amber-500 my-2">
                    {{ $antrianSekarang['balita'] ? $antrianSekarang['balita']->no_antrian : '-' }}
                </div>
            </div>
        </div>
    </div>
</div>
