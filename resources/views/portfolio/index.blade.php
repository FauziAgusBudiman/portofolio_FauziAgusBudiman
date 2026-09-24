@extends('layouts.public')

@section('title', ($profile->full_name ?? 'Fauzi Agus Budiman') . ' | ' . ($profile->headline ?? 'Fresh Graduate S1 Teknik Informatika - Portfolio'))

@section('content')

<!-- =========================================================================
     1. HOME / HERO SECTION
     ========================================================================= -->
<section id="home" class="hero-section">
    <div class="container-custom">
        <div class="hero-content">
            <!-- Left Info -->
            <div class="hero-text-block">
                @if($profile->is_available ?? true)
                    <div class="hero-status-pill">
                        <span class="pulse-dot"></span>
                        <span>Open to Work / Fresh Graduate Opportunities</span>
                    </div>
                @endif

                <h1 class="hero-title">
                    Halo, Saya <br>
                    <span class="gradient-text">{{ $profile->full_name ?? 'Fauzi Agus Budiman' }}</span>
                </h1>

                <div class="hero-subtitle">
                    <i class="bi bi-mortarboard-fill"></i>
                    <span>{{ $profile->headline ?? 'Fresh Graduate S1 Teknik Informatika' }}</span>
                </div>

                <p class="hero-description">
                    {{ $profile->bio ?? 'Lulusan S1 Teknik Informatika Universitas Suryakancana yang memiliki minat mendalam dan kompetensi dalam pengembangan sistem berbasis web, pengolahan data terstruktur, IT Support, serta tata kelola administrasi dan dokumentasi teknis yang efisien.' }}
                </p>

                <!-- Action Buttons -->
                <div class="hero-buttons">
                    <a href="#projects" class="btn-glow btn-glow-primary">
                        <i class="bi bi-code-slash"></i> View My Projects
                    </a>
                    <a href="{{ $profile->cv_file ? (str_starts_with($profile->cv_file, 'http') ? $profile->cv_file : asset($profile->cv_file)) : '#contact' }}" 
                       class="btn-glow btn-glow-secondary" 
                       {{ $profile->cv_file && $profile->cv_file !== '#' ? 'target="_blank" download' : '' }}>
                        <i class="bi bi-file-earmark-arrow-down-fill"></i> Download CV
                    </a>
                    <a href="#contact" class="btn-glow btn-glow-outline">
                        <i class="bi bi-chat-dots-fill"></i> Contact Me
                    </a>
                </div>

                <!-- Meta Badges -->
                <div class="hero-meta-badges">
                    <div class="meta-badge-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>{{ $profile->location ?? 'Cianjur, Jawa Barat' }}</span>
                    </div>
                    <div class="meta-badge-item">
                        <i class="bi bi-building"></i>
                        <span>{{ $profile->sub_headline ?? 'Universitas Suryakancana' }}</span>
                    </div>
                    <div class="meta-badge-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Web Dev & IT Support</span>
                    </div>
                </div>
            </div>

            <!-- Right Profile Avatar / Placeholder Card -->
            <div class="hero-avatar-wrapper">
                <div class="avatar-glow-bg"></div>
                <div class="avatar-frame">
                    <div class="avatar-image-inner">
                        @if(!empty($profile->avatar))
                            <img src="{{ asset($profile->avatar) }}" alt="{{ $profile->full_name }}" class="img-fluid">
                        @else
                            <!-- Sleek Customizable Avatar Placeholder -->
                            <svg class="avatar-placeholder-svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span class="avatar-tag">Fauzi Agus Budiman</span>
                            <span class="text-muted" style="font-size: 0.72rem; margin-top: 4px;">S1 Teknik Informatika</span>
                        @endif
                    </div>
                </div>

                <!-- Floating Info Chip -->
                <div class="floating-stat-card d-none d-sm-flex">
                    <div class="floating-stat-icon">
                        <i class="bi bi-patch-check-fill"></i>
                    </div>
                    <div>
                        <div class="fw-bold text-white small">Fresh Graduate</div>
                        <div class="text-muted" style="font-size: 0.75rem;">Siap Kerja & Cepat Belajar</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     2. ABOUT SECTION
     ========================================================================= -->
