@extends('layouts.admin')

@section('title', 'Kelola Pendidikan')
@section('page_title', 'Riwayat Pendidikan Formal')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="h6 fw-bold text-white mb-1">Daftar Pendidikan Formal</h3>
            <p class="text-muted small mb-0">Informasi perguruan tinggi, jenjang sarjana (S1), dan program studi.</p>
        </div>
        <a href="{{ route('admin.education.create') }}" class="btn btn-info text-dark fw-bold btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Pendidikan
        </a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Urutan</th>
                    <th>Institusi / Universitas</th>
                    <th>Jenjang & Program Studi</th>
                    <th>Periode</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($educations as $edu)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $edu->sort_order }}</td>
                        <td class="fw-semibold text-white">{{ $edu->institution }}</td>
                        <td>
                            <span class="text-info fw-semibold">{{ $edu->degree }}</span>
                            @if($edu->field_of_study)
                                <div class="text-muted small">{{ $edu->field_of_study }}</div>
                            @endif
                        </td>
                        <td>{{ $edu->period ?? '-' }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.education.edit', $edu->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.education.destroy', $edu->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $edu->institution }}')">
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
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada data pendidikan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
