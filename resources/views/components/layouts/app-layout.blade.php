<!DOCTYPE html>
<html lang="th" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Title slot --}}
    <title>{{ $title ?? 'Video Game News' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
        }

        .navbar {
            background-color: rgba(18, 18, 18, 0.85);
            backdrop-filter: blur(10px);
        }

        a.footer-link {
            color: #bbb;
            text-decoration: none;
        }

        a.footer-link:hover {
            color: #fff;
        }
    </style>

    {{-- Extra head slot --}}
    {{ $head ?? '' }}
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg sticky-top border-bottom border-secondary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('news.index') }}">
                <i class="bi bi-controller"></i> Video game news
            </a>
            <div class="d-flex">
                <a href="{{ route('news.index') }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-house-door-fill"></i> Home
                </a>

                @auth
                @if(Auth::user()->role == 'admin')
                <a href="{{ route('news.manage') }}" class="btn btn-outline-primary me-2">
                    <i class="bi bi-pencil-square"></i> Edit News
                </a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
                @else
                <a href="{{ route('login') }}" class="btn btn-outline-success me-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="flex-grow-1">
        {{-- Main slot --}}
        {{ $slot }}
    </main>

    <footer class="bg-dark text-center text-lg-start text-muted mt-auto pt-4 border-top border-secondary">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white fw-bold">Video game news</h5>
                    <p>
                        เว็บไซต์รวบรวมข่าวสารวงการเกมที่สดใหม่และเจาะลึก ส่งตรงถึงมือคุณทุกวัน
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white fw-bold">เมนู</h5>
                    <ul class="list-unstyled mb-0">
                        <li><a href="{{ route('news.index') }}" class="footer-link">หน้าแรก</a></li>
                        <li><a href="#!" class="footer-link">เกี่ยวกับเรา</a></li>
                        <li><a href="#!" class="footer-link">นโยบายความเป็นส่วนตัว</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase text-white fw-bold">ติดต่อเรา</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt-fill me-2"></i> กรุงเทพมหานคร, ประเทศไทย</li>
                        <li><i class="bi bi-envelope-fill me-2"></i> contact@example.com</li>
                        <li><i class="bi bi-telephone-fill me-2"></i> +66 12 345 6789</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2568 Copyright:
            <a class="text-white" href="#">YourWebsite.com</a>
            <div class="mt-2">
                <a href="#" class="social-icon me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="social-icon me-3"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="social-icon me-3"><i class="bi bi-youtube"></i></a>
                <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>