<section id="about" class="about-section">
    <div class="container-custom">
        <div class="section-header">
            <span class="section-tag"><i class="bi bi-person-badge"></i> About Me</span>
            <h2 class="section-title">Profil & <span class="gradient-text">Kompetensi Profesional</span></h2>
            <p class="section-subtitle">
                Mengenal latar belakang akademis, keahlian analitis, dan fleksibilitas kemampuan kerja saya.
            </p>
        </div>

        <div class="about-grid">
            <!-- Left Card: Bio Narrative -->
            <div class="glass-card about-card-left">
                <div>
                    <h3 class="h4 fw-bold text-white mb-3">
                        <i class="bi bi-terminal gradient-accent me-2"></i>
                        Fresh Graduate S1 Teknik Informatika
                    </h3>
                    <p class="text-secondary leading-relaxed mb-4" style="white-space: pre-line;">
                        {{ $profile->about_text ?? "Saya merupakan fresh graduate Teknik Informatika dari Universitas Suryakancana (Cianjur, Jawa Barat) yang memiliki pengalaman dan minat mendalam dalam pengembangan sistem berbasis web, pengolahan data, IT Support, administrasi, dan dokumentasi teknis.\n\nMemiliki kemampuan analitis yang tajam, teliti dalam pengolahan data dan administrasi, serta berpengalaman membangun aplikasi web terstruktur menggunakan Laravel dan MySQL. Saya siap berkontribusi secara optimal dalam lingkungan kerja yang profesional, dinamis, dan berorientasi pada hasil." }}
                    </p>
                </div>

                <div class="pt-3 border-top border-secondary border-opacity-25">
                    <div class="row g-2 text-secondary small">
                        <div class="col-sm-6">
                            <span class="text-white fw-semibold">Pendidikan:</span> S1 Teknik Informatika
                        </div>
                        <div class="col-sm-6">
                            <span class="text-white fw-semibold">Kampus:</span> Universitas Suryakancana
                        </div>
                        <div class="col-sm-6">
                            <span class="text-white fw-semibold">Domisili:</span> Cianjur, Jawa Barat
                        </div>
                        <div class="col-sm-6">
                            <span class="text-white fw-semibold">Status:</span> Fresh Graduate
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Grid: Multi-Disciplinary Strengths -->
            <div class="about-card-right">
                <div class="capability-mini-card">
                    <div class="cap-icon"><i class="bi bi-laptop"></i></div>
                    <div class="cap-title">Web Development</div>
                    <div class="cap-desc">Membangun web app berbasis Laravel, MySQL, arsitektur MVC, Blade, dan perancangan database terintegrasi.</div>
                </div>

                <div class="capability-mini-card">
                    <div class="cap-icon"><i class="bi bi-hdd-network"></i></div>
                    <div class="cap-title">IT Support</div>
                    <div class="cap-desc">Troubleshooting perangkat keras & lunak, pemeliharaan sistem dasar, konfigurasi jaringan lokal, dan asistensi teknis.</div>
                </div>

                <div class="capability-mini-card">
                    <div class="cap-icon"><i class="bi bi-file-earmark-spreadsheet"></i></div>
                    <div class="cap-title">Data Processing</div>
                    <div class="cap-desc">Pengolahan & validasi data menggunakan Microsoft Excel & Google Sheets dengan formula logika dan rekapitulasi akurat.</div>
                </div>

                <div class="capability-mini-card">
                    <div class="cap-icon"><i class="bi bi-folder-check"></i></div>
                    <div class="cap-title">Administrasi & QA/QC</div>
                    <div class="cap-desc">Pencatatan data administrasi, pengujian fungsionalitas sistem (QA/QC dasar), serta penyusunan dokumentasi teknis yang rapi.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     3. EXPERIENCE SECTION
     ========================================================================= -->
