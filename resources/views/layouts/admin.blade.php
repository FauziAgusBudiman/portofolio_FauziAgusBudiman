<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Fauzi Agus Budiman</title>
    
    <!-- Google Fonts & Bootstrap 5 & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Admin Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    
    @stack('styles')
</head>
<body class="admin-body">
    <div class="admin-wrapper">
        <!-- Sidebar Navigation -->
        <aside class="admin-sidebar" id="adminSidebar">
            <div class="sidebar-header">
                <div class="rounded-3 bg-info bg-opacity-25 text-info p-2 d-flex align-items-center justify-content-center" style="width: 38px; height: 38px;">
                    <i class="bi bi-shield-lock-fill fs-5"></i>
                </div>
                <div>
                    <div class="fw-bold text-white small">Portfolio Admin</div>
                    <div class="text-muted" style="font-size: 0.75rem;">Fauzi Agus Budiman</div>
                </div>
            </div>

            <ul class="sidebar-menu">
                <li class="sidebar-item">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.profile.index') }}" class="sidebar-link {{ request()->routeIs('admin.profile.*') ? 'active' : '' }}">
                        <i class="bi bi-person-circle"></i> Profil Pribadi
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.experiences.index') }}" class="sidebar-link {{ request()->routeIs('admin.experiences.*') ? 'active' : '' }}">
                        <i class="bi bi-briefcase"></i> Pengalaman
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                        <i class="bi bi-layers"></i> Kelola Proyek
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.skills.index') }}" class="sidebar-link {{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">
                        <i class="bi bi-lightning-charge"></i> Keahlian (Skills)
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.education.index') }}" class="sidebar-link {{ request()->routeIs('admin.education.*') ? 'active' : '' }}">
                        <i class="bi bi-mortarboard"></i> Pendidikan
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.certifications.index') }}" class="sidebar-link {{ request()->routeIs('admin.certifications.*') ? 'active' : '' }}">
                        <i class="bi bi-patch-check"></i> Sertifikasi
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.social-links.index') }}" class="sidebar-link {{ request()->routeIs('admin.social-links.*') ? 'active' : '' }}">
                        <i class="bi bi-link-45deg"></i> Media Sosial
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('admin.messages.index') }}" class="sidebar-link {{ request()->routeIs('admin.messages.*') ? 'active' : '' }}">
                        <i class="bi bi-envelope"></i> Pesan Masuk
                        @php
                            $unreadCount = \App\Models\ContactMessage::where('is_read', false)->count();
                        @endphp
                        @if($unreadCount > 0)
                            <span class="badge bg-danger rounded-pill ms-auto">{{ $unreadCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>

            <div class="p-3 border-top border-secondary border-opacity-25 mt-auto">
                <a href="{{ route('portfolio.home') }}" target="_blank" class="btn btn-outline-info w-100 btn-sm mb-2">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Buka Website
                </a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger w-100 btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Workspace -->
        <div class="admin-main">
            <!-- Topbar -->
            <header class="admin-topbar">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-outline-secondary d-lg-none btn-sm" id="sidebarToggle">
                        <i class="bi bi-list fs-5"></i>
                    </button>
                    <h2 class="h5 mb-0 text-white fw-bold">@yield('page_title', 'Dashboard')</h2>
                </div>

                <div class="d-flex align-items-center gap-3">
                    <span class="text-secondary small d-none d-sm-inline">
                        <i class="bi bi-person-check text-info"></i> Logged in as <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>
                    </span>
                    <a href="{{ route('portfolio.home') }}" target="_blank" class="btn btn-sm btn-info text-dark fw-semibold">
                        <i class="bi bi-eye"></i> Live Site
                    </a>
                </div>
            </header>

            <!-- Main Body Content -->
            <div class="admin-content">
                <!-- Flash Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
                        <i class="bi bi-check-circle-fill fs-5"></i>
                        <div>{{ session('success') }}</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <div class="fw-bold mb-1"><i class="bi bi-exclamation-triangle-fill"></i> Terdapat kesalahan pada input form:</div>
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $err)
                                <li>{{ $err }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sidebar toggle for mobile
        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.getElementById('adminSidebar');
        if (sidebarToggle && adminSidebar) {
            sidebarToggle.addEventListener('click', () => {
                adminSidebar.classList.toggle('show');
            });
        }

        // Delete confirmation helper
        function confirmDelete(event, itemName) {
            if (!confirm(`Apakah Anda yakin ingin menghapus "${itemName}"? Tindakan ini tidak dapat dibatalkan.`)) {
                event.preventDefault();
                return false;
            }
            return true;
        }
    </script>
    @stack('scripts')
</body>
</html>
