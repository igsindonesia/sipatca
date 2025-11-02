@extends('website.layout')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">
    <ol>
      <li><a href="{{ route('index') }}">Beranda</a></li>
      <li>Surat Tugas Dosen</li>
      <li>HKI</li>
    </ol>
    <h2>HKI (Hak Cipta)</h2>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <header class="section-header">
      <h2>Surat Tugas HKI (Hak Cipta)</h2>
      <p>Riwayat Pengajuan</p>
    </header>

    @if ($guide && $guide->fileUrl)
      <div class="d-flex align-items-center gap-2 mb-2">
        <span>Unduh panduan pengajuan HKI</span>
        <a href="{{ $guide->fileUrl }}" target="_blank" class="btn btn-secondary">Unduh</a>
      </div>
    @endif

    <table class="table table-striped">
      <thead class="table-dark text-center">
        <tr>
          <th>No.</th>
          <th>Nama</th>
          <th>Tanggal Pengajuan</th>
          <th>Status Pengajuan</th>
          <th>Periksa Dokumen</th>
        </tr>
      </thead>
      <tbody class="text-center align-middle">
        @foreach ($data as $key => $datum)
        <tr>
          <td>{{ $key+1 }}.</td>
          <td>{{ $datum->user->name }}</td>
          <td>{{ $datum->formattedCreatedAt }}</td>
          <td>
            <div class="badge badge-{{ $datum->StatusBadge }}">
              {{ $datum->status }}
            </div>
          </td>
          <td>
            @if($datum->approved_at)
                <a href="{{ route('surat-tugas-dosen.hki.preview', $datum->id) }}" target="_blank" class="btn btn-primary">Buka</a>
            @elseif($datum->rejected_at)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#rejectionModal{{ $datum->id }}">
                    Alasan Ditolak
                </button>

                <!-- Modal -->
                <div class="modal fade" id="rejectionModal{{ $datum->id }}" tabindex="-1" aria-labelledby="rejectionModalLabel{{ $datum->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rejectionModalLabel{{ $datum->id }}">Alasan Penolakan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="preserve-whitespace">{!! $datum->rejected_note !!}</div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <div class="blog pt-1">
      {{ $data->onEachSide(1)->links('vendor.pagination.website') }}
    </div>

    <div class="mt-5">
      <header class="section-header">
        <h2>Surat Tugas HKI (Hak Cipta)</h2>
        <p>Form Pengajuan</p>
      </header>
      <form action="{{ route('surat-tugas-dosen.hki.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
          <div class="alert alert-danger">
            <ul class="mb-0">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="row mb-4">
          <h5 class="fw-bold">Informasi Permohonan</h5>
          <div class="col-md-6">
            <label for="semester" class="form-label">Semester <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}" placeholder="Contoh: Genap 2024/2025" required>
            @error('semester')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="nomor_permohonan" class="form-label">Nomor Permohonan <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nomor_permohonan') is-invalid @enderror" id="nomor_permohonan" name="nomor_permohonan" value="{{ old('nomor_permohonan') }}" placeholder="Masukkan nomor permohonan" required>
            @error('nomor_permohonan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label for="tanggal_permohonan" class="form-label">Tanggal Permohonan <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tanggal_permohonan') is-invalid @enderror" id="tanggal_permohonan" name="tanggal_permohonan" value="{{ old('tanggal_permohonan') }}" required>
            @error('tanggal_permohonan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="jenis_ciptaan" class="form-label">Jenis Ciptaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('jenis_ciptaan') is-invalid @enderror" id="jenis_ciptaan" name="jenis_ciptaan" value="{{ old('jenis_ciptaan') }}" placeholder="Masukkan jenis ciptaan" required>
            @error('jenis_ciptaan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <h5 class="fw-bold">Detail Ciptaan</h5>
          <div class="col-md-6">
            <label for="judul_ciptaan" class="form-label">Judul Ciptaan <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('judul_ciptaan') is-invalid @enderror" id="judul_ciptaan" name="judul_ciptaan" value="{{ old('judul_ciptaan') }}" placeholder="Masukkan judul ciptaan" required>
            @error('judul_ciptaan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="nomor_pencatatan" class="form-label">Nomor Pencatatan <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nomor_pencatatan') is-invalid @enderror" id="nomor_pencatatan" name="nomor_pencatatan" value="{{ old('nomor_pencatatan') }}" placeholder="Masukkan nomor pencatatan" required>
            @error('nomor_pencatatan')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label for="link_sertifikat" class="form-label">Link Sertifikat <span class="text-danger">*</span></label>
            <input type="url" class="form-control @error('link_sertifikat') is-invalid @enderror" id="link_sertifikat" name="link_sertifikat" value="{{ old('link_sertifikat') }}" placeholder="https://..." required>
            @error('link_sertifikat')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="link_sinta" class="form-label">Link SINTA <span class="text-danger">*</span></label>
            <input type="url" class="form-control @error('link_sinta') is-invalid @enderror" id="link_sinta" name="link_sinta" value="{{ old('link_sinta') }}" placeholder="https://..." required>
            @error('link_sinta')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label">Daftar Dosen <span class="text-danger">*</span></label>
          <div id="daftar_dosen_container">
            <div class="daftar-dosen-item mb-3 p-3 border rounded">
              <div class="row mb-2">
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control @error('daftar_dosen.0.nama') is-invalid @enderror" name="daftar_dosen[0][nama]" value="{{ old('daftar_dosen.0.nama') }}" placeholder="Nama dosen" required>
                  @error('daftar_dosen.0.nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label">Keterangan</label>
                  <input type="text" class="form-control @error('daftar_dosen.0.keterangan') is-invalid @enderror" name="daftar_dosen[0][keterangan]" value="{{ old('daftar_dosen.0.keterangan') }}" placeholder="Contoh: Pencipta Utama" required>
                  @error('daftar_dosen.0.keterangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="mb-2">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control @error('daftar_dosen.0.alamat') is-invalid @enderror" name="daftar_dosen[0][alamat]" value="{{ old('daftar_dosen.0.alamat') }}" placeholder="Masukkan alamat" required>
                @error('daftar_dosen.0.alamat')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
              <button type="button" class="btn btn-sm btn-danger remove-dosen-btn">Hapus</button>
            </div>
          </div>
          <button type="button" class="btn btn-sm btn-secondary" id="add_dosen_btn">+ Tambah Dosen</button>
        </div>

        <div class="d-grid d-md-flex justify-content-md-end">
          <button type="submit" class="btn btn-primary btn-lg">Ajukan</button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  let dosenCount = 1;

  document.getElementById('add_dosen_btn').addEventListener('click', function() {
    const container = document.getElementById('daftar_dosen_container');
    const newItem = document.createElement('div');
    newItem.className = 'daftar-dosen-item mb-3 p-3 border rounded';
    newItem.innerHTML = `
      <div class="row mb-2">
        <div class="col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="daftar_dosen[${dosenCount}][nama]" placeholder="Nama dosen">
        </div>
        <div class="col-md-6">
          <label class="form-label">Keterangan</label>
          <input type="text" class="form-control" name="daftar_dosen[${dosenCount}][keterangan]" placeholder="Contoh: Pencipta Bersama">
        </div>
      </div>
      <div class="mb-2">
        <label class="form-label">Alamat</label>
        <input type="text" class="form-control" name="daftar_dosen[${dosenCount}][alamat]" placeholder="Masukkan alamat">
      </div>
      <button type="button" class="btn btn-sm btn-danger remove-dosen-btn">Hapus</button>
    `;
    container.appendChild(newItem);
    dosenCount++;
    attachRemoveListeners();
  });

  function attachRemoveListeners() {
    document.querySelectorAll('.remove-dosen-btn').forEach(btn => {
      btn.removeEventListener('click', removeDosenItem);
      btn.addEventListener('click', removeDosenItem);
    });
  }

  function removeDosenItem(e) {
    e.preventDefault();
    e.target.closest('.daftar-dosen-item').remove();
  }

  attachRemoveListeners();
});
</script>
@endsection
