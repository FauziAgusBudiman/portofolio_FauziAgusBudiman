@extends('layouts.admin')

@section('title', 'Edit Proyek')
@section('page_title', 'Perbarui Proyek')

@section('content')

<div class="row">
    <div class="col-xl-9">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Ubah Data Proyek</h3>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="title" class="admin-form-label">Judul Proyek *</label>
                        <input type="text" id="title" name="title" class="admin-input" value="{{ old('title', $project->title) }}" required>
                    </div>

                    <div class="col-md-3">
                        <label for="slug" class="admin-form-label">Slug URL *</label>
                        <input type="text" id="slug" name="slug" class="admin-input" value="{{ old('slug', $project->slug) }}" required>
                    </div>

                    <div class="col-md-3">
                        <label for="category" class="admin-form-label">Kategori *</label>
                        <input type="text" id="category" name="category" class="admin-input" value="{{ old('category', $project->category) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="admin-form-label">Deskripsi Lengkap Proyek *</label>
                    <textarea id="description" name="description" rows="4" class="admin-textarea" required>{{ old('description', $project->description) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="technologies" class="admin-form-label">Teknologi yang Digunakan (Pisahkan dengan koma) *</label>
                    <input type="text" id="technologies" name="technologies" class="admin-input" value="{{ old('technologies', $project->technologies) }}" required>
                </div>

                <div class="mb-3">
                    <label for="features" class="admin-form-label">Fitur-Fitur Utama (Satu baris per fitur)</label>
                    <textarea id="features" name="features" rows="5" class="admin-textarea">{{ old('features', $project->features) }}</textarea>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="github_url" class="admin-form-label">Tautan GitHub (Source Code)</label>
                        <input type="url" id="github_url" name="github_url" class="admin-input" value="{{ old('github_url', $project->github_url) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="demo_url" class="admin-form-label">Tautan Demo / Live Website</label>
                        <input type="url" id="demo_url" name="demo_url" class="admin-input" value="{{ old('demo_url', $project->demo_url) }}">
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="admin-form-label">Gambar / Thumbnail Proyek</label>
                        @if($project->image)
                            <div class="mb-2">
                                <img src="{{ asset($project->image) }}" alt="Preview" class="rounded-3" style="max-height: 90px;">
                            </div>
                        @endif
                        <input type="file" name="image_file" class="admin-input">
                    </div>

                    <div class="col-md-6">
                        <label for="sort_order" class="admin-form-label">Urutan Tampilan</label>
                        <input type="number" id="sort_order" name="sort_order" class="admin-input" value="{{ old('sort_order', $project->sort_order) }}">
                    </div>
                </div>

                <div class="mb-4 form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}>
                    <label class="form-check-label text-white small" for="is_featured">
                        Tandai sebagai <strong>Proyek Pilihan / Unggulan</strong>
                    </label>
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-save me-1"></i> Perbarui Proyek
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
