<?php

namespace App\Livewire\Antrian;

use App\Models\Antrian;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;


#[Layout('layouts.guest')]
class ShowAntrian extends Component
{
    public $antrian_id, $no_antrian, $nama, $alamat, $jenis_kelamin, $no_hp, $no_ktp, $tgl_lahir, $pekerjaan, $poli, $tanggal_antrian, $user_id, $data;
    public $surat_rujukan;

    use WithPagination;
    use \Livewire\WithFileUploads;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'no_antrian'        => 'required',
        'nama'              => 'required',
        'alamat'            => 'required',
        'jenis_kelamin'     => 'required',
        'no_hp'             => 'required|numeric',
        'no_ktp'            => 'required|numeric',
        'tgl_lahir'         => 'required',
        'pekerjaan'         => 'required',
        'poli'              => 'required',
        'tanggal_antrian'   => 'required',
        'surat_rujukan'     => 'nullable|file|max:2048'
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }


    public function save()
    {
        // Mengambil data antrian terbaru berdasarkan poli yang di pilih
        $latestAntrian = Antrian::where('poli', $this->poli)
            ->where('tanggal_antrian', now()->toDateString())
            ->latest('id')
            ->first();

        // Jika tanggal berbeda dengan hari ini, maka reset nomor antrian dari awal
        if (!$latestAntrian) {
            if ($this->poli === 'umum') {
                $this->no_antrian = 'U1';
            } elseif ($this->poli === 'gigi') {
                $this->no_antrian = 'G1';
            } elseif ($this->poli === 'tht') {
                $this->no_antrian = 'T1';
            } elseif ($this->poli === 'lansia & disabilitas') {
                $this->no_antrian = 'L1';
            } elseif ($this->poli === 'balita') {
                $this->no_antrian = 'B1';
            } elseif ($this->poli === 'kia & kb') {
                $this->no_antrian = 'K1';
            } elseif ($this->poli === 'nifas/pnc') {
                $this->no_antrian = 'N1';
            }
            $this->tanggal_antrian = now()->toDateString();
        } else {
            // Jika tanggalnya sama dengan hari ini, maka no antrian akan melakukan increment / pengurutan
            $kode_awal = substr($latestAntrian->no_antrian, 0, 1);
            $angka = (int) substr($latestAntrian->no_antrian, 1);
            $angka += 1;
            $this->no_antrian = $kode_awal . $angka;
            $this->tanggal_antrian = $latestAntrian->tanggal_antrian;
        }


        $validatedData = $this->validate();
        
        if ($this->surat_rujukan) {
            $validatedData['surat_rujukan'] = $this->surat_rujukan->store('surat-rujukan', 's3');
        }

        $validatedData['no_antrian'] = $this->no_antrian;
        $validatedData['tanggal_antrian'] = $this->tanggal_antrian;
        $validatedData['user_id'] = auth()->user()->id;

        Antrian::create($validatedData);
        session()->flash('success', 'Berhasil Mengambil Antrian');
        $this->dispatch('update');
        $this->resetInput();
        $this->dispatch('closeModal');
    }


    public function resetInput()
    {
        $this->no_antrian = '';
        $this->nama = '';
        $this->alamat = '';
        $this->jenis_kelamin = '';
        $this->no_hp = '';
        $this->no_ktp = '';
        $this->poli = '';
        $this->tgl_lahir = '';
        $this->pekerjaan = '';
        $this->surat_rujukan = null;
    }

    public function close_modal()
    {
        $this->resetInput();
    }

    public function editAntrian($antrian_id)
    {
        $antrian = Antrian::find($antrian_id);
        if ($antrian) {
            $this->antrian_id       = $antrian->id;
            $this->no_antrian       = $antrian->no_antrian;
            $this->nama             = $antrian->nama;
            $this->alamat           = $antrian->alamat;
            $this->jenis_kelamin    = $antrian->jenis_kelamin;
            $this->no_hp            = $antrian->no_hp;
            $this->no_ktp           = $antrian->no_ktp;
            $this->poli             = $antrian->poli;
            $this->tgl_lahir        = $antrian->tgl_lahir;
            $this->pekerjaan        = $antrian->pekerjaan;
        } else {
            return redirect()->to('/');
        }
    }

    public function updateAntrian()
    {

        if ($this->poli === 'umum') {
            $this->no_antrian = 'U1';
        } elseif ($this->poli === 'gigi') {
            $this->no_antrian = 'G1';
        } elseif ($this->poli === 'tht') {
            $this->no_antrian = 'T1';
        } elseif ($this->poli === 'lansia & disabilitas') {
            $this->no_antrian = 'L1';
        } elseif ($this->poli === 'balita') {
            $this->no_antrian = 'B1';
        } elseif ($this->poli === 'kia & kb') {
            $this->no_antrian = 'K1';
        } elseif ($this->poli === 'nifas/pnc') {
            $this->no_antrian = 'N1';
        }


        $latest_no_antrian = Antrian::where('poli', $this->poli)
            ->latest()
            ->first();

        if ($latest_no_antrian) {
            $kode_awal = substr($latest_no_antrian->no_antrian, 0, 1);
            $angka = (int) substr($latest_no_antrian->no_antrian, 1);
            $angka += 1;
            $this->no_antrian = $kode_awal . $angka;
        }

        $validatedData = $this->validate([
            'no_antrian'    => 'required|unique:antrians',
            'nama'          => 'required',
            'alamat'        => 'required',
            'jenis_kelamin' => 'required',
            'no_hp'         => 'required',
            'no_ktp'        => 'required',
            'poli'          => 'required',
            'tgl_lahir'     => 'required',
            'pekerjaan'     => 'required',
        ]);

        Antrian::where('id', $this->antrian_id)->update([
            'no_antrian'    => $validatedData['no_antrian'],
            'nama'          => $validatedData['nama'],
            'alamat'        => $validatedData['alamat'],
            'jenis_kelamin' => $validatedData['jenis_kelamin'],
            'no_hp'         => $validatedData['no_hp'],
            'no_ktp'        => $validatedData['no_ktp'],
            'poli'          => $validatedData['poli'],
            'tgl_lahir'     => $validatedData['tgl_lahir'],
            'pekerjaan'     => $validatedData['pekerjaan'],
        ]);

        session()->flash('success', 'Berhasil Mengedit Data Antrian Anda');
        $this->resetInput();
        $this->dispatch('closeModal');
    }

    public function deleteAntrian($antrian_id)
    {
        $this->antrian_id = $antrian_id;
    }

    public function destroy()
    {
        Antrian::find($this->antrian_id)->delete();
        session()->flash('success', 'Berhasil Menghapus 1 Data');
        $this->resetInput();
        $this->dispatch('closeModal');
    }

    public function showDetail($antrian_id)
    {
        $antrian = Antrian::find($antrian_id);
        if ($antrian) {
            $this->antrian_id       = $antrian->id;
            $this->no_antrian       = $antrian->no_antrian;
            $this->nama             = $antrian->nama;
            $this->alamat           = $antrian->alamat;
            $this->jenis_kelamin    = $antrian->jenis_kelamin;
            $this->no_hp            = $antrian->no_hp;
            $this->no_ktp           = $antrian->no_ktp;
            $this->poli             = $antrian->poli;
            $this->tgl_lahir        = $antrian->tgl_lahir;
            $this->pekerjaan        = $antrian->pekerjaan;
        } else {
            return redirect()->to('/');
        }
    }

    public function mount()
    {
        $this->data = Antrian::all();
    }

    public function render()
    {
        $today = now()->toDateString();
        
        $antrianSekarang = [
            'umum' => Antrian::where('poli', 'umum')->where('tanggal_antrian', $today)->where('is_call', 1)->latest('updated_at')->first(),
            'gigi' => Antrian::where('poli', 'gigi')->where('tanggal_antrian', $today)->where('is_call', 1)->latest('updated_at')->first(),
            'balita' => Antrian::where('poli', 'balita')->where('tanggal_antrian', $today)->where('is_call', 1)->latest('updated_at')->first(),
        ];

        return view('livewire.antrian.show-antrian', [
            'antrianSekarang' => $antrianSekarang,
            'cekAntrian' => Antrian::where('user_id', Auth::id())->count(),
            'detailAntrian' => Antrian::where('user_id', Auth::id())->where('is_call', 0)->latest()->get()
        ]);
    }
}
