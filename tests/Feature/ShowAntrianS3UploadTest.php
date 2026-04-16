<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Livewire\Antrian\ShowAntrian;
use App\Models\User;
use App\Models\Antrian;
use Spatie\Permission\Models\Role;

class ShowAntrianS3UploadTest extends TestCase
{
    // Menggunakan DatabaseTransactions agar tidak menghapus/merusak data asli di MySQL lokal Anda
    // Data yang ditambahkan (seperti User dan Antrian) akan di-rollback ke state semula setelah tes selesai!
    use DatabaseTransactions;

    public function test_can_upload_surat_rujukan_to_real_s3()
    {
        // PASTIKAN .env ANDA MEMILIKI KONFIGURASI S3 YANG BENAR:
        // AWS_ACCESS_KEY_ID, AWS_SECRET_ACCESS_KEY, AWS_DEFAULT_REGION, AWS_BUCKET

        // 1. Buat & login sebagai pasien dummy
        $role = Role::firstOrCreate(['name' => 'pasien', 'guard_name' => 'web']);
        $user = User::factory()->create();
        $user->assignRole($role);
        $this->actingAs($user);

        $file = UploadedFile::fake()->create('dokumen-s3-asli.pdf', 100, 'application/pdf');

        try {
            // 2. Langsung eksekusi penyimpanan ke S3 untuk menguji konfigurasi AWS credential
            $path = $file->store('upload', 's3');
            
            $this->assertNotNull($path, "Path dari S3 null, file gagal terupload.");

            // 3. Validasi: APAKAH FILE BENAR-BENAR BERADA DI AMAZON S3 SERVER?
            $this->assertTrue(Storage::disk('s3')->exists($path), "File gagal terupload: Tidak ditemukan di AWS S3 pada path: " . $path);

            // 4. Cleanup S3: Kita hapus kembali file testing dari Bucket agar tidak membuang kuota AWS
            Storage::disk('s3')->delete($path);
            
            // 5. Percobaan: Memastikan file sukses terhapus dari bucket S3
            $this->assertFalse(Storage::disk('s3')->exists($path), "Proses Cleanup gagal: File masih nyangkut di S3.");
            
        } catch (\Exception $e) {
            // Jika ada ERROR dari S3 (misal key salah), kita akan gagal testnya secara jelas
            $this->fail('AWS S3 Error: ' . $e->getMessage());
        }
    }
}
