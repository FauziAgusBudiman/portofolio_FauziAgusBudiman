@extends('layouts.admin')

@section('title', 'Profil Pribadi')
@section('page_title', 'Kelola Profil & Identitas')

@section('content')

<div class="row">
    <div class="col-xl-9">
        <div class="admin-card">
            <h3 class="h6 fw-bold text-white mb-4">
                <i class="bi bi-person-lines-fill text-info me-2"></i> Pengaturan Informasi Profil
            </h3>

            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Basic Info -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="full_name" class="admin-form-label">Nama Lengkap *</label>
                        <input type="text" id="full_name" name="full_name" class="admin-input" value="{{ old('full_name', $profile->full_name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="headline" class="admin-form-label">Headline / Title *</label>
                        <input type="text" id="headline" name="headline" class="admin-input" value="{{ old('headline', $profile->headline) }}" placeholder="Contoh: Fresh Graduate S1 Teknik Informatika" required>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label for="sub_headline" class="admin-form-label">Sub Headline / Universitas</label>
                        <input type="text" id="sub_headline" name="sub_headline" class="admin-input" value="{{ old('sub_headline', $profile->sub_headline) }}" placeholder="Contoh: Universitas Suryakancana, Cianjur">
                    </div>

                    <div class="col-md-6">
                        <label for="location" class="admin-form-label">Domisili / Lokasi</label>
                        <input type="text" id="location" name="location" class="admin-input" value="{{ old('location', $profile->location) }}" placeholder="Contoh: Cianjur, Jawa Barat">
                    </div>
                </div>

                <!-- Bio & Narrative -->
                <div class="mb-3">
                    <label for="bio" class="admin-form-label">Deskripsi Singkat (Hero Section)</label>
                    <textarea id="bio" name="bio" rows="3" class="admin-textarea">{{ old('bio', $profile->bio) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="about_text" class="admin-form-label">Narasi Lengkap (About Me Section)</label>
                    <textarea id="about_text" name="about_text" rows="6" class="admin-textarea">{{ old('about_text', $profile->about_text) }}</textarea>
                </div>

                <!-- Contact & Availability -->
                <h4 class="h6 fw-bold text-white mb-3 pt-3 border-top border-secondary border-opacity-25">
                    Kontak & Status Ketersediaan
                </h4>

                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label for="email" class="admin-form-label">Email Kontak</label>
                        <input type="email" id="email" name="email" class="admin-input" value="{{ old('email', $profile->email) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="phone" class="admin-form-label">Nomor Telepon</label>
                        <input type="text" id="phone" name="phone" class="admin-input" value="{{ old('phone', $profile->phone) }}">
                    </div>

                    <div class="col-md-4">
                        <label for="whatsapp" class="admin-form-label">WhatsApp</label>
                        <input type="text" id="whatsapp" name="whatsapp" class="admin-input" value="{{ old('whatsapp', $profile->whatsapp) }}">
                    </div>
                </div>

                <div class="mb-4 form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="is_available" name="is_available" value="1" {{ old('is_available', $profile->is_available) ? 'checked' : '' }}>
                    <label class="form-check-label text-white small" for="is_available">
                        Tampilkan badge status <strong>"Open to Work / Available for Opportunities"</strong> pada Hero
                    </label>
                </div>

                <!-- Media Uploads (Avatar & CV) -->
                <h4 class="h6 fw-bold text-white mb-3 pt-3 border-top border-secondary border-opacity-25">
                    Foto Profil & Berkas CV
                </h4>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="admin-form-label">Foto Profil (Avatar)</label>
                        @if($profile->avatar)
                            <div class="mb-2">
                                <img src="{{ asset($profile->avatar) }}" alt="Avatar" class="rounded-3" style="width: 80px; height: 80px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="avatar_file" class="admin-input">
                        <small class="text-muted">Mendukung format: JPG, PNG, WEBP, SVG (Maks. 2MB)</small>
                    </div>

                    <div class="col-md-6">
                        <label class="admin-form-label">Berkas CV (PDF)</label>
                        @if($profile->cv_file && $profile->cv_file !== '#')
                            <div class="mb-2">
                                <a href="{{ asset($profile->cv_file) }}" target="_blank" class="btn btn-sm btn-outline-info">
                                    <i class="bi bi-file-earmark-pdf"></i> Lihat CV Saat Ini
                                </a>
                            </div>
                        @endif
                        <input type="file" name="cv_file_upload" class="admin-input mb-2">
                        <input type="text" name="cv_file_link" class="admin-input" placeholder="Atau paste link Google Drive / external CV" value="{{ old('cv_file_link', $profile->cv_file) }}">
                        <small class="text-muted">Format berkas: PDF atau Link URL dokumen</small>
                    </div>
                </div>

                <div class="text-end pt-3 border-top border-secondary border-opacity-25">
                    <button type="submit" class="btn btn-info text-dark fw-bold px-4 py-2">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
