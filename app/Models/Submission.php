<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Employee\Employee;
use Illuminate\Support\Facades\Auth;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'user_type',
        'type',
        'data',
        'verified_at',
        'verified_by',
        'verified_note',
        'approved_at',
        'approved_by',
        'approved_note',
        'rejected_at',
        'rejected_by',
        'rejected_note',
        'letter_number',
    ];

    public const TYPES = [
        // Mahasiswa
        'pkl', // 0. Surat pengajuan pkl
        'skripsi', // 1. Surat pengajuan skripsi
        'penelitian-matkul', // 2. Surat pengantar penelitian matkul
        'aktif-kuliah', // 3. Surat keterangan aktif kuliah
        'bebas-sanksi-akademik', // 4. Surat Keterangan Bebas Sanksi Akademik
        'cuti', // 5. Surat Lainnya cuti
        'transfer', // 6. Surat Lainnya Transfer
        'pengunduran-diri', // 7. Surat Lainnya Pengunduran Diri
        'transkrip', // 8. Surat Lainnya Transkrip
        'beasiswa', // 9. Surat Rekomendasi Beasiswa
        'mbkm', // 10. Surat Rekomendasi MBKM
        'non-mbkm', // 11. Surat Rekomendasi Non-MBKM

        // Dosen
        'dosen-cuti', // 12. Surat Cuti Dosen
        'dosen-st-hki', // 13. Surat Tugas HKI
        'dosen-st-pengabdian', // 14. Surat Tugas Pengabdian Masyarakat
        'dosen-st-publikasi', // 15. Surat Tugas Publikasi Jurnal
    ];

    public const ROMAN_MONTH = [
        1 => 'I',
        2 => 'II',
        3 => 'III',
        4 => 'IV',
        5 => 'V',
        6 => 'VI',
        7 => 'VII',
        8 => 'VIII',
        9 => 'IX',
        10 => 'X',
        11 => 'XI',
        12 => 'XII',
    ];

    function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    function verifiedByEmployee() {
        return $this->belongsTo(Employee::class, 'verified_by', 'id');
    }

    function approvedByEmployee() {
        return $this->belongsTo(Employee::class, 'approved_by', 'id')
            ->withDefault(function ($employee) {
                return Employee::where('employee_position_id', 1)->first() ?? new Employee();
            });
    }

    function rejectedByEmployee() {
        return $this->belongsTo(Employee::class, 'rejected_by', 'id');
    }

    function getFormattedCreatedAtAttribute() {
        return Carbon::parse($this->created_at)->locale('id_ID')->translatedFormat('d F Y H:i');
    }

    function getStatusAttribute() {
        if ($this->rejected_at != null) {
            return 'Ditolak';
        }

        if ($this->approved_at != null) {
            return 'Telah Disetujui';
        }

        if ($this->verified_at != null) {
            return 'Menunggu Persetujuan';
        }

        return 'Menunggu Verifikasi';
    }

    function getStatusBadgeAttribute() {
        if ($this->rejected_at) {
            return 'danger';
        }

        if ($this->approved_at && $this->verified_at) {
            return 'success';
        }

        return 'warning';
    }

    function getIsAvailableToVerifiedAttribute() {
        // bisa diverifikasi ketika:
        // 1. belum ditolak
        // 2. belum diverifikasi
        if (!$this->rejected_at && !$this->verified_at) {
            return true;
        }
        return false;
    }

    function getIsAvailableToApprovedAttribute() {
        // bisa diapprove ketika:
        // 1. belum ditolak
        // 2. sudah diverifikasi oleh staff
        // 3. belum diapprove
        if (!$this->rejected_at && $this->verified_at && !$this->approved_at) {
            return true;
        }
        return false;
    }

    function IsAvailableToRejected($position, $type) {
        // bagian verifikator
        if ($this->isAvailableToVerified && $position->AllowedToVerify) {
            return true;
        }

        // bagian approval
        if ($this->isAvailableToApproved && $position->AllowedToApprove($type)) {
            return true;
        }

        // tidak boleh ditolak
        return false;
    }

    function getFormattedLetterNumberAttribute() {
        $approvedAt = Carbon::parse($this->approved_at)->locale('id_ID');
        return $this->letter_number . '/UN.63.7/' . Submission::ROMAN_MONTH[$approvedAt->translatedFormat('n')] . '/' . $approvedAt->translatedFormat('Y');
    }

    function nextLetterNumber() {
        // untuk ambil current month and year
        $now = Carbon::now();

        // prepare nomor surat, default 1
        $letterNumber = 1;

        // get nomor surat terakhir di bulan dan tahun ini
        $lastSubmissionThisMonth = Submission::whereYear('approved_at', $now->year)->orderBy('letter_number', 'desc')->first();

        if ($lastSubmissionThisMonth) {
            $letterNumber = $lastSubmissionThisMonth->letter_number + 1;
        }

        return $letterNumber;
    }
}
