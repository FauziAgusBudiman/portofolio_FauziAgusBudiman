<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- Dynamic Title & SEO Meta -->
    <title>@yield('title', 'Fauzi Agus Budiman | Fresh Graduate S1 Teknik Informatika - Portfolio')</title>
    <meta name="description" content="@yield('meta_description', 'Portfolio profesional Fauzi Agus Budiman, Fresh Graduate S1 Teknik Informatika Universitas Suryakancana Cianjur. Pengembang Web (Laravel & MySQL), Pengolahan Data, IT Support, dan Administrasi.')">
    <meta name="keywords" content="Fauzi Agus Budiman, Portfolio, Web Developer, Laravel, MySQL, Fresh Graduate, Teknik Informatika, Universitas Suryakancana, Cianjur, IT Support, Data Processing">
    <meta name="author" content="Fauzi Agus Budiman">
    <meta name="theme-color" content="#090d16">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph / Facebook / LinkedIn -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og_title', 'Fauzi Agus Budiman - Portfolio Profesional')">
    <meta property="og:description" content="@yield('og_description', 'Fresh Graduate S1 Teknik Informatika Universitas Suryakancana. Berpengalaman dalam pengembangan sistem web Laravel & MySQL, IT Support, dan pengolahan data.')">
    <meta property="og:image" content="{{ asset('images/og-preview.png') }}">

    <!-- Google Fonts: Outfit & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Glassmorphism Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
    
    @stack('styles')
</head>
<body>

    <!-- Sticky Glassmorphism Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-custom d-flex justify-content-between align-items-center w-100">
            <a class="navbar-brand-logo" href="{{ route('portfolio.home') }}">
                <div class="logo-badge">FB</div>
                <div>
                    <span>Fauzi Agus B.</span>
                </div>
            </a>

            <!-- Mobile Hamburger Toggle -->
            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2 text-info"></i>
            </button>

            <!-- Nav Links -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarContent">
                <ul class="navbar-nav gap-lg-1 my-3 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link-custom active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#experience">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#projects">Projects</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#skills">Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#education">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#certifications">Certifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-custom" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>

            <!-- Navbar Quick Action CTA (Desktop) -->
            <div class="d-none d-lg-block">
                <a href="#contact" class="btn-glow btn-glow-outline py-2 px-3 fs-6">
                    <i class="bi bi-send-fill"></i> Get in Touch
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content Slot -->
    <main>
        @yield('content')
    </main>

    <!-- Sleek Futuristic Footer -->
    <footer class="footer-custom">
        <div class="container-custom">
            <div class="row align-items-center gy-3">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-1 fw-semibold text-white">Fauzi Agus Budiman</p>
                    <p class="mb-0 text-muted small">Fresh Graduate S1 Teknik Informatika, Universitas Suryakancana (Cianjur, Jawa Barat)</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end gap-3 mb-2">
                        <a href="https://github.com/fauziagusbudiman" target="_blank" class="text-secondary fs-5 hover-cyan" title="GitHub"><i class="bi bi-github"></i></a>
                        <a href="https://linkedin.com/in/fauziagusbudiman" target="_blank" class="text-secondary fs-5 hover-cyan" title="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="mailto:fauziagusbudiman@example.com" class="text-secondary fs-5 hover-cyan" title="Email"><i class="bi bi-envelope-fill"></i></a>
                        <a href="https://wa.me/6281234567890" target="_blank" class="text-secondary fs-5 hover-cyan" title="WhatsApp"><i class="bi bi-whatsapp"></i></a>
                    </div>
                    <p class="mb-0 text-muted small">
                        &copy; {{ date('Y') }} All rights reserved. 
                        <span class="mx-1">&bull;</span>
                        <a href="{{ route('admin.login') }}" class="text-decoration-none text-muted" title="Admin Login"><i class="bi bi-shield-lock"></i> Admin Portal</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom Portfolio Interactive JS -->
    <script src="{{ asset('js/portfolio.js') }}"></script>
    
    @stack('scripts')
</body>
</html>
