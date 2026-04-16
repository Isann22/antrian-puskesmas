<!-- Modal Hapus -->
<dialog id="deleteAntrian_modal" class="modal" wire:ignore.self>
  <div class="modal-box">
    <h3 class="font-bold text-lg text-error">Form Hapus Antrian</h3>
    <form wire:submit.prevent="destroy">
        <div class="py-4">
            <h4 class="text-base-content text-lg font-medium text-center">Apakah Anda Yakin Ingin Menghapus Data Ini ?</h4>
        </div>
        <div class="modal-action">
            <button type="button" class="btn btn-ghost" wire:click="close_modal" onclick="document.getElementById('deleteAntrian_modal').close()">Tidak</button>
            <button type="submit" class="btn btn-error px-6">Ya, Hapus</button>
        </div>
    </form>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button wire:click="close_modal">Close</button>
  </form>
</dialog>
