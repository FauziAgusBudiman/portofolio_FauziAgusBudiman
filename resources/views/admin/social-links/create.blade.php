@extends('layouts.admin')

@section('title', 'Tambah Media Sosial')
@section('page_title', 'Tambah Tautan Media Sosial')

@section('content')

<div class="row">
    <div class="col-xl-6">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Formulir Media Sosial Baru</h3>
                <a href="{{ route('admin.social-links.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.social-links.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="platform" class="admin-form-label">Nama Platform *</label>
                    <input type="text" id="platform" name="platform" class="admin-input" placeholder="Contoh: GitHub / LinkedIn / WhatsApp" value="{{ old('platform') }}" required>
                </div>

                <div class="mb-3">
                    <label for="label" class="admin-form-label">Label Teks Tampilan *</label>
                    <input type="text" id="label" name="label" class="admin-input" placeholder="Contoh: github.com/username / +62 812-..." value="{{ old('label') }}" required>
                </div>

                <div class="mb-3">
                    <label for="url" class="admin-form-label">URL Tautan Lengkap *</label>
                    <input type="text" id="url" name="url" class="admin-input" placeholder="https://github.com/... atau mailto:..." value="{{ old('url') }}" required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="icon" class="admin-form-label">Nama Icon (Bootstrap Icons)</label>
                        <input type="text" id="icon" name="icon" class="admin-input" placeholder="bi-github / bi-linkedin" value="{{ old('icon') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="sort_order" class="admin-form-label">Urutan Tampilan</label>
                        <input type="number" id="sort_order" name="sort_order" class="admin-input" value="{{ old('sort_order', 1) }}">
                    </div>
                </div>

                <div class="mb-4 form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                    <label class="form-check-label text-white small" for="is_active">
                        Status Aktif (Tampilkan di halaman publik)
                    </label>
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Media Sosial
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
