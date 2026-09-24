@extends('layouts.admin')

@section('title', 'Tambah Proyek')
@section('page_title', 'Tambah Proyek Baru')

@section('content')

<div class="row">
    <div class="col-xl-9">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Formulir Proyek Baru</h3>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3 mb-3">
                    <div class="col-md-8">
                        <label for="title" class="admin-form-label">Judul Proyek *</label>
                        <input type="text" id="title" name="title" class="admin-input" placeholder="Contoh: Sistem Informasi Perpustakaan" value="{{ old('title') }}" required>
                    </div>

                    <div class="col-md-4">
                        <label for="category" class="admin-form-label">Kategori Proyek *</label>
                        <input type="text" id="category" name="category" class="admin-input" placeholder="Web Application / Expert System" value="{{ old('category', 'Web Application') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="admin-form-label">Deskripsi Lengkap Proyek *</label>
                    <textarea id="description" name="description" rows="4" class="admin-textarea" placeholder="Jelaskan tujuan sistem, latar belakang, dan hasil implementasi..." required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="technologies" class="admin-form-label">Teknologi yang Digunakan (Pisahkan dengan koma) *</label>
                    <input type="text" id="technologies" name="technologies" class="admin-input" placeholder="Contoh: Laravel, MySQL, Bootstrap, JavaScript" value="{{ old('technologies') }}" required>
                </div>

                <div class="mb-3">
                    <label for="features" class="admin-form-label">Fitur-Fitur Utama (Satu baris per fitur)</label>
                    <textarea id="features" name="features" rows="5" class="admin-textarea" placeholder="Authentication & Role-based Access&#10;User Management&#10;Book Management...">{{ old('features') }}</textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="github_url" class="admin-form-label">Tautan GitHub (Source Code)</label>
                        <input type="url" id="github_url" name="github_url" class="admin-input" placeholder="https://github.com/..." value="{{ old('github_url') }}">
                    </div>

                    <div class="col-md-6">
                        <label for="demo_url" class="admin-form-label">Tautan Demo / Live Website</label>
                        <input type="url" id="demo_url" name="demo_url" class="admin-input" placeholder="https://..." value="{{ old('demo_url') }}">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="admin-form-label">Unggah Gambar / Thumbnail Proyek</label>
                        <input type="file" name="image_file" class="admin-input">
                        <small class="text-muted">Mendukung file: JPG, PNG, WEBP (Maks. 3MB)</small>
                    </div>

                    <div class="col-md-6">
                        <label for="sort_order" class="admin-form-label">Urutan Tampilan</label>
                        <input type="number" id="sort_order" name="sort_order" class="admin-input" value="{{ old('sort_order', 1) }}">
                    </div>
                </div>

                <div class="mb-4 form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" checked>
                    <label class="form-check-label text-white small" for="is_featured">
                        Tandai sebagai <strong>Proyek Pilihan / Unggulan</strong>
                    </label>
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Proyek
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
