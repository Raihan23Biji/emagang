@extends('template_admin.master')

@section('contents')
<div class="container mt-4">
    <h3>Lembar Penilaian Magang</h3>

    {{-- <form action="{{ route('magang.nilai.simpan') }}" method="POST"> --}}
        {{-- <form action="" method="POST"> --}}
            <form action="{{ route('magang.nilai.simpan', $user->id) }}" method="POST">

        @csrf
        <div class="mb-3">
            <label>Nama Mahasiswa</label>
            <input type="text" name="nama_mahasiswa" class="form-control" value="{{ $user->name }}" readonly>
        </div>
        
        <div class="mb-3">
            <label>Nomor Induk Mahasiswa</label>
            <input type="text" name="nim" class="form-control" value="{{ $user->id }}" readonly>
        </div>
        
        <div class="mb-3">
            <label>Program Studi</label>
            <input type="text" name="prodi" class="form-control" value="{{ $pendaftaran->prodi }}" readonly>
        </div>
        
        <div class="mb-3">
            <label>Asal Instansi Pendidikan</label>
            <input type="text" name="asal_instansi" class="form-control" value="{{ $pendaftaran->universitas }}" readonly>
        </div>
        
        <div class="mb-3">
            <label>Instansi PKL/Magang</label>
            <input type="text" name="instansi_magang" class="form-control" value="Nama Instansi Anda" required>
        </div>
        

        <hr>

        <h5 class="mt-4">Nilai Aspek Penilaian</h5>

        @php
            $aspek = [
                'Kepribadian',
                'Penguasaan materi pekerjaan',
                'Kedisiplinan',
                'Kreativitas',
                'Kerja sama tim',
                'Tanggung jawab',
            ];
        @endphp

        @foreach($aspek as $index => $item)
        <div class="mb-3 row">
            <label class="col-md-6 col-form-label">{{ $index+1 }}. {{ $item }}</label>
            <div class="col-md-3">
                <input type="number" name="nilai[{{ $index }}][angka]" class="form-control" min="0" max="100" required>
            </div>
          
        </div>
        @endforeach

        <button type="submit" class="btn btn-primary mt-3">Simpan Nilai</button>
    </form>
</div>
@endsection
