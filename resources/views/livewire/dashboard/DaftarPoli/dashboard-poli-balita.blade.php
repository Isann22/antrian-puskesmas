<div class="w-full">
    <div class="card bg-base-100 shadow-sm border border-base-200">
        <div class="card-body">
            <h2 class="card-title text-2xl font-bold text-base-content tracking-tight mb-4">Daftar Antrian Poli Balita</h2>
            
            @if(session()->has('success'))
                <div class="alert alert-success shadow-sm mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="overflow-x-auto w-full">
                <table class="table table-zebra w-full text-sm">
                    <thead class="bg-primary text-primary-content">
                        <tr>
                            <th>No Antrian</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor HP</th>
                            <th>Nomor KTP</th>
                            <th>Surat Rujukan</th>
                            <th class="text-center">Panggil</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($poliBalita as $list)
                            <tr>
                                <td class="font-bold border-l-4 border-l-primary text-lg">{{ $list->no_antrian }}</td>
                                <td>{{ $list->nama }}</td>
                                <td>{{ $list->alamat }}</td>
                                <td>{{ $list->jenis_kelamin }}</td>
                                <td>{{ $list->no_hp }}</td>
                                <td>{{ $list->no_ktp }}</td>
                                <td>
                                    @if($list->surat_rujukan)
                                        <button wire:click="lihatDetail({{ $list->id }})" onclick="document.getElementById('detailAntrian_modal').showModal()" class="btn btn-xs btn-outline btn-info">Lihat Surat</button>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-success text-white" wire:click="panggilAntrian({{ $list->id }})" onclick="document.getElementById('panggilAntrian_modal').showModal()">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
                                        Panggil
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-6 text-base-content/60">Belum ada antrian.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $poliBalita->links() }}
            </div>
        </div>
    </div>
    @include('livewire.dashboard.DaftarPoli.panggilAntrian')
    @include('livewire.dashboard.DaftarPoli.detailAntrian')
</div>
