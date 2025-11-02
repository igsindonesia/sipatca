<?php

namespace App\Http\Controllers\Website\SuratTugas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employee\Employee;
use App\Models\Guide;

class PengabdianController extends Controller
{
    function index() {
        $guide = Guide::where('type', Submission::TYPES[14])->first();
        $data = Submission::where('user_id', Auth::id())->where('type', Submission::TYPES[14])->with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('website.surat-tugas-dosen.pengabdian.index', compact('data', 'guide'));
    }

    function store(Request $request) {
        $request->validate([
            'hari_mulai' => ['required', 'string'],
            'hari_selesai' => ['required', 'string'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'tempat' => ['required', 'string'],
            'topik' => ['required', 'array', 'min:1'],
            'topik.*' => ['required', 'string'],
            'link_implementasi' => ['array'],
            'link_implementasi.*' => ['nullable', 'url'],
            'daftar_peserta' => ['required', 'array', 'min:1'],
            'daftar_peserta.*.nama' => ['required', 'string'],
            'daftar_peserta.*.nip' => ['required', 'string'],
            'daftar_peserta.*.jabatan' => ['required', 'string'],
        ]);

        $create = Submission::create([
            'user_id' => Auth::id(),
            'type' => Submission::TYPES[14],
            'data' => json_encode($request->except('_token')),
        ]);

        if ($create) {
            return redirect()->route('surat-tugas-dosen.pengabdian.index')->with([
                'status' => 'success',
                'message' => 'Ajuan berhasil disimpan',
            ]);
        }

        return redirect()->route('surat-tugas-dosen.pengabdian.index')->with([
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
        $file = view('pdf.lecturer.surat-tugas.pengabdian.index', compact('submission', 'dekan'))->render();

        return Pdf::loadHTML($file)->setPaper('a4', 'potrait')->setWarnings(false)->stream();
    }
}
