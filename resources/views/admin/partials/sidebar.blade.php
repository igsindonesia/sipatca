<ul class="sidebar-menu">
  <li class="menu-header">Dashboard</li>
  <li>
    <a class="nav-link" href="{{ route('admin.index') }}"><i class="fas fa-box"></i> <span>Dashboard</span></a>
  </li>
  <li>
    <a class="nav-link" href="{{ route('admin.guide.index') }}"><i class="fas fa-sticky-note"></i> <span>Panduan</span></a>
  </li>
  @if(Auth::guard('employee')->user()->position->level == 0)
    <li>
      <a class="nav-link" href="{{ route('admin.department.index') }}"><i class="fas fa-building"></i> <span>Prodi</span></a>
    </li>
  @endif

  <li class="menu-header">Pengajuan</li>
  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
      <i class="fas fa-user-graduate"></i>
      <span>Mahasiswa</span>
      @php
        $totalMahasiswaSubmissions = 0;
        if(isset($submissionCounts)) {
          $totalMahasiswaSubmissions += $submissionCounts['student']['categories']['surat-pengantar']['total'] ?? 0;
          $totalMahasiswaSubmissions += $submissionCounts['student']['categories']['surat-keterangan']['total'] ?? 0;
          $totalMahasiswaSubmissions += $submissionCounts['student']['categories']['surat-rekomendasi']['total'] ?? 0;
          $totalMahasiswaSubmissions += $submissionCounts['student']['categories']['surat-lainnya']['total'] ?? 0;
        }
      @endphp
      @if($totalMahasiswaSubmissions > 0)
        <span class="badge badge-danger">{{ $totalMahasiswaSubmissions }}</span>
      @endif
    </a>
    <ul class="dropdown-menu">
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="far fa-file-powerpoint"></i>
          <span>Surat Pengantar</span>
          @if(isset($submissionCounts['student']['categories']['surat-pengantar']['total']) && $submissionCounts['student']['categories']['surat-pengantar']['total'] > 0)
            <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-pengantar']['total'] }}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="{{ route('admin.surat-pengantar.pkl.index') }}">
              Praktek Kerja Lapangan
              @if(isset($submissionCounts['student']['categories']['surat-pengantar']['types']['pkl']) && $submissionCounts['student']['categories']['surat-pengantar']['types']['pkl'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-pengantar']['types']['pkl'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-pengantar.skripsi.index') }}">
              Penelitian Skripsi
              @if(isset($submissionCounts['student']['categories']['surat-pengantar']['types']['skripsi']) && $submissionCounts['student']['categories']['surat-pengantar']['types']['skripsi'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-pengantar']['types']['skripsi'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-pengantar.penelitian-matkul.index') }}">
              Penelitian Mata Kuliah
              @if(isset($submissionCounts['student']['categories']['surat-pengantar']['types']['penelitian-matkul']) && $submissionCounts['student']['categories']['surat-pengantar']['types']['penelitian-matkul'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-pengantar']['types']['penelitian-matkul'] }}</span>
              @endif
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-file-signature"></i>
          <span>Surat Keterangan</span>
          @if(isset($submissionCounts['student']['categories']['surat-keterangan']['total']) && $submissionCounts['student']['categories']['surat-keterangan']['total'] > 0)
            <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-keterangan']['total'] }}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="{{ route('admin.surat-keterangan.aktif-kuliah.index') }}">
              Aktif Kuliah
              @if(isset($submissionCounts['student']['categories']['surat-keterangan']['types']['aktif-kuliah']) && $submissionCounts['student']['categories']['surat-keterangan']['types']['aktif-kuliah'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-keterangan']['types']['aktif-kuliah'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-keterangan.bebas-sanksi-akademik.index') }}">
              Bebas Sanksi Akademik
              @if(isset($submissionCounts['student']['categories']['surat-keterangan']['types']['bebas-sanksi-akademik']) && $submissionCounts['student']['categories']['surat-keterangan']['types']['bebas-sanksi-akademik'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-keterangan']['types']['bebas-sanksi-akademik'] }}</span>
              @endif
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-award"></i>
          <span>Surat Rekomendasi</span>
          @if(isset($submissionCounts['student']['categories']['surat-rekomendasi']['total']) && $submissionCounts['student']['categories']['surat-rekomendasi']['total'] > 0)
            <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-rekomendasi']['total'] }}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="{{ route('admin.surat-rekomendasi.beasiswa.index') }}">
              Beasiswa
              @if(isset($submissionCounts['student']['categories']['surat-rekomendasi']['types']['beasiswa']) && $submissionCounts['student']['categories']['surat-rekomendasi']['types']['beasiswa'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-rekomendasi']['types']['beasiswa'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-rekomendasi.mbkm.index') }}">
              MBKM
              @if(isset($submissionCounts['student']['categories']['surat-rekomendasi']['types']['mbkm']) && $submissionCounts['student']['categories']['surat-rekomendasi']['types']['mbkm'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-rekomendasi']['types']['mbkm'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-rekomendasi.non-mbkm.index') }}">
              Non-MBKM
              @if(isset($submissionCounts['student']['categories']['surat-rekomendasi']['types']['non-mbkm']) && $submissionCounts['student']['categories']['surat-rekomendasi']['types']['non-mbkm'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-rekomendasi']['types']['non-mbkm'] }}</span>
              @endif
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="far fa-file-alt"></i>
          <span>Surat Lainnya</span>
          @if(isset($submissionCounts['student']['categories']['surat-lainnya']['total']) && $submissionCounts['student']['categories']['surat-lainnya']['total'] > 0)
            <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-lainnya']['total'] }}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya.transkrip.index') }}">
              Transkrip
              @if(isset($submissionCounts['student']['categories']['surat-lainnya']['types']['transkrip']) && $submissionCounts['student']['categories']['surat-lainnya']['types']['transkrip'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-lainnya']['types']['transkrip'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya.cuti.index') }}">
              Cuti
              @if(isset($submissionCounts['student']['categories']['surat-lainnya']['types']['cuti']) && $submissionCounts['student']['categories']['surat-lainnya']['types']['cuti'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-lainnya']['types']['cuti'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya.transfer.index') }}">
              Transfer
              @if(isset($submissionCounts['student']['categories']['surat-lainnya']['types']['transfer']) && $submissionCounts['student']['categories']['surat-lainnya']['types']['transfer'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-lainnya']['types']['transfer'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya.pengunduran-diri.index') }}">
              Pengunduran Diri
              @if(isset($submissionCounts['student']['categories']['surat-lainnya']['types']['pengunduran-diri']) && $submissionCounts['student']['categories']['surat-lainnya']['types']['pengunduran-diri'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['student']['categories']['surat-lainnya']['types']['pengunduran-diri'] }}</span>
              @endif
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </li>

  <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
      <i class="fas fa-chalkboard-teacher"></i>
      <span>Dosen</span>
      @php
        $totalDosenSubmissions = 0;
        if(isset($submissionCounts)) {
          $totalDosenSubmissions += $submissionCounts['lecturer']['categories']['surat-lainnya']['total'] ?? 0;
          $totalDosenSubmissions += $submissionCounts['lecturer']['categories']['surat-tugas']['total'] ?? 0;
        }
      @endphp
      @if($totalDosenSubmissions > 0)
        <span class="badge badge-danger">{{ $totalDosenSubmissions }}</span>
      @endif
    </a>
    <ul class="dropdown-menu">
      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="far fa-file-alt"></i>
          <span>Surat Lainnya</span>
          @if(isset($submissionCounts['lecturer']['categories']['surat-lainnya']['total']) && $submissionCounts['lecturer']['categories']['surat-lainnya']['total'] > 0)
            <span class="badge badge-danger">{{ $submissionCounts['lecturer']['categories']['surat-lainnya']['total'] }}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya-dosen.cuti.index') }}">
              Cuti
              @if(isset($submissionCounts['lecturer']['categories']['surat-lainnya']['types']['dosen-cuti']) && $submissionCounts['lecturer']['categories']['surat-lainnya']['types']['dosen-cuti'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['lecturer']['categories']['surat-lainnya']['types']['dosen-cuti'] }}</span>
              @endif
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
          <i class="fas fa-tasks"></i>
          <span>Surat Tugas</span>
          @if(isset($submissionCounts['lecturer']['categories']['surat-tugas']['total']) && $submissionCounts['lecturer']['categories']['surat-tugas']['total'] > 0)
            <span class="badge badge-danger">{{ $submissionCounts['lecturer']['categories']['surat-tugas']['total'] }}</span>
          @endif
        </a>
        <ul class="dropdown-menu">
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya-dosen.hki.index') }}">
              HKI (Hak Cipta)
              @if(isset($submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-hki']) && $submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-hki'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-hki'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya-dosen.pengabdian.index') }}">
              Pengabdian Masyarakat
              @if(isset($submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-pengabdian']) && $submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-pengabdian'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-pengabdian'] }}</span>
              @endif
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('admin.surat-lainnya-dosen.publikasi.index') }}">
              Publikasi Jurnal
              @if(isset($submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-publikasi']) && $submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-publikasi'] > 0)
                <span class="badge badge-danger">{{ $submissionCounts['lecturer']['categories']['surat-tugas']['types']['dosen-st-publikasi'] }}</span>
              @endif
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </li>

  <li class="menu-header">Pengguna</li>
  @if(Auth::guard('employee')->user()->position->level == 0)
    <li>
      <a class="nav-link" href="{{ route('admin.user.index') }}"><i class="fas fa-user-graduate"></i> <span>Mahasiswa</span></a>
    </li>
    <li>
      <a class="nav-link" href="{{ route('admin.lecturer.index') }}"><i class="fas fa-chalkboard-teacher"></i> <span>Dosen</span></a>
    </li>
  @endif

  <li class="menu-header">Pengaturan</li>
  @if(Auth::guard('employee')->user()->position->level == 0)
    <li>
      <a class="nav-link" href="{{ route('admin.account.index') }}"><i class="fas fa-users"></i> <span>Akun Admin</span></a>
    </li>
  @endif
  <li>
    <a class="nav-link" href="{{ route('admin.profile.index') }}"><i class="fas fa-user-cog"></i> <span>Profil</span></a>
  </li>
  <li>
    <a class="nav-link" href="{{ route('admin.change-password.index') }}"><i class="fas fa-user-shield"></i> <span>Ubah Password</span></a>
  </li>
</ul>
