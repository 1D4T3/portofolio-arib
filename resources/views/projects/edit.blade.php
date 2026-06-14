@extends('layouts.app')

@section('content')
    <h2>Edit Proyek</h2>
    <hr>

    <form action="/projects/{{ $project->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Judul Proyek</label>
            <input type="text" name="title" class="form-control" value="{{ $project->title }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi Lengkap</label>
            <textarea name="description" class="form-control" required>{{ $project->description }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori Proyek</label>
            <select name="category" class="form-select" required>
                <option value="Aplikasi Android" {{ $project->category == 'Aplikasi Android' ? 'selected' : '' }}>Aplikasi Android</option>
                <option value="Website" {{ $project->category == 'Website' ? 'selected' : '' }}>Website</option>
                <option value="Lainnya" {{ $project->category == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
        </div>


        <div class="mb-3">
            <label class="form-label">Gambar</label>
            <br>
            @if ($project->image)
            <img src="{{ asset('images/' . $project->image) }}" alt="Gambar Proyek" style="max-height: 150px; margin-bottom: 10px;">
            @else
            <p class="text-muted">Tidak ada gambar..</p>
            @endif

            <label class="form-label d-block">Ganti Gambar(Opsional)</label>
            <input type="file" name="image" class="form-control">
            <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar
            </small>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="/projects/{{ $project->id }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
