@extends('layouts.admin')

@section('title', 'Tambah Pendidikan')
@section('page_title', 'Tambah Riwayat Pendidikan')

@section('content')

<div class="row">
    <div class="col-xl-7">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Formulir Pendidikan Baru</h3>
                <a href="{{ route('admin.education.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.education.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="institution" class="admin-form-label">Institusi / Universitas *</label>
                    <input type="text" id="institution" name="institution" class="admin-input" placeholder="Contoh: Universitas Suryakancana" value="{{ old('institution') }}" required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-7">
                        <label for="degree" class="admin-form-label">Jenjang Pendidikan *</label>
                        <input type="text" id="degree" name="degree" class="admin-input" placeholder="Contoh: S1 Teknik Informatika" value="{{ old('degree') }}" required>
                    </div>

                    <div class="col-md-5">
                        <label for="field_of_study" class="admin-form-label">Program Studi</label>
                        <input type="text" id="field_of_study" name="field_of_study" class="admin-input" placeholder="Teknik Informatika" value="{{ old('field_of_study') }}">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="period" class="admin-form-label">Periode Waktu</label>
                        <input type="text" id="period" name="period" class="admin-input" placeholder="2021 - 2025 / Fresh Graduate" value="{{ old('period') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="sort_order" class="admin-form-label">Urutan Tampilan</label>
                        <input type="number" id="sort_order" name="sort_order" class="admin-input" value="{{ old('sort_order', 1) }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="description" class="admin-form-label">Deskripsi / Catatan Tambahan</label>
                    <textarea id="description" name="description" rows="4" class="admin-textarea" placeholder="Fokus pembelajaran, topik skripsi, atau pencapaian akademis...">{{ old('description') }}</textarea>
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Pendidikan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
