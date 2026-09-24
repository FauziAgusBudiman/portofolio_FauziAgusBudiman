@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Ringkasan Dashboard')

@section('content')

<!-- Stat Cards Grid -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-info bg-opacity-10 text-info">
                <i class="bi bi-layers-fill"></i>
            </div>
            <div>
                <div class="stat-val">{{ $stats['total_projects'] }}</div>
                <div class="stat-title">Total Proyek</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                <i class="bi bi-briefcase-fill"></i>
            </div>
            <div>
                <div class="stat-val">{{ $stats['total_experiences'] }}</div>
                <div class="stat-title">Pengalaman Kerja</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                <i class="bi bi-lightning-charge-fill"></i>
            </div>
            <div>
                <div class="stat-val">{{ $stats['total_skills'] }}</div>
                <div class="stat-title">Total Keahlian</div>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                <i class="bi bi-envelope-fill"></i>
            </div>
            <div>
                <div class="stat-val">{{ $stats['unread_messages'] }}</div>
                <div class="stat-title">Pesan Belum Dibaca</div>
            </div>
        </div>
    </div>
</div>

<!-- Main Row: Recent Projects & Messages -->
<div class="row g-4">
    <!-- Recent Projects -->
    <div class="col-lg-7">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="h6 fw-bold text-white mb-0">
                    <i class="bi bi-layers text-info me-2"></i> Proyek Portfolio Aktif
                </h3>
                <a href="{{ route('admin.projects.create') }}" class="btn btn-sm btn-info text-dark fw-semibold">
                    <i class="bi bi-plus-lg"></i> Tambah Proyek
                </a>
            </div>

            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Judul Proyek</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($recentProjects as $proj)
                            <tr>
                                <td class="fw-semibold text-white">{{ $proj->title }}</td>
                                <td><span class="badge bg-secondary">{{ $proj->category }}</span></td>
                                <td>
                                    @if($proj->is_featured)
                                        <span class="badge bg-success bg-opacity-25 text-success">Unggulan</span>
                                    @else
                                        <span class="badge bg-secondary bg-opacity-25 text-muted">Standar</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.projects.edit', $proj->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-3">Belum ada proyek ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Messages -->
    <div class="col-lg-5">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h3 class="h6 fw-bold text-white mb-0">
                    <i class="bi bi-chat-left-dots text-danger me-2"></i> Pesan Masuk Terbaru
                </h3>
                <a href="{{ route('admin.messages.index') }}" class="text-info small text-decoration-none">
                    Lihat Semua
                </a>
            </div>

            @forelse($recentMessages as $msg)
                <div class="p-3 mb-2 rounded-3" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                    <div class="d-flex justify-content-between align-items-start mb-1">
                        <span class="fw-semibold text-white small">{{ $msg->name }}</span>
                        <span class="text-muted" style="font-size: 0.72rem;">{{ $msg->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text-secondary small mb-2 text-truncate">{{ $msg->subject ?? 'Tanpa Subjek' }}</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge {{ $msg->is_read ? 'bg-secondary' : 'bg-danger' }}" style="font-size: 0.7rem;">
                            {{ $msg->is_read ? 'Dibaca' : 'Baru' }}
                        </span>
                        <a href="{{ route('admin.messages.show', $msg->id) }}" class="btn btn-sm btn-outline-light py-0 px-2" style="font-size: 0.75rem;">
                            Buka
                        </a>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-4 small">
                    <i class="bi bi-inbox fs-3 d-block mb-1"></i>
                    Belum ada pesan masuk.
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
