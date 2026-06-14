@extends('layouts.app')

@section('content')
    <h2>Tambah Proyek Baru</h2>
    <hr>

    <form action="/projects" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul Proyek</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi Lengkap</label>
            <textarea name="description" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Kategori Proyek</label>
            <select name="category" class="form-select" required>
                <option value="" disabled selected>--Pilih Kategori--</option>
                <option value="Aplikasi Android">Aplikasi Android</option>
                <option value="Website">Website</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Gambar/Screenshot Proyek</label>
            <input type="file" name="image" class="form-control" >
        </div>

        <button type="submit" class="btn btn-success">Simpan Proyek</button>
        <a href="/projects" class="btn btn-secondary">Batal</a>
    </form>
@endsection
