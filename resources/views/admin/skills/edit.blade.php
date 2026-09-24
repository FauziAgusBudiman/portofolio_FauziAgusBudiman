@extends('layouts.admin')

@section('title', 'Edit Skill')
@section('page_title', 'Perbarui Keahlian')

@section('content')

<div class="row">
    <div class="col-xl-6">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Ubah Data Keahlian</h3>
                <a href="{{ route('admin.skills.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.skills.update', $skill->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="admin-form-label">Nama Keahlian *</label>
                    <input type="text" id="name" name="name" class="admin-input" value="{{ old('name', $skill->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="category" class="admin-form-label">Kategori *</label>
                    <select id="category" name="category" class="admin-select" required>
                        <option value="Technical Skills" {{ old('category', $skill->category) == 'Technical Skills' ? 'selected' : '' }}>Technical Skills</option>
                        <option value="Soft Skills" {{ old('category', $skill->category) == 'Soft Skills' ? 'selected' : '' }}>Soft Skills</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="familiarity_level" class="admin-form-label">Tingkat Pemahaman / Deskripsi</label>
                    <input type="text" id="familiarity_level" name="familiarity_level" class="admin-input" value="{{ old('familiarity_level', $skill->familiarity_level) }}">
                    <small class="text-muted">Gunakan konsep "Terbiasa menggunakan" atau "Familiar with" (hindari kata "mahir").</small>
                </div>

                <div class="mb-4">
                    <label for="sort_order" class="admin-form-label">Urutan Tampilan</label>
                    <input type="number" id="sort_order" name="sort_order" class="admin-input" style="max-width: 150px;" value="{{ old('sort_order', $skill->sort_order) }}">
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-save me-1"></i> Perbarui Skill
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
