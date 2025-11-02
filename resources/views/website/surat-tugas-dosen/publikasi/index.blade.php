@extends('website.layout')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">
    <ol>
      <li><a href="{{ route('index') }}">Beranda</a></li>
      <li>Surat Tugas Dosen</li>
      <li>Publikasi Jurnal</li>
    </ol>
    <h2>Publikasi Jurnal</h2>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <header class="section-header">
      <h2>Surat Tugas Publikasi Jurnal</h2>
      <p>Riwayat Pengajuan</p>
    </header>

    @if ($guide && $guide->fileUrl)
      <div class="d-flex align-items-center gap-2 mb-2">
        <span>Unduh panduan pengajuan Publikasi Jurnal</span>
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
                <a href="{{ route('surat-tugas-dosen.publikasi.preview', $datum->id) }}" target="_blank" class="btn btn-primary">Buka</a>
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
        <h2>Surat Tugas Publikasi Jurnal</h2>
        <p>Form Pengajuan</p>
      </header>
      <form action="{{ route('surat-tugas-dosen.publikasi.store') }}" method="post" enctype="multipart/form-data">
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
          <h5 class="fw-bold">Informasi Jurnal</h5>
          <div class="col-md-6">
            <label for="semester" class="form-label">Semester <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('semester') is-invalid @enderror" id="semester" name="semester" value="{{ old('semester') }}" placeholder="Contoh: Genap 2024/2025" required>
            @error('semester')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="issn_cetak" class="form-label">ISSN Cetak <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('issn_cetak') is-invalid @enderror" id="issn_cetak" name="issn_cetak" value="{{ old('issn_cetak') }}" placeholder="Contoh: 1234-5678" required>
            @error('issn_cetak')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label for="issn_online" class="form-label">ISSN Online <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('issn_online') is-invalid @enderror" id="issn_online" name="issn_online" value="{{ old('issn_online') }}" placeholder="Contoh: 5678-1234" required>
            @error('issn_online')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-3">
            <label for="volume" class="form-label">Volume <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('volume') is-invalid @enderror" id="volume" name="volume" value="{{ old('volume') }}" placeholder="Contoh: 8" required>
            @error('volume')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-3">
            <label for="nomor" class="form-label">Nomor <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" value="{{ old('nomor') }}" placeholder="Contoh: 2" required>
            @error('nomor')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <h5 class="fw-bold">Detail Publikasi</h5>
          <div class="col">
            <label for="judul_publikasi" class="form-label">Judul Publikasi <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('judul_publikasi') is-invalid @enderror" id="judul_publikasi" name="judul_publikasi" value="{{ old('judul_publikasi') }}" placeholder="Masukkan judul publikasi" required>
            @error('judul_publikasi')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label for="tanggal_publikasi" class="form-label">Tanggal Publikasi <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tanggal_publikasi') is-invalid @enderror" id="tanggal_publikasi" name="tanggal_publikasi" value="{{ old('tanggal_publikasi') }}" required>
            @error('tanggal_publikasi')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label for="link_jurnal" class="form-label">Link Jurnal <span class="text-danger">*</span></label>
            <input type="url" class="form-control @error('link_jurnal') is-invalid @enderror" id="link_jurnal" name="link_jurnal" value="{{ old('link_jurnal') }}" placeholder="https://..." required>
            @error('link_jurnal')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="link_paper" class="form-label">Link Paper <span class="text-danger">*</span></label>
            <input type="url" class="form-control @error('link_paper') is-invalid @enderror" id="link_paper" name="link_paper" value="{{ old('link_paper') }}" placeholder="https://..." required>
            @error('link_paper')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-4">
          <label for="link_sinta" class="form-label">Link SINTA <span class="text-danger">*</span></label>
          <input type="url" class="form-control @error('link_sinta') is-invalid @enderror" id="link_sinta" name="link_sinta" value="{{ old('link_sinta') }}" placeholder="https://..." required>
          @error('link_sinta')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-4">
          <label class="form-label">Daftar Dosen Penulis <span class="text-danger">*</span></label>
          <div id="daftar_dosen_container">
            <div class="dosen-item mb-3 p-3 border rounded">
              <div class="row mb-2">
                <div class="col-md-6">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control @error('dosen.0.nama') is-invalid @enderror" name="dosen[0][nama]" value="{{ old('dosen.0.nama') }}" placeholder="Nama dosen" required>
                  @error('dosen.0.nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label">NIP</label>
                  <input type="text" class="form-control @error('dosen.0.nip') is-invalid @enderror" name="dosen[0][nip]" value="{{ old('dosen.0.nip') }}" placeholder="Nomor induk pegawai" required>
                  @error('dosen.0.nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-md-6">
                  <label class="form-label">Program Studi</label>
                  <input type="text" class="form-control @error('dosen.0.program_studi') is-invalid @enderror" name="dosen[0][program_studi]" value="{{ old('dosen.0.program_studi') }}" placeholder="Contoh: Hukum" required>
                  @error('dosen.0.program_studi')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label">Jabatan</label>
                  <input type="text" class="form-control @error('dosen.0.jabatan') is-invalid @enderror" name="dosen[0][jabatan]" value="{{ old('dosen.0.jabatan') }}" placeholder="Contoh: Dosen" required>
                  @error('dosen.0.jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
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
    newItem.className = 'dosen-item mb-3 p-3 border rounded';
    newItem.innerHTML = `
      <div class="row mb-2">
        <div class="col-md-6">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="dosen[${dosenCount}][nama]" placeholder="Nama dosen">
        </div>
        <div class="col-md-6">
          <label class="form-label">NIP</label>
          <input type="text" class="form-control" name="dosen[${dosenCount}][nip]" placeholder="Nomor induk pegawai">
        </div>
      </div>
      <div class="row mb-2">
        <div class="col-md-6">
          <label class="form-label">Program Studi</label>
          <input type="text" class="form-control" name="dosen[${dosenCount}][program_studi]" placeholder="Contoh: Hukum">
        </div>
        <div class="col-md-6">
          <label class="form-label">Jabatan</label>
          <input type="text" class="form-control" name="dosen[${dosenCount}][jabatan]" placeholder="Contoh: Penulis Anggota">
        </div>
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
    e.target.closest('.dosen-item').remove();
  }

  attachRemoveListeners();
});
</script>
@endsection
