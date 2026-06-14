<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portofolio Arib</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .link-rahasia:hover{
            color: #212529 !important;
            cursor: default;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/projects">Web Portofolio Arib</a>

            <div class="navbar-nav ms-auto">
                @guest
                    <a class="nav-link link-rahasia" href="/login" style="color: #212529 !important; text-decoration: none;">Login</a>
                @endguest
                @auth
                    <form action="/logout" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-link nav-link m-0 p-0 text-decoration-none" style="display: inline; cursor: pointer;">Logout</button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer id="kontak" class="bg-dark text-white text-center py-5 mt-5">
        <div class="container">
            <h4 class="fw-bold">Tertarik untuk Bekerja Sama?</h4>
            <p class="text-secondary mb-4">Jangan ragu untuk menghubungi saya jika Anda memiliki proyek menarik atau tawaran pekerjaan.</p>

            <div class="d-flex justify-content-center gap-3 mb-4">
                <a href="mailto:m.norarib2003@gmail.com" class="btn btn-outline-light">Email</a>
                <a href="https://wa.me/6287749105675" target="_blank" class="btn btn-outline-light">WhatsApp</a>
                <a href="https://github.com/1D4T3" target="_blank" class="btn btn-outline-light">GitHub</a>
            </div>

            <hr class="border-secondary">
            <p class="mb-0 text-secondary" style="font-size: 0.9rem;">
                &copy; {{ date('Y') }} Portofolio Arib. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>
