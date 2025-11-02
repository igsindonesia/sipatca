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
      <div class="breadcrumb-item">Pengabdian Masyarakat</div>
    </div>
  </div>

  <div class="section-body">
    <h2 class="section-title">Surat Tugas Pengabdian Masyarakat</h2>
    <p class="section-lead">Detail Pengajuan</p>

    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header">
            <h4>Informasi Kegiatan</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Hari Mulai</label>
                  <input type="text" class="form-control" value="{{ $data->hari_mulai ?? '-' }}" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Hari Selesai</label>
                  <input type="text" class="form-control" value="{{ $data->hari_selesai ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="text" class="form-control" value="{{ $data->tanggal_mulai ?? '-' }}" disabled>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label>Tanggal Selesai</label>
                  <input type="text" class="form-control" value="{{ $data->tanggal_selesai ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Tempat</label>
                  <input type="text" class="form-control" value="{{ $data->tempat ?? '-' }}" disabled>
                </div>
              </div>
            </div>

            @if(isset($data->topik) && count((array)$data->topik) > 0)
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Topik Kegiatan</label>
                  <ul class="list-group">
                    @foreach($data->topik as $topik)
                    <li class="list-group-item">{{ $topik }}</li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            @endif

            @if(isset($data->link_implementasi) && count((array)$data->link_implementasi) > 0)
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label>Link Implementasi</label>
                  <ul class="list-group">
                    @foreach($data->link_implementasi as $link)
                    <li class="list-group-item">
                      <a href="{{ $link }}" target="_blank">{{ $link }}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
            @endif

            @if(isset($data->daftar_peserta) && count((array)$data->daftar_peserta) > 0)
            <div class="row">
              <div class="col">
                <h5 class="mt-4">Daftar Peserta</h5>
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data->daftar_peserta as $peserta)
                      <tr>
                        <td>{{ $peserta->nama ?? '-' }}</td>
                        <td>{{ $peserta->nip ?? '-' }}</td>
                        <td>{{ $peserta->jabatan ?? '-' }}</td>
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

            <form action="{{ route('admin.surat-lainnya-dosen.pengabdian.update', $submission->id) }}" method="post">
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
                      name="{{ Auth::guard('employee')->user()->position->AllowedToApprove('dosen-st-pengabdian') ? 'note':'' }}"
                      rows="20"
                      class="form-control"
                      {{ $submission->isAvailableToApproved && Auth::guard('employee')->user()->position->AllowedToApprove('dosen-st-pengabdian') && !$submission->rejected_at ? '':'disabled' }}
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
                @if($submission->isAvailableToRejected(Auth::guard('employee')->user()->position, 'dosen-st-pengabdian'))
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

                  @if($submission->isAvailableToApproved && Auth::guard('employee')->user()->position->AllowedToApprove('dosen-st-pengabdian'))
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
