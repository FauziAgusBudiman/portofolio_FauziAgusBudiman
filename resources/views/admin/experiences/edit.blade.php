@extends('layouts.admin')

@section('title', 'Edit Pengalaman')
@section('page_title', 'Perbarui Pengalaman')

@section('content')

<div class="row">
    <div class="col-xl-8">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Ubah Data Pengalaman</h3>
                <a href="{{ route('admin.experiences.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.experiences.update', $experience->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3 mb-3">
                    <div class="col-md-7">
                        <label for="company" class="admin-form-label">Instansi / Perusahaan *</label>
                        <input type="text" id="company" name="company" class="admin-input" value="{{ old('company', $experience->company) }}" required>
                    </div>

                    <div class="col-md-5">
                        <label for="type" class="admin-form-label">Tipe Pengalaman</label>
                        <input type="text" id="type" name="type" class="admin-input" value="{{ old('type', $experience->type) }}">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-7">
                        <label for="role" class="admin-form-label">Posisi / Jabatan *</label>
                        <input type="text" id="role" name="role" class="admin-input" value="{{ old('role', $experience->role) }}" required>
                    </div>

                    <div class="col-md-5">
                        <label for="period" class="admin-form-label">Periode Waktu *</label>
                        <input type="text" id="period" name="period" class="admin-input" value="{{ old('period', $experience->period) }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="admin-form-label">Deskripsi Pekerjaan & Tanggung Jawab *</label>
                    <textarea id="description" name="description" rows="5" class="admin-textarea" required>{{ old('description', $experience->description) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="sort_order" class="admin-form-label">Nomor Urutan Tampilan</label>
                    <input type="number" id="sort_order" name="sort_order" class="admin-input" style="max-width: 150px;" value="{{ old('sort_order', $experience->sort_order) }}">
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-save me-1"></i> Perbarui Pengalaman
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
