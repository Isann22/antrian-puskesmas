<?php

namespace App\Livewire\Dashboard;

use App\Models\Antrian;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Halaman Utama - Dashboard')]
class DashboardIndex extends Component
{
    public function render()
    {
        $poliUmum   = Antrian::where('poli', 'umum')->where('is_call', false)->count();
        $poliGigi   = Antrian::where('poli', 'gigi')->where('is_call', false)->count();
        $poliBalita = Antrian::where('poli', 'balita')->where('is_call', false)->count();

        return view('livewire.dashboard.dashboard-index', [
            'poliUmum'   => $poliUmum,
            'poliGigi'   => $poliGigi,
            'poliBalita' => $poliBalita,
        ]);
    }
}
