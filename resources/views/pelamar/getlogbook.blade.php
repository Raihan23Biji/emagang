@extends('template.master')

@section('contents')
<div class="blog-page area-padding">
<div class="container">        <div class="card mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Daftar Logbook</h4>
        
        {{-- Tombol tambah hanya muncul jika user bukan admin --}}
        @if(Auth::user()->role !== 'admin')
            <a href="{{ route('logbook.create') }}" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Logbook
            </a>
        @endif
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                @if(Auth::user()->role === 'admin')
                    <th>Nama User</th>
                @endif
                <th>Kegiatan</th>
                <th>Waktu Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logbooks as $logbook)
                <tr>
                    @if(Auth::user()->role === 'admin')
                        <td>{{ $logbook->user->name ?? 'Tidak diketahui' }}</td>
                    @endif
                    <td>{{ $logbook->kegiatan }}</td>
                    <td>{{ $logbook->created_at->format('d-m-Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="{{ Auth::user()->role === 'admin' ? '3' : '2' }}">
                        Tidak ada data logbook.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div></div></div>
@endsection
