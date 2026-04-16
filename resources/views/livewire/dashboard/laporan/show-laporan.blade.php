<div class="w-full">
    <div class="card bg-base-100 shadow-sm border border-base-200">
        <div class="card-body">
            <div class="flex justify-between items-center mb-6">
                <h2 class="card-title text-2xl font-bold text-base-content tracking-tight">Riwayat Laporan Antrian</h2>
                <a href="{{ route('cetakLaporan') }}" target="_blank" class="btn btn-success text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/></svg>
                    Cetak Laporan
                </a>
            </div>

            @if (session()->has('success'))
                <div class="alert alert-success shadow-sm mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="form-control">
                    <label class="label"><span class="label-text">Berdasarkan Tanggal</span></label>
                    <select wire:model.live="tanggal_antrian" class="select select-bordered w-full">
                        <option value="">Semua Waktu</option>
                        <option value="today">Hari ini</option>
                        <option value="week">Minggu ini</option>
                        <option value="month">Bulan ini</option>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text">Berdasarkan Poli</span></label>
                    <select wire:model.live="poli" class="select select-bordered w-full">
                        <option value="">Semua Poli</option>
                        <option value="umum">Poli Umum</option>
                        <option value="gigi">Poli Gigi</option>
                        <option value="balita">Poli Balita</option>
                    </select>
                </div>

                <div class="form-control">
                    <label class="label"><span class="label-text">Pencarian Nama</span></label>
                    <input wire:model.live="search" type="text" class="input input-bordered w-full" placeholder="Cari Nama Pasien...">
                </div>
            </div>

            <div class="overflow-x-auto w-full border border-base-200 rounded-box">
                <table class="table table-zebra w-full text-sm">
                    <thead class="bg-primary text-primary-content">
                        <tr>
                            <th>No Antrian</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Nomor HP</th>
                            <th>Nomor KTP</th>
                            <th>Tgl. Lahir</th>
                            <th>Pekerjaan</th>
                            <th>Poli</th>
                            <th>Tgl. Antrian</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $list)
                            <tr>
                                <td class="font-bold border-l-4 border-l-primary">{{ $list->no_antrian }}</td>
                                <td>{{ $list->nama }}</td>
                                <td>{{ $list->alamat }}</td>
                                <td>{{ $list->jenis_kelamin }}</td>
                                <td>{{ $list->no_hp }}</td>
                                <td>{{ $list->no_ktp }}</td>
                                <td>{{ $list->tgl_lahir }}</td>
                                <td>{{ $list->pekerjaan }}</td>
                                <td><span class="badge badge-accent badge-sm">{{ $list->poli }}</span></td>
                                <td>{{ $list->tanggal_antrian }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10" class="text-center py-6 text-base-content/60">Tidak ada riwayat antrian yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4">
                {{ $laporan->links() }}
            </div>
        </div>
    </div>
</div>
