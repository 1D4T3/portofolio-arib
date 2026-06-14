@extends('layouts.app')

@section('content')
    <div class="row">
        {{-- Lebar kartunya dibatasin --}}
        <div class="col-md-8 mx-auto">
            <div class="card shadow-sm mb-5">

                {{-- Menampilkan gambar secara utuh jika ada --}}
                @if ($project->image)
                    <img src="{{ asset('images/' . $project->image) }}" class="card-img-top" alt="Gambar Proyek" style="max-height: 500px; object-fit: cover;">
                @else
                    <div class="bg-secondary text-white d-flex justify-content-center align-items-center" style="height: 300px;">
                        Tidak Ada Gambar untuk Proyek Ini
                    </div>
                @endif

                <div class="card-body">
                    <h2 class="card-title">{{ $project->title }}</h2>
                    <hr>

                    <p class="card-text" style="white-space: pre-wrap;">{{ $project->description }}</p>
                </div>

                {{-- tombol navigasi --}}
                <div class="card-footer bg-white d-flex justify-content-between">
                    <a href="/projects" class="btn btn-secondary">Kembali</a>

                    @auth
                    <div>

                        <a href="/projects/{{ $project->id }}/edit" class="btn btn-warning me-2">Edit Proyek</a>

                        <form action="/projects/{{ $project->id }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus proyek ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus Proyek</button>
                    </div>
                    @endauth
                </div>

            </div>
        </div>
    </div>
@endsection
