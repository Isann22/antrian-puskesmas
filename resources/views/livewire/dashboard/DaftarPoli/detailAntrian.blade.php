<dialog id="detailAntrian_modal" class="modal" wire:ignore.self>
    <div class="modal-box max-w-2xl">
        <h3 class="font-bold text-lg mb-4">Detail Antrian</h3>
        
        @if($detailAntrian)
            <div class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-base-content/70">No Antrian</p>
                        <p class="font-semibold text-lg">{{ $detailAntrian->no_antrian }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-base-content/70">Nama</p>
                        <p class="font-semibold">{{ $detailAntrian->nama }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-base-content/70">Jenis Kelamin</p>
                        <p class="font-semibold">{{ $detailAntrian->jenis_kelamin }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-base-content/70">Nomor HP</p>
                        <p class="font-semibold">{{ $detailAntrian->no_hp }}</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-sm text-base-content/70">Alamat</p>
                        <p class="font-semibold">{{ $detailAntrian->alamat }}</p>
                    </div>
                </div>

                @if($detailAntrian->surat_rujukan)
                    <div class="divider">Surat Rujukan</div>
                    <div class="bg-base-200 rounded-lg p-4">
                        <img src="{{ Storage::disk('s3')->temporaryUrl($detailAntrian->surat_rujukan, \Carbon\Carbon::now()->addMinutes(60)) }}" 
                             alt="Surat Rujukan" 
                             class="w-full h-auto rounded-lg shadow-md">
                    </div>
                @endif
            </div>
        @endif

        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Tutup</button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
