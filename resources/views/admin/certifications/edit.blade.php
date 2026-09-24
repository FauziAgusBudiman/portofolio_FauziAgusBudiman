@extends('layouts.admin')

@section('title', 'Edit Sertifikasi')
@section('page_title', 'Perbarui Data Sertifikasi')

@section('content')

<div class="row">
    <div class="col-xl-7">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Ubah Data Sertifikasi</h3>
                <a href="{{ route('admin.certifications.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.certifications.update', $certification->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="admin-form-label">Nama Sertifikasi *</label>
                    <input type="text" id="title" name="title" class="admin-input" value="{{ old('title', $certification->title) }}" required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-7">
                        <label for="issuer" class="admin-form-label">Penerbit / Lembaga</label>
                        <input type="text" id="issuer" name="issuer" class="admin-input" value="{{ old('issuer', $certification->issuer) }}">
                    </div>

                    <div class="col-md-5">
                        <label for="issue_date" class="admin-form-label">Waktu / Tanggal</label>
                        <input type="text" id="issue_date" name="issue_date" class="admin-input" value="{{ old('issue_date', $certification->issue_date) }}">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-7">
                        <label for="score_or_credential" class="admin-form-label">Skor / Nomor Kredensial</label>
                        <input type="text" id="score_or_credential" name="score_or_credential" class="admin-input" value="{{ old('score_or_credential', $certification->score_or_credential) }}">
                    </div>

                    <div class="col-md-5">
                        <label for="sort_order" class="admin-form-label">Urutan Tampilan</label>
                        <input type="number" id="sort_order" name="sort_order" class="admin-input" value="{{ old('sort_order', $certification->sort_order) }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="credential_url" class="admin-form-label">Tautan Verifikasi Online (Opsional)</label>
                    <input type="url" id="credential_url" name="credential_url" class="admin-input" value="{{ old('credential_url', $certification->credential_url) }}">
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-save me-1"></i> Perbarui Sertifikasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
