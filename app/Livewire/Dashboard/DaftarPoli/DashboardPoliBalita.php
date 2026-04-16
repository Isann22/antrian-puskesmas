<?php

namespace App\Livewire\Dashboard\DaftarPoli;

use App\Models\Antrian;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class DashboardPoliBalita extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $antrian_id;
    public $detailAntrian;


    public function panggilAntrian($antrian_id)
    {
        $this->antrian_id = $antrian_id;
    }


    public function updatePanggilan()
    {
        Antrian::find($this->antrian_id)->update(['is_call' => 1]);

        session()->flash('success', 'Berhasil Mengambil Antrian Ini');
        $this->dispatch('closeModal');
    }

    public function lihatDetail($antrian_id)
    {
        $this->detailAntrian = Antrian::find($antrian_id);
    }


    public function render()
    {
        return view('livewire.dashboard.DaftarPoli.dashboard-poli-balita', [
            'poliBalita' => Antrian::where('poli', 'balita')->where('is_call', 0)->paginate(10)
        ]);
    }
}
