@extends('layouts.admin')

@section('title', 'Tambah Sertifikasi')
@section('page_title', 'Tambah Sertifikasi Baru')

@section('content')

<div class="row">
    <div class="col-xl-7">
        <div class="admin-card">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="h6 fw-bold text-white mb-0">Formulir Sertifikasi Baru</h3>
                <a href="{{ route('admin.certifications.index') }}" class="btn btn-sm btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>
            </div>

            <form action="{{ route('admin.certifications.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="admin-form-label">Nama Sertifikasi *</label>
                    <input type="text" id="title" name="title" class="admin-input" placeholder="Contoh: TOEFL ITP / Intro to Data Analytics" value="{{ old('title') }}" required>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-7">
                        <label for="issuer" class="admin-form-label">Penerbit / Lembaga Penyelenggara</label>
                        <input type="text" id="issuer" name="issuer" class="admin-input" placeholder="ETS / RevoU / MathWorks" value="{{ old('issuer') }}">
                    </div>

                    <div class="col-md-5">
                        <label for="issue_date" class="admin-form-label">Waktu / Tanggal</label>
                        <input type="text" id="issue_date" name="issue_date" class="admin-input" placeholder="February 2026" value="{{ old('issue_date') }}">
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-7">
                        <label for="score_or_credential" class="admin-form-label">Skor / Nomor Kredensial</label>
                        <input type="text" id="score_or_credential" name="score_or_credential" class="admin-input" placeholder="Score 513 / Verified Certificate" value="{{ old('score_or_credential') }}">
                    </div>

                    <div class="col-md-5">
                        <label for="sort_order" class="admin-form-label">Urutan Tampilan</label>
                        <input type="number" id="sort_order" name="sort_order" class="admin-input" value="{{ old('sort_order', 1) }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="credential_url" class="admin-form-label">Tautan Verifikasi Online (Opsional)</label>
                    <input type="url" id="credential_url" name="credential_url" class="admin-input" placeholder="https://..." value="{{ old('credential_url') }}">
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-plus-circle me-1"></i> Simpan Sertifikasi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
