<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'code',
        'name',
        'short_name',
        'description',
    ];

    protected $masterLevels = [
        'admin' => 0,
        'dekan' => 1,
        'wadek' => 2,
        'koorprodi' => 3,
        'staff' => 4,
    ];

    protected $masterCodes = [
        0 => 'admin',
        1 => 'dekan',
        2 => 'wadek-1',
        3 => 'wadek-2',
        4 => 'wadek-3',
        5 => 'koorprodi',
        6 => 'staff',
    ];

    function getAllowedToVerifyAttribute() {
        // karena cuman staff dan admin yg bisa verif, jadinya gini aja udah aman
        if (in_array($this->level, [$this->masterLevels['admin'], $this->masterLevels['staff']])) {
            return true;
        }

        return false;
    }

    function allowedToApprove($type) {
        switch ($type) {
            // Bagian Surat Pengantar
            case 'pkl': // pkl hanya boleh: admin, dekan, wadek-3
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[4]]);
                break;
            case 'skripsi': // skripsi hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;
            case 'penelitian-matkul': // penelitian matkul hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;

            // Bagian Surat Keterangan
            case 'aktif-kuliah': // aktif kuliah hanya boleh: admin, dekan, wadek-3
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[4]]);
                break;
            case 'bebas-sanksi-akademik': // bebas sanksi akademik hanya boleh: admin, dekan, wadek-3
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[4]]);
                break;

            // Bagian Surat Rekomendasi
            case 'beasiswa': // beasiswa hanya boleh: admin, dekan, wadek-3
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[4]]);
                break; 
            case 'mbkm': // mbkm hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break; 
            case 'non-mbkm': // non-mbkm hanya boleh: admin, dekan, wadek-3
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[4]]);
                break; 

            // Bagian Surat Lainnya
            case 'transkrip': // transkrip hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;
            case 'cuti': // cuti hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;
            case 'transfer': // transfer hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;
            case 'pengunduran-diri': // pengunduran diri hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;

            // Bagian Surat Dosen
            case 'dosen-cuti': // cuti dosen hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;
            case 'dosen-st-hki': // surat tugas hki hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;
            case 'dosen-st-pengabdian': // surat tugas pengabdian hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;
            case 'dosen-st-publikasi': // surat tugas publikasi hanya boleh: admin, dekan, wadek-1
                return in_array($this->code, [$this->masterCodes[0], $this->masterCodes[1], $this->masterCodes[2]]);
                break;

            // Default
            default:
                return false;
                break;
        }
    }
}
