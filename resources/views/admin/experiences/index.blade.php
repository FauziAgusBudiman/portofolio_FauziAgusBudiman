@extends('layouts.admin')

@section('title', 'Kelola Pengalaman')
@section('page_title', 'Riwayat Pengalaman Kerja / Praktik')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="h6 fw-bold text-white mb-1">Daftar Pengalaman Kerja & Kegiatan</h3>
            <p class="text-muted small mb-0">Kelola riwayat kerja praktik, developer, serta kegiatan juri/evaluator.</p>
        </div>
        <a href="{{ route('admin.experiences.create') }}" class="btn btn-info text-dark fw-bold btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Pengalaman
        </a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Urutan</th>
                    <th>Instansi / Perusahaan</th>
                    <th>Posisi / Peran</th>
                    <th>Periode</th>
                    <th>Tipe</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($experiences as $exp)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $exp->sort_order }}</td>
                        <td class="fw-semibold text-white">{{ $exp->company }}</td>
                        <td><span class="text-info">{{ $exp->role }}</span></td>
                        <td>{{ $exp->period }}</td>
                        <td><span class="badge bg-secondary">{{ $exp->type ?? '-' }}</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.experiences.edit', $exp->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.experiences.destroy', $exp->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $exp->company }}')">
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
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data pengalaman.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
