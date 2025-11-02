<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Submission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LecturerSubmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            // Get a lecturer user
            $lecturer = User::where('type', 'lecturer')->first();
            
            if (!$lecturer) {
                $this->command->warn('No lecturer found. Please run UserSeeder first to create lecturer users.');
                return;
            }

            // 1. Cuti (Leave Request) - Type 12
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[12], // dosen-cuti
                'data' => json_encode([
                    'nama' => $lecturer->name,
                    'nip' => $lecturer->registration_number,
                    'jabatan' => 'Dosen Tetap',
                    'fakultas' => 'Fakultas Hukum',
                    'tanggal_mulai' => '2025-11-15',
                    'tanggal_selesai' => '2025-11-30',
                    'alasan' => 'Mengurus keluarga yang sedang sakit',
                    'lampiran' => null,
                ]),
            ]);

            // 2. Cuti (Verified but not approved)
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[12], // dosen-cuti
                'data' => json_encode([
                    'nama' => $lecturer->name,
                    'nip' => $lecturer->registration_number,
                    'jabatan' => 'Dosen Tetap',
                    'fakultas' => 'Fakultas Hukum',
                    'tanggal_mulai' => '2025-12-01',
                    'tanggal_selesai' => '2025-12-14',
                    'alasan' => 'Liburan akhir tahun',
                    'lampiran' => null,
                ]),
                'verified_at' => Carbon::now()->subDay(),
                'verified_by' => 1,
                'verified_note' => 'Data lengkap dan sesuai',
            ]);

            // 3. HKI (Hak Cipta) - Type 13
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[13], // dosen-st-hki
                'data' => json_encode([
                    'semester' => 'Genap 2024/2025',
                    'nomor_permohonan' => 'HKI-001-2025',
                    'tanggal_permohonan' => '2025-10-15',
                    'jenis_ciptaan' => 'Karya Hukum',
                    'judul_ciptaan' => 'Analisis Hukum Ketenagakerjaan di Era Digital',
                    'nomor_pencatatan' => 'EC00123456',
                    'link_sertifikat' => 'https://dgip.go.id/cert/EC00123456',
                    'link_sinta' => 'https://sinta.kemdikbud.go.id',
                    'daftar_dosen' => [
                        [
                            'nama' => 'Dr. ' . $lecturer->name,
                            'keterangan' => 'Pencipta Utama',
                            'alamat' => 'Jl. Universitas No. 45',
                        ],
                        [
                            'nama' => 'Prof. Dr. Siti Nurhaliza',
                            'keterangan' => 'Pencipta Bersama',
                            'alamat' => 'Jl. Pendidikan No. 12',
                        ],
                    ],
                ]),
            ]);

            // 4. HKI (Approved)
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[13], // dosen-st-hki
                'data' => json_encode([
                    'semester' => 'Ganjil 2024/2025',
                    'nomor_permohonan' => 'HKI-002-2025',
                    'tanggal_permohonan' => '2025-09-20',
                    'jenis_ciptaan' => 'Buku Ajar',
                    'judul_ciptaan' => 'Pengantar Hukum Pidana dan Prosedural',
                    'nomor_pencatatan' => 'EC00123457',
                    'link_sertifikat' => 'https://dgip.go.id/cert/EC00123457',
                    'link_sinta' => 'https://sinta.kemdikbud.go.id',
                    'daftar_dosen' => [
                        [
                            'nama' => 'Dr. ' . $lecturer->name,
                            'keterangan' => 'Pengarang Utama',
                            'alamat' => 'Jl. Universitas No. 45',
                        ],
                    ],
                ]),
                'verified_at' => Carbon::now()->subDays(3),
                'verified_by' => 1,
                'verified_note' => 'Dokumen HKI sudah diverifikasi',
                'approved_at' => Carbon::now()->subDay(),
                'approved_by' => 1,
                'approved_note' => 'Disetujui untuk pemrosesan lebih lanjut',
                'letter_number' => 1,
            ]);

            // 5. Pengabdian Masyarakat (Community Service) - Type 14
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[14], // dosen-st-pengabdian
                'data' => json_encode([
                    'hari_mulai' => 'Senin',
                    'hari_selesai' => 'Sabtu',
                    'tanggal_mulai' => '2025-11-17',
                    'tanggal_selesai' => '2025-11-22',
                    'tempat' => 'Kelurahan Suka Maju, Kecamatan Lempilang',
                    'topik' => [
                        'Pelatihan Hak Asasi Manusia dan Keadilan Sosial',
                        'Workshop Literasi Hukum untuk Masyarakat',
                    ],
                    'link_implementasi' => [
                        'https://drive.google.com/folder/pengabdian-2025',
                    ],
                    'daftar_peserta' => [
                        [
                            'nama' => 'Dr. ' . $lecturer->name,
                            'nip' => $lecturer->registration_number,
                            'jabatan' => 'Ketua Tim',
                        ],
                        [
                            'nama' => 'Dr. Muhammad Hasan, S.H., M.H.',
                            'nip' => '197505121999032001',
                            'jabatan' => 'Anggota Tim',
                        ],
                    ],
                ]),
            ]);

            // 6. Pengabdian Masyarakat (Rejected)
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[14], // dosen-st-pengabdian
                'data' => json_encode([
                    'hari_mulai' => 'Selasa',
                    'hari_selesai' => 'Kamis',
                    'tanggal_mulai' => '2025-10-21',
                    'tanggal_selesai' => '2025-10-23',
                    'tempat' => 'Desa Wisata Buana Jaya',
                    'topik' => [
                        'Sosialisasi Edukasi Hukum Konsumen',
                    ],
                    'link_implementasi' => [],
                    'daftar_peserta' => [
                        [
                            'nama' => 'Dr. ' . $lecturer->name,
                            'nip' => $lecturer->registration_number,
                            'jabatan' => 'Ketua Tim',
                        ],
                    ],
                ]),
                'rejected_at' => Carbon::now()->subHours(2),
                'rejected_by' => 1,
                'rejected_note' => 'Dokumen pendukung tidak lengkap. Silakan resubmit dengan melampirkan MOU dengan mitra pengabdian.',
            ]);

            // 7. Publikasi Jurnal (Journal Publication) - Type 15
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[15], // dosen-st-publikasi
                'data' => json_encode([
                    'semester' => 'Genap 2024/2025',
                    'issn_cetak' => '1234-5678',
                    'issn_online' => '5678-1234',
                    'volume' => '8',
                    'nomor' => '2',
                    'judul_publikasi' => 'Perlindungan Data Pribadi dan Privasi di Platform Digital',
                    'tanggal_publikasi' => '2025-06-15',
                    'link_jurnal' => 'https://jurnal.univ.ac.id/index.php/jcs',
                    'link_paper' => 'https://jurnal.univ.ac.id/index.php/jcs/article/view/1234',
                    'link_sinta' => 'https://sinta.kemdikbud.go.id/journals/detail?id=6789',
                    'dosen' => [
                        [
                            'nama' => 'Dr. ' . $lecturer->name,
                            'nip' => $lecturer->registration_number,
                            'program_studi' => 'Ilmu Hukum',
                            'jabatan' => 'Penulis Utama',
                        ],
                        [
                            'nama' => 'Dr. Bambang Setiawan, S.H., M.H.',
                            'nip' => '198203101999031003',
                            'program_studi' => 'Ilmu Hukum',
                            'jabatan' => 'Penulis Anggota',
                        ],
                    ],
                ]),
            ]);

            // 8. Publikasi Jurnal (Verified)
            Submission::create([
                'user_id' => $lecturer->id,
                'type' => Submission::TYPES[15], // dosen-st-publikasi
                'data' => json_encode([
                    'semester' => 'Ganjil 2024/2025',
                    'issn_cetak' => '2345-6789',
                    'issn_online' => '6789-2345',
                    'volume' => '15',
                    'nomor' => '1',
                    'judul_publikasi' => 'Reformasi Sistem Peradilan Pidana dalam Konteks Hak Asasi Manusia',
                    'tanggal_publikasi' => '2025-03-20',
                    'link_jurnal' => 'https://jurnal.univ.ac.id/index.php/jdt',
                    'link_paper' => 'https://jurnal.univ.ac.id/index.php/jdt/article/view/5678',
                    'link_sinta' => 'https://sinta.kemdikbud.go.id/journals/detail?id=9876',
                    'dosen' => [
                        [
                            'nama' => 'Dr. ' . $lecturer->name,
                            'nip' => $lecturer->registration_number,
                            'program_studi' => 'Ilmu Hukum',
                            'jabatan' => 'Penulis Utama',
                        ],
                    ],
                ]),
                'verified_at' => Carbon::now()->subDays(5),
                'verified_by' => 1,
                'verified_note' => 'Publikasi terindeks SINTA, dapat dilanjutkan ke approval',
            ]);

            $this->command->info('Lecturer submission test data created successfully!');
        });
    }
}
