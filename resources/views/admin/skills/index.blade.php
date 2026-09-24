@extends('layouts.admin')

@section('title', 'Kelola Keahlian')
@section('page_title', 'Kelola Daftar Keahlian (Skills)')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="h6 fw-bold text-white mb-1">Daftar Keahlian Teknis & Karakter Kerja</h3>
        <p class="text-muted small mb-0">Semua keterampilan menggunakan konsep deskripsi "Terbiasa menggunakan" atau "Familiar with".</p>
    </div>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-info text-dark fw-bold btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Tambah Skill Baru
    </a>
</div>

<div class="row g-4">
    <!-- Technical Skills Column -->
    <div class="col-lg-6">
        <div class="admin-card">
            <h4 class="h6 fw-bold text-info mb-3 d-flex align-items-center gap-2">
                <i class="bi bi-cpu-fill"></i> Technical Skills ({{ $technicalSkills->count() }})
            </h4>

            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th style="width: 40px;">#</th>
                            <th>Nama Keahlian</th>
                            <th>Familiaritas</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($technicalSkills as $skill)
                            <tr>
                                <td class="text-muted small">{{ $skill->sort_order }}</td>
                                <td class="fw-semibold text-white">{{ $skill->name }}</td>
                                <td><span class="badge bg-secondary" style="font-size: 0.72rem;">{{ $skill->familiarity_level ?? 'Terbiasa' }}</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $skill->name }}')">
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
                                <td colspan="4" class="text-center text-muted py-3">Belum ada technical skill.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Soft Skills Column -->
    <div class="col-lg-6">
        <div class="admin-card">
            <h4 class="h6 fw-bold text-primary mb-3 d-flex align-items-center gap-2">
                <i class="bi bi-people-fill"></i> Soft Skills & Karakter ({{ $softSkills->count() }})
            </h4>

            <div class="table-responsive">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th style="width: 40px;">#</th>
                            <th>Nama Karakter</th>
                            <th>Familiaritas</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($softSkills as $skill)
                            <tr>
                                <td class="text-muted small">{{ $skill->sort_order }}</td>
                                <td class="fw-semibold text-white">{{ $skill->name }}</td>
                                <td><span class="badge bg-secondary" style="font-size: 0.72rem;">{{ $skill->familiarity_level ?? 'Familiar' }}</span></td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.skills.edit', $skill->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.skills.destroy', $skill->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $skill->name }}')">
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
                                <td colspan="4" class="text-center text-muted py-3">Belum ada soft skill.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
