@extends('template_admin.master')
@section('contents')

<section class="section">
    <div class="section-header">
        <h1>Data Absensi</h1>
    </div>
    <div class="section-body">

        @if (session()->has('err_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> {{ session()->get('err_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('suc_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('suc_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Daftar Absensi</h4>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <form action="{{ url('/absensi/user') }}" method="GET" id="formFilterUser">
                            <div class="input-group">
                                <select name="user_id" id="user_id" class="form-control" required>
                                    <option value="">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Tampilkan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama User</th>
                            <th>Status Absen</th>
                            <th>Waktu Absen</th>
                            <th>Foto Absen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $absen)
                        <tr>
                            <td>{{ $absen->id }}</td>
                            <td>{{ $absen->user->name ?? 'Tidak Diketahui' }}</td>
                            <td>{{ $absen->status_absen }}</td>
                            <td>{{ $absen->waktu_absen }}</td>
                            <td>
                                @if($absen->photo_absen)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($absen->photo_absen) }}" width="100" class="img-thumbnail"/>
                                @else
                                    <span class="text-muted">Tidak Ada Foto</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</section>

@endsection
