<?php

namespace App\Http\Controllers\Website\SuratLainnya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employee\Employee;
use App\Models\Guide;

class DosenCutiController extends Controller
{
    function index() {
        $guide = Guide::where('type', Submission::TYPES[12])->first();
        $data = Submission::where('user_id', Auth::id())->where('type', Submission::TYPES[12])->with('user')->orderBy('created_at', 'desc')->paginate(10);
        return view('website.surat-lainnya-dosen.cuti.index', compact('data', 'guide'));
    }

    function store(Request $request) {
        $request->validate([
            'nama' => ['required', 'string'],
            'nip' => ['required', 'string'],
            'jabatan' => ['required', 'string'],
            'fakultas' => ['required', 'string'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date'],
            'alasan' => ['required', 'string'],
        ]);

        $create = Submission::create([
            'user_id' => Auth::id(),
            'type' => Submission::TYPES[12],
            'data' => json_encode($request->except('_token')),
        ]);

        if ($create) {
            return redirect()->route('surat-lainnya-dosen.cuti.index')->with([
                'status' => 'success',
                'message' => 'Ajuan berhasil disimpan',
            ]);
        }

        return redirect()->route('surat-lainnya-dosen.cuti.index')->with([
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
        $file = view('pdf.lecturer.surat-lainnya.cuti.index', compact('submission', 'dekan'))->render();

        return Pdf::loadHTML($file)->setPaper('a4', 'potrait')->setWarnings(false)->stream();
    }
}
