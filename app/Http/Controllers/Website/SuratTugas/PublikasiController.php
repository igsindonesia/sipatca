<?php

namespace App\Http\Controllers\Website\SuratTugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employee\Employee;
use App\Models\Guide;

class PublikasiController extends Controller
{
    function index() {
        $guide = Guide::where('type', Submission::TYPES[15])->first();
        $data = Submission::where('user_id', Auth::id())->where('type', Submission::TYPES[15])->with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('website.surat-tugas-dosen.publikasi.index', compact('data', 'guide'));
    }

    function store(Request $request) {
        $request->validate([
            'semester' => ['required', 'string'],
            'issn_cetak' => ['required', 'string'],
            'issn_online' => ['required', 'string'],
            'volume' => ['required', 'string'],
            'nomor' => ['required', 'string'],
            'judul_publikasi' => ['required', 'string'],
            'tanggal_publikasi' => ['required', 'date'],
            'link_jurnal' => ['required', 'url'],
            'link_paper' => ['required', 'url'],
            'link_sinta' => ['required', 'url'],
            'dosen' => ['required', 'array', 'min:1'],
            'dosen.*.nama' => ['required', 'string'],
            'dosen.*.nip' => ['required', 'string'],
            'dosen.*.program_studi' => ['required', 'string'],
            'dosen.*.jabatan' => ['required', 'string'],
        ]);

        $create = Submission::create([
            'user_id' => Auth::id(),
            'type' => Submission::TYPES[15],
            'data' => json_encode($request->except('_token')),
        ]);

        if ($create) {
            return redirect()->route('surat-tugas-dosen.publikasi.index')->with([
                'status' => 'success',
                'message' => 'Ajuan berhasil disimpan',
            ]);
        }

        return redirect()->route('surat-tugas-dosen.publikasi.index')->with([
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
        $file = view('pdf.lecturer.surat-tugas.publikasi.index', compact('submission', 'dekan'))->render();

        return Pdf::loadHTML($file)->setPaper('a4', 'potrait')->setWarnings(false)->stream();
    }
}
