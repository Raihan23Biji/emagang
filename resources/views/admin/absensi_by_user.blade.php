@extends('template_admin.master')

@section('contents')
<div class="container mt-4">
    <h3 class="mb-4">Data Absensi Pengguna</h3>

    @if($absensi->isEmpty())
        <div class="alert alert-warning">
            Belum ada data absensi untuk pengguna ini.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Pengguna</th>
                        <th>Waktu Absen</th>
                        <th>Status</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensi as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->user->name ?? 'Tidak ditemukan' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->waktu_absen)->format('d-m-Y H:i:s') }}</td>
                            <td class="text-capitalize text-center">
                                <span class="badge bg-{{ $item->status_absen == 'hadir' ? 'success' : 'secondary' }}">
                                    {{ $item->status_absen }}
                                </span>
                            </td>
                            <td class="text-center">
                                @if($item->photo_absen)
                                    <img src="data:image/jpeg;base64,{{ base64_encode($item->photo_absen) }}"
                                         alt="Foto Absen" class="img-thumbnail" width="100">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mt-3">
        ← Kembali
    </a>
</div>
@endsection
