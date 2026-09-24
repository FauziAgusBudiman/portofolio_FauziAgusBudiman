@extends('layouts.admin')

@section('title', 'Kelola Proyek')
@section('page_title', 'Daftar Proyek Portfolio')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="h6 fw-bold text-white mb-1">Semua Proyek Aplikasi</h3>
            <p class="text-muted small mb-0">Kelola portofolio aplikasi web, teknologi yang digunakan, serta tautan repositori.</p>
        </div>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-info text-dark fw-bold btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Proyek Baru
        </a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Urutan</th>
                    <th>Judul Proyek</th>
                    <th>Kategori</th>
                    <th>Teknologi</th>
                    <th>Unggulan</th>
                    <th style="width: 150px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $proj)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $proj->sort_order }}</td>
                        <td>
                            <div class="fw-semibold text-white">{{ $proj->title }}</div>
                            <span class="text-muted" style="font-size: 0.75rem;">/projects/{{ $proj->slug }}</span>
                        </td>
                        <td><span class="badge bg-secondary">{{ $proj->category }}</span></td>
                        <td>
                            <div class="d-flex flex-wrap gap-1" style="max-width: 250px;">
                                @foreach($proj->tech_array as $t)
                                    <span class="badge bg-dark border border-secondary text-info py-1 px-2" style="font-size: 0.72rem;">{{ $t }}</span>
                                @endforeach
                            </div>
                        </td>
                        <td>
                            @if($proj->is_featured)
                                <span class="badge bg-success bg-opacity-25 text-success">Ya</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-25 text-muted">Tidak</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('portfolio.project.show', $proj->slug) }}" target="_blank" class="btn btn-sm btn-outline-light" title="Pratinjau Publik">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.projects.edit', $proj->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.projects.destroy', $proj->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $proj->title }}')">
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
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada proyek yang ditambahkan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
