<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('index') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('website/img/logo-upn.png') }}" alt="">
            <span>SILAKSA</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                @if(!auth()->user() || (auth()->user() && auth()->user()->type === 'student'))
                <li class="dropdown"><a href="#"><span>Perkuliahan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="#">Informatika</a></li>
                        <li><a href="#">Sistem Informasi</a></li>
                        <li><a href="#">Sains Data</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Surat Pengantar</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('surat-pengantar.pkl.index') }}">Praktek Kerja Lapangan</a></li>
                        <li><a href="{{ route('surat-pengantar.skripsi.index') }}">Penelitian Skripsi</a></li>
                        <li><a href="{{ route('surat-pengantar.penelitian-matkul.index') }}">Penelitian Mata Kuliah</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Surat Keterangan</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('surat-keterangan.aktif-kuliah.index') }}">Aktif Kuliah</a></li>
                        <li><a href="{{ route('surat-keterangan.bebas-sanksi-akademik.index') }}">Bebas Sanksi Akademik</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Surat Rekomendasi</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('surat-rekomendasi.beasiswa.index') }}">Beasiswa</a></li>
                        <li><a href="{{ route('surat-rekomendasi.mbkm.index') }}">MBKM</a></li>
                        <li><a href="{{ route('surat-rekomendasi.non-mbkm.index') }}">Non-MBKM (Umum)</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Surat Lainnya</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('surat-lainnya.transkrip.index') }}">Transkrip</a></li>
                        <li><a href="{{ route('surat-lainnya.cuti.index') }}">Cuti</a></li>
                        <li><a href="{{ route('surat-lainnya.transfer.index') }}">Transfer</a></li>
                        <li><a href="{{ route('surat-lainnya.pengunduran-diri.index') }}">Pengunduran Diri</a></li>
                    </ul>
                </li>
                <li><a href="https://u-yus.igsindonesia.org" target="_blank"><span>Yudisium</span></a></li>
                @elseif(auth()->user() && auth()->user()->type === 'lecturer')
                <li class="dropdown"><a href="#"><span>Surat Tugas</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('surat-tugas-dosen.hki.index') }}">HKI (Hak Cipta)</a></li>
                        <li><a href="{{ route('surat-tugas-dosen.pengabdian.index') }}">Pengabdian Masyarakat</a></li>
                        <li><a href="{{ route('surat-tugas-dosen.publikasi.index') }}">Publikasi Jurnal</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Surat Lainnya</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('surat-lainnya-dosen.cuti.index') }}">Permohonan Cuti</a></li>
                    </ul>
                </li>
                @endif
                @if(auth()->user())
                <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="{{ route('profile.index') }}">Ubah Profil</a></li>
                        <li><a href="{{ route('profile.change-password.index') }}">Ganti Password</a></li>
                        <li><a href="{{ route('logout') }}">Keluar</a></li>
                    </ul>
                </li>
                @else
                <li><a class="getstarted scrollto" href="{{ route('login') }}">Masuk</a></li>
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>