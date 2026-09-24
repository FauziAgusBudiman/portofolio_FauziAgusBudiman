@extends('layouts.public')

@section('title', $project->title . ' | Detail Proyek - Fauzi Agus Budiman')
@section('meta_description', Str::limit($project->description, 160))

@section('content')
<section class="hero-section" style="padding-top: 8rem; min-height: auto;">
    <div class="container-custom">
        <!-- Back Navigation -->
        <div class="mb-4">
            <a href="{{ route('portfolio.home') }}#projects" class="btn-glow btn-glow-secondary py-2 px-3 small">
                <i class="bi bi-arrow-left"></i> Kembali ke Portfolio
            </a>
        </div>

        <div class="glass-card p-4 p-md-5 mb-5">
            <!-- Header Badges -->
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
                <span class="section-tag mb-0">
                    <i class="bi bi-folder2-open"></i> {{ $project->category ?? 'Web Application' }}
                </span>
                <div class="d-flex gap-2">
                    @if(!empty($project->github_url))
                        <a href="{{ $project->github_url }}" target="_blank" class="btn-glow btn-glow-secondary py-2 px-3 small">
                            <i class="bi bi-github"></i> Source Code
                        </a>
                    @endif
                    @if(!empty($project->demo_url))
                        <a href="{{ $project->demo_url }}" target="_blank" class="btn-glow btn-glow-primary py-2 px-3 small">
                            <i class="bi bi-box-arrow-up-right"></i> Live Demo
                        </a>
                    @endif
                </div>
            </div>

            <!-- Title & Subtitle -->
            <h1 class="h2 fw-bold text-white mb-3">{{ $project->title }}</h1>

            <!-- Technologies -->
            <div class="d-flex flex-wrap gap-2 mb-4">
                @foreach($project->tech_array as $tech)
                    <span class="tech-pill px-3 py-1 fs-6">{{ $tech }}</span>
                @endforeach
            </div>

            <hr class="border-secondary border-opacity-25 my-4">

            <!-- Detail Grid -->
            <div class="row g-4">
                <!-- Description -->
                <div class="col-lg-7">
                    <h3 class="h5 fw-bold text-white mb-3">
                        <i class="bi bi-file-text-fill text-info me-2"></i> Deskripsi Proyek
                    </h3>
                    <p class="text-secondary leading-relaxed mb-4" style="white-space: pre-line; font-size: 1.05rem;">
                        {{ $project->description }}
                    </p>

                    <div class="glass-card p-4 bg-opacity-50">
                        <h4 class="h6 fw-bold text-white mb-3">Peran & Tanggung Jawab:</h4>
                        <ul class="text-secondary small mb-0 ps-3">
                            <li class="mb-1">Perancangan arsitektur database relasional MySQL.</li>
                            <li class="mb-1">Implementasi logika backend menggunakan framework Laravel.</li>
                            <li class="mb-1">Pengembangan antarmuka pengguna interaktif dan responsif.</li>
                            <li>Pengujian fungsionalitas fitur (QA) dan dokumentasi sistem.</li>
                        </ul>
                    </div>
                </div>

                <!-- Features & Specs -->
                <div class="col-lg-5">
                    <div class="glass-card p-4" style="background: rgba(255,255,255,0.02);">
                        <h3 class="h5 fw-bold text-white mb-3">
                            <i class="bi bi-check2-square text-info me-2"></i> Fitur-Fitur Utama
                        </h3>
                        <ul class="project-features-list mb-4">
                            @foreach($project->feature_array as $feature)
                                <li class="py-1">
                                    <i class="bi bi-check-circle-fill text-emerald me-2"></i>
                                    <span class="text-white">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <div class="pt-3 border-top border-secondary border-opacity-25">
                            <div class="d-flex justify-content-between text-secondary small mb-2">
                                <span>Status:</span>
                                <span class="text-success fw-semibold">Selesai / Teruji</span>
                            </div>
                            <div class="d-flex justify-content-between text-secondary small">
                                <span>Platform:</span>
                                <span class="text-white">Web Browser</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
