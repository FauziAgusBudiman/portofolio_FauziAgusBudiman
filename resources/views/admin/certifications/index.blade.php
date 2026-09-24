@extends('layouts.admin')

@section('title', 'Kelola Sertifikasi')
@section('page_title', 'Daftar Sertifikasi')

@section('content')

<div class="admin-card">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="h6 fw-bold text-white mb-1">Daftar Sertifikat Terverifikasi</h3>
            <p class="text-muted small mb-0">Kelola sertifikasi bahasa (TOEFL), kursus (RevoU), dan workshop teknologi (MATLAB).</p>
        </div>
        <a href="{{ route('admin.certifications.create') }}" class="btn btn-info text-dark fw-bold btn-sm">
            <i class="bi bi-plus-lg me-1"></i> Tambah Sertifikasi
        </a>
    </div>

    <div class="table-responsive">
        <table class="admin-table">
            <thead>
                <tr>
                    <th style="width: 50px;">Urutan</th>
                    <th>Nama Sertifikasi</th>
                    <th>Penerbit / Lembaga</th>
                    <th>Waktu / Tanggal</th>
                    <th>Skor / Kredensial</th>
                    <th style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($certifications as $cert)
                    <tr>
                        <td class="text-center text-muted fw-bold">{{ $cert->sort_order }}</td>
                        <td class="fw-semibold text-white">{{ $cert->title }}</td>
                        <td><span class="text-info">{{ $cert->issuer ?? '-' }}</span></td>
                        <td>{{ $cert->issue_date ?? '-' }}</td>
                        <td><span class="badge bg-secondary">{{ $cert->score_or_credential ?? 'Verified' }}</span></td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.certifications.edit', $cert->id) }}" class="btn btn-sm btn-outline-info" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.certifications.destroy', $cert->id) }}" method="POST" onsubmit="return confirmDelete(event, '{{ $cert->title }}')">
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
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data sertifikasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
