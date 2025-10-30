@extends('admin.layout')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Mahasiswa</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Pengguna</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="flex-fill row">
                            <div class="col">
                                <h4>Data Mahasiswa Terdaftar</h4>
                            </div>
                            <div class="col-auto text-right">
                                <form method="GET" action="{{ route('admin.user.index') }}" class="form-inline">
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Cari nama, email, atau NIM..." value="{{ request('search') }}">
                                        <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Prodi</th>
                                    <th>NIM</th>
                                    <th>Status Verifikasi</th>
                                    <th>Tanggal Daftar</th>
                                </tr>
                                @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $users->firstItem() + $key }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->department ? $user->department->name : '-' }}</td>
                                    <td>{{ $user->registration_number }}</td>
                                    <td>
                                        @if($user->email_verified_at)
                                        <span class="badge badge-success">Terverifikasi</span>
                                        @else
                                        <span class="badge badge-warning">Belum Terverifikasi</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        {{ $users->onEachSide(1)->links('vendor.pagination.admin') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop