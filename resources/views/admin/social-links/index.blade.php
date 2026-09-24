@extends('layouts.admin')

@section('title', 'Kelola Media Sosial')
@section('page_title', 'Tautan Media Sosial & Kontak')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="h6 fw-bold text-white mb-1">Daftar Akun Media Sosial & Kontak Publik</h3>
            <p class="text-muted small mb-0">Kelola tautan WhatsApp, LinkedIn, GitHub, dan Email yang tampil pada website.</p>
        </div>
        <a href="{{ route('admin.social-links.create') }}" class="btn btn-info text-dark fw-bold btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Media Sosial
        </a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Urutan</th>
                    <th>Platform</th>
                    <th>Label Tampilan</th>
                    <th>URL Tautan</th>
                    <th>Status</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($socialLinks as $link)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $link->sort_order }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <i class="bi {{ $link->icon ?? 'bi-link' }} text-info fs-5"></i>
                                <span class="fw-semibold text-white">{{ $link->platform }}</span>
                            </div>
                        </td>
                        <td>{{ $link->label }}</td>
                        <td>
                            <a href="{{ $link->url }}" target="_blank" class="text-info text-decoration-none small text-truncate d-inline-block" style="max-width: 250px;">
                                {{ $link->url }}
                            </a>
                        </td>
                        <td>
                            @if($link->is_active)
                                <span class="badge bg-success bg-opacity-25 text-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-25 text-muted">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.social-links.edit', $link->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.social-links.destroy', $link->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $link->platform }}')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada tautan media sosial.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
