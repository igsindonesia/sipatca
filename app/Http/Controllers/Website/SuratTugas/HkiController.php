<?php

namespace App\Http\Controllers\Website\SuratTugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employee\Employee;
use App\Models\Guide;

class HkiController extends Controller
{
    function index() {
        $guide = Guide::where('type', Submission::TYPES[13])->first();
        $data = Submission::where('user_id', Auth::id())->where('type', Submission::TYPES[13])->with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('website.surat-tugas-dosen.hki.index', compact('data', 'guide'));
    }

    function store(Request $request) {
        $request->validate([
            'semester' => ['required', 'string'],
            'nomor_permohonan' => ['required', 'string'],
            'tanggal_permohonan' => ['required', 'date'],
            'jenis_ciptaan' => ['required', 'string'],
            'judul_ciptaan' => ['required', 'string'],
            'nomor_pencatatan' => ['required', 'string'],
            'link_sertifikat' => ['required', 'url'],
            'link_sinta' => ['required', 'url'],
            'daftar_dosen' => ['required', 'array', 'min:1'],
            'daftar_dosen.*.nama' => ['required', 'string'],
            'daftar_dosen.*.keterangan' => ['required', 'string'],
            'daftar_dosen.*.alamat' => ['required', 'string'],
        ]);

        $create = Submission::create([
            'user_id' => Auth::id(),
            'type' => Submission::TYPES[13],
            'data' => json_encode($request->except('_token')),
        ]);

        if ($create) {
            return redirect()->route('surat-tugas-dosen.hki.index')->with([
                'status' => 'success',
                'message' => 'Ajuan berhasil disimpan',
            ]);
        }

        return redirect()->route('surat-tugas-dosen.hki.index')->with([
            'status' => 'error',
            'message' => 'Ajuan gagal disimpan',
        ]);
    }

    function preview(Request $request, Submission $submission) {
        // lazy load relasinya biar ringan
        $submission->load('user.department', 'approvedByEmployee');

        // get data tambahan
        $dekan = Employee::whereHas('position', function ($query) {
            $query->where('code', 'dekan');
        })->latest()->first();

        // Prepare PDF nya
        $file = view('pdf.lecturer.surat-tugas.hki.index', compact('submission', 'dekan'))->render();

        return Pdf::loadHTML($file)->setPaper('a4', 'potrait')->setWarnings(false)->stream();
    }
}
