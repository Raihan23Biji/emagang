<!-- resources/views/logbooks/create.blade.php -->
@extends('template.master')
@section('contents')

<div class="blog-page area-padding">
<div class="container">        <div class="card mt-5">
    <h3>Tambah Logbook</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('logbook.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="kegiatan" class="form-label">Kegiatan</label>
            <textarea name="kegiatan" class="form-control" rows="5" required>{{ old('kegiatan') }}</textarea>
            @error('kegiatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>
@endsection