<section id="experience" class="experience-section">
    <div class="container-custom">
        <div class="section-header">
            <span class="section-tag"><i class="bi bi-briefcase"></i> Experience</span>
            <h2 class="section-title">Riwayat <span class="gradient-text">Pengalaman & Praktik</span></h2>
            <p class="section-subtitle">
                Jejak pengalaman kerja praktik, pengembangan proyek nyata, dan keterlibatan kegiatan teknis.
            </p>
        </div>

        <div class="timeline-wrapper">
            <div class="timeline-line"></div>

            @forelse($experiences as $exp)
                <div class="timeline-item">
                    <div class="timeline-node"></div>
                    <div class="glass-card timeline-card">
                        <div class="timeline-header">
                            <div>
                                <h3 class="timeline-role">{{ $exp->role }}</h3>
                                <div class="timeline-company">{{ $exp->company }}</div>
                            </div>
                            <div class="timeline-badge">
                                <i class="bi bi-calendar3"></i>
                                <span>{{ $exp->period }}</span>
                                @if(!empty($exp->type))
                                    <span class="badge bg-primary bg-opacity-25 text-info ms-1">{{ $exp->type }}</span>
                                @endif
                            </div>
                        </div>
                        <p class="text-secondary mb-0" style="line-height: 1.7; font-size: 0.95rem;">
                            {{ $exp->description }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="text-center py-4 text-secondary">Belum ada data pengalaman yang ditampilkan.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- =========================================================================
     4. PROJECTS SECTION
     ========================================================================= -->
<section id="projects" class="projects-section">
    <div class="container-custom">
        <div class="section-header">
            <span class="section-tag"><i class="bi bi-layers-fill"></i> Portfolio</span>
            <h2 class="section-title">Proyek <span class="gradient-text">Pilihan & Implementasi</span></h2>
            <p class="section-subtitle">
                Aplikasi dan sistem nyata yang telah saya rancang dan bangun menggunakan Laravel dan teknologi terkait.
            </p>
        </div>

        <div class="projects-grid">
            @forelse($projects as $project)
                <div class="glass-card project-card">
                    <!-- Project Thumbnail / Illustration Box -->
                    <div class="project-thumb-box">
                        @if(!empty($project->image))
                            <img src="{{ asset($project->image) }}" alt="{{ $project->title }}">
                        @else
                            <div class="project-placeholder-art">
                                @if(str_contains(strtolower($project->title), 'perpustakaan'))
                                    <i class="bi bi-book"></i>
                                @elseif(str_contains(strtolower($project->title), 'inventory') || str_contains(strtolower($project->title), 'grosir'))
                                    <i class="bi bi-boxes"></i>
                                @elseif(str_contains(strtolower($project->title), 'pakar') || str_contains(strtolower($project->title), 'game'))
                                    <i class="bi bi-controller"></i>
                                @else
                                    <i class="bi bi-code-square"></i>
                                @endif
                                <span class="fw-semibold small text-secondary">Laravel + MySQL</span>
                            </div>
                        @endif
                        <span class="project-category-badge">{{ $project->category ?? 'Web Application' }}</span>
                    </div>

                    <!-- Project Content -->
                    <div class="project-body">
                        <h3 class="project-title">{{ $project->title }}</h3>
                        <p class="project-desc">{{ Str::limit($project->description, 170) }}</p>

                        <!-- Tech Stack Pills -->
                        <div class="project-tech-pills">
                            @foreach($project->tech_array as $tech)
                                <span class="tech-pill">{{ $tech }}</span>
                            @endforeach
                        </div>

                        <!-- Key Features Checklist -->
                        @if(count($project->feature_array) > 0)
                            <div class="small fw-semibold text-white mb-2">Key Features:</div>
                            <ul class="project-features-list">
                                @foreach(array_slice($project->feature_array, 0, 4) as $feat)
                                    <li><i class="bi bi-check-circle-fill"></i> {{ $feat }}</li>
                                @endforeach
                                @if(count($project->feature_array) > 4)
                                    <li class="text-muted" style="font-size: 0.78rem;">+ {{ count($project->feature_array) - 4 }} fitur lainnya</li>
                                @endif
                            </ul>
                        @endif

                        <!-- Action Buttons -->
                        <div class="project-footer-actions mt-auto">
                            <a href="{{ route('portfolio.project.show', $project->slug) }}" class="btn-glow btn-glow-outline py-2 px-3 small flex-grow-1">
                                <i class="bi bi-info-circle"></i> Detail Proyek
                            </a>
                            @if(!empty($project->github_url))
                                <a href="{{ $project->github_url }}" target="_blank" class="btn-glow btn-glow-secondary py-2 px-3 small" title="Source Code GitHub">
                                    <i class="bi bi-github"></i>
                                </a>
                            @endif
                            @if(!empty($project->demo_url))
                                <a href="{{ $project->demo_url }}" target="_blank" class="btn-glow btn-glow-primary py-2 px-3 small" title="Live Demo">
                                    <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4 text-secondary">Belum ada proyek yang ditampilkan.</div>
            @endforelse
        </div>
    </div>
</section>

<!-- =========================================================================
     5. SKILLS SECTION
     ========================================================================= -->
<section id="skills" class="skills-section">
    <div class="container-custom">
        <div class="section-header">
            <span class="section-tag"><i class="bi bi-lightning-charge-fill"></i> Skills & Expertise</span>
            <h2 class="section-title">Keahlian <span class="gradient-text">Teknis & Karakter Kerja</span></h2>
            <p class="section-subtitle">
                Daftar keterampilan yang terbiasa dan familiar saya gunakan dalam perkuliahan maupun pengembangan sistem nyata.
            </p>
        </div>

        <!-- Technical Skills Group -->
        <div class="skills-category-box">
            <div class="skills-cat-title">
                <i class="bi bi-cpu-fill fs-4"></i>
                <span>Technical Skills (Terbiasa Menggunakan)</span>
            </div>
            <div class="skills-grid">
                @foreach($technicalSkills as $skill)
                    <div class="skill-item-card">
                        <div class="skill-name">{{ $skill->name }}</div>
                        <div class="skill-familiarity">
                            <i class="bi bi-check2-circle"></i>
                            <span>{{ $skill->familiarity_level ?? 'Terbiasa menggunakan' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Soft Skills Group -->
        <div class="skills-category-box mb-0">
            <div class="skills-cat-title">
                <i class="bi bi-people-fill fs-4"></i>
                <span>Soft Skills & Karakter Kerja</span>
            </div>
            <div class="skills-grid">
                @foreach($softSkills as $skill)
                    <div class="skill-item-card" style="border-left: 3px solid var(--accent-indigo);">
                        <div class="skill-name">{{ $skill->name }}</div>
                        <div class="skill-familiarity text-muted">
                            <i class="bi bi-stars text-indigo"></i>
                            <span>{{ $skill->familiarity_level ?? 'Familiar with' }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     6 & 7. EDUCATION & CERTIFICATIONS SECTION
     ========================================================================= -->
<section id="education" class="edu-cert-section">
    <div class="container-custom">
        <div class="section-header">
            <span class="section-tag"><i class="bi bi-award-fill"></i> Academic & Credentials</span>
            <h2 class="section-title">Pendidikan & <span class="gradient-text">Sertifikasi</span></h2>
            <p class="section-subtitle">
                Latar belakang pendidikan formal S1 Teknik Informatika dan sertifikat keahlian yang telah diperoleh.
            </p>
        </div>

        <!-- Education Card -->
        @foreach($educations as $edu)
            <div class="glass-card edu-card">
                <div class="d-flex flex-wrap justify-content-between align-items-start gap-3 mb-3">
                    <div class="d-flex gap-3 align-items-center">
                        <div class="logo-badge" style="width: 50px; height: 50px; font-size: 1.4rem;">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        <div>
                            <h3 class="h4 fw-bold text-white mb-1">{{ $edu->institution }}</h3>
                            <div class="text-info fw-semibold">{{ $edu->degree }} {{ $edu->field_of_study ? '— ' . $edu->field_of_study : '' }}</div>
                        </div>
                    </div>
                    <span class="timeline-badge">
                        <i class="bi bi-calendar-check"></i> {{ $edu->period ?? 'Fresh Graduate' }}
                    </span>
                </div>
                <p class="text-secondary mb-0 leading-relaxed">
                    {{ $edu->description }}
                </p>
            </div>
        @endforeach

        <!-- Certifications Grid -->
        <div id="certifications" class="pt-4">
            <h3 class="h4 fw-bold text-white mb-4 d-flex align-items-center gap-2">
                <i class="bi bi-patch-check gradient-accent"></i> Sertifikasi Terverifikasi
            </h3>
            <div class="certs-grid">
                @foreach($certifications as $cert)
                    <div class="glass-card cert-card">
                        <div>
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="cert-badge">
                                    <i class="bi bi-calendar3"></i> {{ $cert->issue_date ?? 'Verified' }}
                                </span>
                                @if(!empty($cert->score_or_credential))
                                    <span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25">
                                        {{ $cert->score_or_credential }}
                                    </span>
                                @endif
                            </div>
                            <h4 class="cert-title">{{ $cert->title }}</h4>
                            <div class="cert-issuer">
                                <i class="bi bi-building me-1"></i> {{ $cert->issuer ?? 'Penerbit Resmi' }}
                            </div>
                        </div>
                        @if(!empty($cert->credential_url))
                            <div class="pt-3 border-top border-secondary border-opacity-25 mt-3">
                                <a href="{{ $cert->credential_url }}" target="_blank" class="text-info text-decoration-none small">
                                    Lihat Kredensial <i class="bi bi-box-arrow-up-right"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- =========================================================================
     8. CONTACT SECTION
     ========================================================================= -->
<section id="contact" class="contact-section">
    <div class="container-custom">
        <div class="section-header">
            <span class="section-tag"><i class="bi bi-envelope-paper-fill"></i> Get In Touch</span>
            <h2 class="section-title">Hubungi <span class="gradient-text">Saya</span></h2>
            <p class="section-subtitle">
                Tertarik untuk mendiskusikan peluang kerja, kerja sama tim, atau bertanya mengenai proyek? Kirimkan pesan Anda melalui formulir atau kontak di bawah ini.
            </p>
        </div>

        <div class="contact-layout">
            <!-- Left Info & Social Links Card -->
            <div class="glass-card contact-info-card">
                <h3 class="h4 fw-bold text-white mb-3">Informasi Kontak</h3>
                <p class="text-secondary mb-4 leading-relaxed">
                    Saya terbuka untuk peluang kerja sebagai Web Developer, IT Support, Staf Administrasi/Data, atau posisi teknis lainnya.
                </p>

                <div class="social-links-grid">
                    @foreach($socialLinks as $link)
                        <a href="{{ $link->url }}" target="_blank" class="social-link-row">
                            <div class="social-icon-box">
                                <i class="bi {{ $link->icon ?? 'bi-link-45deg' }}"></i>
                            </div>
                            <div>
                                <div class="fw-semibold text-white small">{{ $link->platform }}</div>
                                <div class="text-muted small text-truncate" style="max-width: 200px;">{{ $link->label }}</div>
                            </div>
                            <i class="bi bi-arrow-up-right ms-auto text-secondary"></i>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Right Message Form Card -->
            <div class="glass-card contact-form-card">
                <h3 class="h4 fw-bold text-white mb-3">Kirim Pesan Langsung</h3>

                <!-- Feedback Alert Container -->
                <div id="contactFormFeedback" style="display: none;"></div>

                @if(session('success'))
                    <div class="alert alert-success d-flex align-items-center gap-2 mb-4">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    </div>
                @endif

                <form id="portfolioContactForm" action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6 form-group-custom">
                            <label for="name" class="form-label-custom">Nama Lengkap *</label>
                            <input type="text" id="name" name="name" class="form-input-custom" placeholder="Nama Anda" required>
                        </div>
                        <div class="col-md-6 form-group-custom">
                            <label for="email" class="form-label-custom">Email Anda *</label>
                            <input type="email" id="email" name="email" class="form-input-custom" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="form-group-custom">
                        <label for="subject" class="form-label-custom">Subjek / Topik</label>
                        <input type="text" id="subject" name="subject" class="form-input-custom" placeholder="Peluang Kerja / Tanya Sistem">
                    </div>

                    <div class="form-group-custom">
                        <label for="message" class="form-label-custom">Isi Pesan *</label>
                        <textarea id="message" name="message" rows="5" class="form-input-custom" placeholder="Tuliskan pesan Anda secara jelas..." required></textarea>
                    </div>

                    <button type="submit" class="btn-glow btn-glow-primary w-100 py-3 mt-2">
                        <i class="bi bi-send-fill"></i> Kirim Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
