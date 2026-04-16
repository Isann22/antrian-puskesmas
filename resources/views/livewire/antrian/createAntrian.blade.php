<!-- Modal Container -->
<dialog id="createAntrian_modal" class="modal" wire:ignore.self>
  <div class="modal-box w-11/12 max-w-3xl">
    <h3 class="font-bold text-lg mb-4 text-primary border-b pb-2">Form Ambil Antrian Baru</h3>
    
    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div class="form-control">
                <label class="label"><span class="label-text font-medium">Tanggal Antrian</span></label>
                <input type="date" wire:model="tanggal_antrian" class="input input-bordered w-full bg-base-200" readonly>
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text font-medium">Poli Tujuan</span></label>
                <select class="select select-bordered w-full" wire:model="poli">
                    <option value="">Pilih Poli</option>
                    <option value="umum">Poli Umum</option>
                    <option value="gigi">Poli Gigi</option>
                    <option value="balita">Poli Balita</option>
                </select>
                @error('poli') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control md:col-span-2">
                <label class="label"><span class="label-text font-medium">Nama Lengkap</span></label>
                <input type="text" wire:model="nama" class="input input-bordered w-full" placeholder="Masukkan nama lengkap">
                @error('nama') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control md:col-span-2">
                <label class="label"><span class="label-text font-medium">Alamat</span></label>
                <textarea wire:model="alamat" class="textarea textarea-bordered w-full" rows="2" placeholder="Masukkan alamat lengkap"></textarea>
                @error('alamat') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text font-medium">Jenis Kelamin</span></label>
                <select class="select select-bordered w-full" wire:model="jenis_kelamin">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text font-medium">Tanggal Lahir</span></label>
                <input type="date" wire:model="tgl_lahir" class="input input-bordered w-full">
                @error('tgl_lahir') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text font-medium">Nomor HP</span></label>
                <input type="number" wire:model="no_hp" class="input input-bordered w-full" placeholder="08xxx">
                @error('no_hp') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control">
                <label class="label"><span class="label-text font-medium">Nomor KTP (NIK)</span></label>
                <input type="number" wire:model="no_ktp" class="input input-bordered w-full" placeholder="16 digit NIK">
                @error('no_ktp') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control md:col-span-2">
                <label class="label"><span class="label-text font-medium">Pekerjaan</span></label>
                <input type="text" wire:model="pekerjaan" class="input input-bordered w-full" placeholder="Contoh: Wiraswasta, PNS, dll">
                @error('pekerjaan') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="form-control md:col-span-2">
                <label class="label"><span class="label-text font-medium">Lampiran Dokumen Tambahan (S3)</span></label>
                <input type="file" wire:model="surat_rujukan" class="file-input file-input-bordered w-full shadow-sm">
                <div wire:loading wire:target="surat_rujukan" class="text-sm text-primary mt-1">Mengunggah file ke AWS S3...</div>
                @error('surat_rujukan') <span class="text-error text-xs mt-1">{{ $message }}</span> @enderror
            </div>

        </div>

        <div class="modal-action mt-6 border-t pt-4">
            <button type="button" class="btn btn-ghost" onclick="document.getElementById('createAntrian_modal').close()" wire:click="close_modal">Batal</button>
            <button type="submit" class="btn btn-primary px-8">Simpan & Ambil Antrian</button>
        </div>
    </form>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button wire:click="close_modal">Close</button>
  </form>
</dialog>
