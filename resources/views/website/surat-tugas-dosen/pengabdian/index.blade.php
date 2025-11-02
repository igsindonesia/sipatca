@extends('website.layout')

@section('content')
<!-- ======= Breadcrumbs ======= -->
<section class="breadcrumbs">
  <div class="container">
    <ol>
      <li><a href="{{ route('index') }}">Beranda</a></li>
      <li>Surat Tugas Dosen</li>
      <li>Pengabdian Masyarakat</li>
    </ol>
    <h2>Pengabdian Masyarakat</h2>
  </div>
</section><!-- End Breadcrumbs -->

<section class="inner-page">
  <div class="container">
    <header class="section-header">
      <h2>Surat Tugas Pengabdian Masyarakat</h2>
      <p>Riwayat Pengajuan</p>
    </header>

    @if ($guide && $guide->fileUrl)
      <div class="d-flex align-items-center gap-2 mb-2">
        <span>Unduh panduan pengajuan Pengabdian Masyarakat</span>
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
                <a href="{{ route('surat-tugas-dosen.pengabdian.preview', $datum->id) }}" target="_blank" class="btn btn-primary">Buka</a>
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
        <h2>Surat Tugas Pengabdian Masyarakat</h2>
        <p>Form Pengajuan</p>
      </header>
      <form action="{{ route('surat-tugas-dosen.pengabdian.store') }}" method="post" enctype="multipart/form-data">
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
          <h5 class="fw-bold">Jadwal Pengabdian</h5>
          <div class="col-md-6">
            <label for="hari_mulai" class="form-label">Hari Mulai <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('hari_mulai') is-invalid @enderror" id="hari_mulai" name="hari_mulai" value="{{ old('hari_mulai') }}" placeholder="Contoh: Senin" required>
            @error('hari_mulai')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="hari_selesai" class="form-label">Hari Selesai <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('hari_selesai') is-invalid @enderror" id="hari_selesai" name="hari_selesai" value="{{ old('hari_selesai') }}" placeholder="Contoh: Sabtu" required>
            @error('hari_selesai')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-md-6">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
            @error('tanggal_mulai')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
            <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
            @error('tanggal_selesai')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="row mb-4">
          <h5 class="fw-bold">Detail Pengabdian</h5>
          <div class="col">
            <label for="tempat" class="form-label">Tempat <span class="text-danger">*</span></label>
            <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" name="tempat" value="{{ old('tempat') }}" placeholder="Masukkan lokasi pengabdian" required>
            @error('tempat')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label">Topik Pengabdian <span class="text-danger">*</span></label>
          <div id="topik_container">
            <div class="topik-item mb-2">
              <div class="input-group">
                <input type="text" class="form-control @error('topik.0') is-invalid @enderror" name="topik[0]" value="{{ old('topik.0') }}" placeholder="Masukkan topik">
                <button type="button" class="btn btn-danger remove-topik-btn">Hapus</button>
              </div>
              @error('topik.0')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <button type="button" class="btn btn-sm btn-secondary" id="add_topik_btn">+ Tambah Topik</button>
        </div>

        <div class="mb-4">
          <label class="form-label">Link Implementasi <span class="text-danger">*</span></label>
          <div id="link_implementasi_container">
            <div class="link-item mb-2">
              <div class="input-group">
                <input type="url" class="form-control @error('link_implementasi.0') is-invalid @enderror" name="link_implementasi[0]" value="{{ old('link_implementasi.0') }}" placeholder="https://...">
                <button type="button" class="btn btn-danger remove-link-btn">Hapus</button>
              </div>
              @error('link_implementasi.0')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <button type="button" class="btn btn-sm btn-secondary" id="add_link_btn">+ Tambah Link</button>
        </div>

        <div class="mb-4">
          <label class="form-label">Daftar Peserta <span class="text-danger">*</span></label>
          <div id="daftar_peserta_container">
            <div class="peserta-item mb-3 p-3 border rounded">
              <div class="row mb-2">
                <div class="col-md-4">
                  <label class="form-label">Nama</label>
                  <input type="text" class="form-control @error('daftar_peserta.0.nama') is-invalid @enderror" name="daftar_peserta[0][nama]" value="{{ old('daftar_peserta.0.nama') }}" placeholder="Nama peserta">
                  @error('daftar_peserta.0.nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label class="form-label">NIP</label>
                  <input type="text" class="form-control @error('daftar_peserta.0.nip') is-invalid @enderror" name="daftar_peserta[0][nip]" value="{{ old('daftar_peserta.0.nip') }}" placeholder="Nomor induk pegawai">
                  @error('daftar_peserta.0.nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label class="form-label">Jabatan</label>
                  <input type="text" class="form-control @error('daftar_peserta.0.jabatan') is-invalid @enderror" name="daftar_peserta[0][jabatan]" value="{{ old('daftar_peserta.0.jabatan') }}" placeholder="Contoh: Ketua Tim">
                  @error('daftar_peserta.0.jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <button type="button" class="btn btn-sm btn-danger remove-peserta-btn">Hapus</button>
            </div>
          </div>
          <button type="button" class="btn btn-sm btn-secondary" id="add_peserta_btn">+ Tambah Peserta</button>
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
  let topikCount = 1;
  let linkCount = 1;
  let pesertaCount = 1;

  // Topik handlers
  document.getElementById('add_topik_btn').addEventListener('click', function() {
    const container = document.getElementById('topik_container');
    const newItem = document.createElement('div');
    newItem.className = 'topik-item mb-2';
    newItem.innerHTML = `
      <div class="input-group">
        <input type="text" class="form-control" name="topik[${topikCount}]" placeholder="Masukkan topik">
        <button type="button" class="btn btn-danger remove-topik-btn">Hapus</button>
      </div>
    `;
    container.appendChild(newItem);
    topikCount++;
    attachTopikListeners();
  });

  // Link handlers
  document.getElementById('add_link_btn').addEventListener('click', function() {
    const container = document.getElementById('link_implementasi_container');
    const newItem = document.createElement('div');
    newItem.className = 'link-item mb-2';
    newItem.innerHTML = `
      <div class="input-group">
        <input type="url" class="form-control" name="link_implementasi[${linkCount}]" placeholder="https://...">
        <button type="button" class="btn btn-danger remove-link-btn">Hapus</button>
      </div>
    `;
    container.appendChild(newItem);
    linkCount++;
    attachLinkListeners();
  });

  // Peserta handlers
  document.getElementById('add_peserta_btn').addEventListener('click', function() {
    const container = document.getElementById('daftar_peserta_container');
    const newItem = document.createElement('div');
    newItem.className = 'peserta-item mb-3 p-3 border rounded';
    newItem.innerHTML = `
      <div class="row mb-2">
        <div class="col-md-4">
          <label class="form-label">Nama</label>
          <input type="text" class="form-control" name="daftar_peserta[${pesertaCount}][nama]" placeholder="Nama peserta">
        </div>
        <div class="col-md-4">
          <label class="form-label">NIP</label>
          <input type="text" class="form-control" name="daftar_peserta[${pesertaCount}][nip]" placeholder="Nomor induk pegawai">
        </div>
        <div class="col-md-4">
          <label class="form-label">Jabatan</label>
          <input type="text" class="form-control" name="daftar_peserta[${pesertaCount}][jabatan]" placeholder="Contoh: Anggota Tim">
        </div>
      </div>
      <button type="button" class="btn btn-sm btn-danger remove-peserta-btn">Hapus</button>
    `;
    container.appendChild(newItem);
    pesertaCount++;
    attachPesertaListeners();
  });

  function attachTopikListeners() {
    document.querySelectorAll('.remove-topik-btn').forEach(btn => {
      btn.removeEventListener('click', removeTopikItem);
      btn.addEventListener('click', removeTopikItem);
    });
  }

  function attachLinkListeners() {
    document.querySelectorAll('.remove-link-btn').forEach(btn => {
      btn.removeEventListener('click', removeLinkItem);
      btn.addEventListener('click', removeLinkItem);
    });
  }

  function attachPesertaListeners() {
    document.querySelectorAll('.remove-peserta-btn').forEach(btn => {
      btn.removeEventListener('click', removePesertaItem);
      btn.addEventListener('click', removePesertaItem);
    });
  }

  function removeTopikItem(e) {
    e.preventDefault();
    e.target.closest('.topik-item').remove();
  }

  function removeLinkItem(e) {
    e.preventDefault();
    e.target.closest('.link-item').remove();
  }

  function removePesertaItem(e) {
    e.preventDefault();
    e.target.closest('.peserta-item').remove();
  }

  attachTopikListeners();
  attachLinkListeners();
  attachPesertaListeners();
});
</script>
@endsection
