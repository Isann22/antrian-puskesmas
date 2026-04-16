<!-- Modal Panggil Antrian -->
<dialog id="panggilAntrian_modal" class="modal" wire:ignore.self>
  <div class="modal-box">
    <h3 class="font-bold text-lg text-success mb-4">Panggil Antrian</h3>
    <form wire:submit.prevent="updatePanggilan">
        <div class="py-4">
            <h4 class="text-base-content text-lg text-center">Apakah Anda yakin ingin memanggil antrian ini sekarang?</h4>
        </div>
        <div class="modal-action">
            <button type="button" class="btn btn-ghost" onclick="document.getElementById('panggilAntrian_modal').close()">Kembali</button>
            <button type="submit" class="btn btn-success text-white px-6">Ya, Panggil</button>
        </div>
    </form>
  </div>
  <form method="dialog" class="modal-backdrop">
    <button>Close</button>
  </form>
</dialog>
