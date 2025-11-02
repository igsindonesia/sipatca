@php
  $data = json_decode($submission->data);
@endphp
@extends('admin.layout')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>Surat Dosen</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="javascript:void(0)">Surat Dosen</a></div>
      <div class="breadcrumb-item">Publikasi Jurnal</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Surat Tugas Publikasi Jurnal</h2>
    <p class="section-lead">Detail Pengajuan</p>

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Informasi Publikasi</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Semester</label>
                  <input type="text" class="form-control" value="{{ $data->semester ?? '-' }}" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>ISSN Cetak</label>
                  <input type="text" class="form-control" value="{{ $data->issn_cetak ?? '-' }}" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>ISSN Online</label>
                  <input type="text" class="form-control" value="{{ $data->issn_online ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Volume</label>
                  <input type="text" class="form-control" value="{{ $data->volume ?? '-' }}" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Nomor</label>
                  <input type="text" class="form-control" value="{{ $data->nomor ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Judul Publikasi</label>
                  <input type="text" class="form-control" value="{{ $data->judul_publikasi ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Tanggal Publikasi</label>
                  <input type="text" class="form-control" value="{{ $data->tanggal_publikasi ?? '-' }}" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Link Jurnal</label>
                  <input type="text" class="form-control" value="{{ $data->link_jurnal ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Link Paper</label>
                  <input type="text" class="form-control" value="{{ $data->link_paper ?? '-' }}" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Link SINTA</label>
                  <input type="text" class="form-control" value="{{ $data->link_sinta ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            @if(isset($data->dosen) && count((array)$data->dosen) > 0)
            <div class="row">
              <div class="col">
                <h5 class="mt-4">Daftar Dosen Penulis</h5>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Program Studi</th>
                        <th>Jabatan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data->dosen as $dosen)
                      <tr>
                        <td>{{ $dosen->nama ?? '-' }}</td>
                        <td>{{ $dosen->nip ?? '-' }}</td>
                        <td>{{ $dosen->program_studi ?? '-' }}</td>
                        <td>{{ $dosen->jabatan ?? '-' }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            @endif
          </div>
        </div>

        <div class="card">
          <div class="card-header">
            <h4>Persetujuan & Catatan</h4>
          </div>
          <div class="card-body">
            @if($errors->any())
              <div class="row">
                <div class="col">
                  @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                      {{ $error }}
                    </div>
                  @endforeach
                </div>
              </div>
            @endif

            <form action="{{ route('admin.surat-lainnya-dosen.publikasi.update', $submission->id) }}" method="post">
              @csrf
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Catatan Verifikator</label>
                    <textarea
                      name="{{ Auth::guard('employee')->user()->position->AllowedToVerify ? 'note':'' }}"
                      rows="20"
                      class="form-control"
                      {{ $submission->isAvailableToVerified && Auth::guard('employee')->user()->position->AllowedToVerify && !$submission->rejected_at ? '':'disabled' }}
                    >{{ $submission->verified_note }}</textarea>
                    @if($submission->verified_at)
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Oleh: {{ $submission->verifiedByEmployee->name }}
                      </small>
                    @endif
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label>Catatan Approval</label>
                    <textarea
                      name="{{ Auth::guard('employee')->user()->position->AllowedToApprove('dosen-st-publikasi') ? 'note':'' }}"
                      rows="20"
                      class="form-control"
                      {{ $submission->isAvailableToApproved && Auth::guard('employee')->user()->position->AllowedToApprove('dosen-st-publikasi') && !$submission->rejected_at ? '':'disabled' }}
                    >{{ $submission->approved_note }}</textarea>
                    @if($submission->approved_at)
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Oleh: {{ $submission->approvedByEmployee->name }}
                      </small>
                    @endif
                  </div>
                </div>
              </div>

              @if($submission->rejected_at)
                <div class="row">
                  <div class="col">
                    <div class="form-group">
                      <label>Alasan Ditolak</label>
                      <textarea
                        rows="20"
                        class="form-control"
                        disabled
                      >{{ $submission->rejected_note }}</textarea>
                      <small id="passwordHelpBlock" class="form-text text-muted">
                        Oleh: {{ $submission->rejectedByEmployee->name }}
                      </small>
                    </div>
                  </div>
                </div>
              @endif

              <div class="row justify-content-end">
                @if($submission->isAvailableToRejected(Auth::guard('employee')->user()->position, 'dosen-st-publikasi'))
                  <div class="col-4 text-right">
                    <button type="submit" name="type" value="rejected" class="btn btn-lg btn-danger form-control">Tolak</button>
                  </div>
                @endif

                @if(!$submission->rejected_at)
                  @if($submission->isAvailableToVerified && Auth::guard('employee')->user()->position->AllowedToVerify)
                    <div class="col-4 text-right">
                      <button type="submit" name="type" value="verified" class="btn btn-lg btn-primary form-control {{ ($submission->verified_at != null) ? 'disabled':'' }}">Verifikasi</button>
                    </div>
                  @endif

                  @if($submission->isAvailableToApproved && Auth::guard('employee')->user()->position->AllowedToApprove('dosen-st-publikasi'))
                    <div class="col-4 text-right">
                      <button type="submit" name="type" value="approved" class="btn btn-lg btn-primary form-control {{ ($submission->approved_at != null) ? 'disabled':'' }}">Setujui</button>
                    </div>
                  @endif
                @endif
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@stop
