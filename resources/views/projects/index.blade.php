@extends('layouts.app')

@section('content')
    <div class="p-5 mb-5 bg-light rounded-3 shadow-sm border">
        <div class="container-fluid py-3 text-center">
            {{-- Kamu bisa mengganti teks di bawah ini dengan profil aslimu --}}
            <h1 class="display-5 fw-bold text-dark">Halo, Saya Arib</h1>
            <p class="col-md-8 mx-auto fs-5 text-muted">
                Selamat datang di portofolio digital saya. Saya adalah seorang developer yang senang membangun aplikasi web kreatif dan fungsional menggunakan Laravel dan PostgreSQL serta Firebase sebagai Cloud Database Server.
            </p>
            <a href="#kontak" class="btn btn-outline-dark btn-lg mt-2">Hubungi Saya</a>
        </div>
    </div>

    {{-- Bagian Daftar Proyek (Tetap Terjaga di Bawah Profil) --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Karya & Proyek Terpilih</h3>
        @auth
        <a href="/projects/create" class="btn btn-primary">Tambah Proyek</a>
        @endauth

    </div>
    <div class="row">
        {{-- Cek apa datanya ada atau kosong --}}
        @if ($projects->count() > 0)
            {{-- Melakukan looping untuk setiap data proyek di DB --}}
            @foreach ($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    {{-- Menampilkan gambar jika ada, jika tidak ada pakai gambar default --}}
                    @if ($project->image)
                    <img src="{{ asset('images/' . $project->image) }}" class="card-img-top" alt="Gambar Proyek" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="bg-secondary text-white d-flex justify-content-center align-items-center" style="height: 200px; ">
                        Tidak ada gambar
                    </div>
                    @endif
                    <div class="card-body">
                        {{-- Panggil judul dan deskripsi proyek dari DB --}}
                        <h5 class="card-title">{{ $project->title }}</h5>
                        @if ($project->category)
                        <span class="badge bg-info text-dark mb-2">{{ $project->category }}</span>
                        @endif
                        <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                    </div>
                    <div class="card-footer bg-white border-top-0">
                        <a href="/projects/{{ $project->id }}" class="btn btn-sm btn-outline-info">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach

            @else
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center text-muted">
                        Belum ada proyek yang ditambahkan.
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
