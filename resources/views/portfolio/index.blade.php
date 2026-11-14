<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f8f9ff">
    <meta name="description" content="Portofolio profesional Ahmad Dhio Baehaqi, lulusan S1 Teknik Informatika dengan pengalaman dan proyek di bidang teknologi informasi dan operasional.">
    <title>Ahmad Dhio Baehaqi — Portofolio</title>
    <script>
        (() => {
            const saved = localStorage.getItem('portfolio-theme');
            document.documentElement.dataset.theme = saved === 'dark' || saved === 'light' ? saved : 'light';
        })();
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a class="skip-link" href="#main-content">Lewati ke konten utama</a>

    <div class="scroll-progress" data-scroll-progress role="progressbar" aria-label="Kemajuan membaca halaman" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
        <span></span>
    </div>

    <header class="site-header" data-site-header>
        <div class="container header-inner">
            <a class="brand" href="#beranda" aria-label="ADB, ke beranda">
                <span class="brand-mark">ADB<span aria-hidden="true">.</span></span>
                <span class="brand-name">{{ $portfolio['name'] }}</span>
            </a>

            <button class="menu-toggle icon-button" type="button" aria-label="Buka menu navigasi" aria-expanded="false" aria-controls="primary-navigation" data-menu-toggle>
                <span class="menu-toggle-lines" aria-hidden="true"><span></span><span></span></span>
            </button>

            <nav class="site-nav" id="primary-navigation" aria-label="Navigasi utama">
                <a href="#beranda" aria-current="location">Beranda</a>
                <a href="#tentang">Tentang</a>
                <a href="#pengalaman">Pengalaman</a>
                <a href="#keahlian">Keahlian</a>
                <a href="#proyek">Proyek</a>
                <a href="#kontak">Kontak</a>
            </nav>

            <button class="theme-toggle icon-button" type="button" aria-label="Aktifkan tema gelap" aria-pressed="false" data-theme-toggle>
                <svg class="theme-icon theme-icon-sun" viewBox="0 0 24 24" aria-hidden="true"><circle cx="12" cy="12" r="4"></circle><path d="M12 2v2m0 16v2M4.93 4.93l1.42 1.42m11.3 11.3 1.42 1.42M2 12h2m16 0h2M4.93 19.07l1.42-1.42m11.3-11.3 1.42-1.42"></path></svg>
                <svg class="theme-icon theme-icon-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M20.2 15.1A8.4 8.4 0 0 1 8.9 3.8 8.5 8.5 0 1 0 20.2 15.1Z"></path></svg>
            </button>
        </div>
    </header>

    <main id="main-content">
        <section class="hero section-shell" id="beranda" aria-labelledby="hero-title">
            <div class="container hero-grid">
                <div class="hero-copy reveal">
                    <p class="eyebrow"><span class="status-pulse" aria-hidden="true"></span> PERSONAL PORTFOLIO <span class="eyebrow-divider">/</span> 2026</p>
                    <h1 id="hero-title"><span class="hero-intro">Halo, saya</span><span class="hero-name">{{ $portfolio['name'] }}<span class="hero-period">.</span></span></h1>
                    <p class="hero-role">{{ $portfolio['headline'] }}</p>
                    <p class="hero-summary">{{ $portfolio['summary'] }}</p>
                    <div class="hero-actions">
                        <a class="button button-primary" href="#proyek">Lihat Proyek <span aria-hidden="true">↗</span></a>
                        <a class="button button-quiet" href="#kontak">Hubungi Saya <span aria-hidden="true">↗</span></a>
                    </div>
                    <div class="hero-meta">
                        <span class="hero-badge"><span aria-hidden="true">✳</span> {{ $portfolio['education_label'] }}</span>
                        <span class="hero-badge hero-badge-open"><span class="meta-dot" aria-hidden="true"></span> Open to Work</span>
                    </div>
                </div>
                <div class="hero-visual reveal">
                    <div class="portrait-frame">
                        <div class="portrait-accent portrait-accent-top" aria-hidden="true"></div>
                        <img src="{{ asset('assets/profile.jpg.jpeg') }}" alt="Foto Ahmad Dhio Baehaqi" class="portrait" fetchpriority="high">
                        <div class="portrait-caption">
                            <span class="caption-mark" aria-hidden="true">{{ $portfolio['initials'] }}.</span>
                            <span><strong>{{ $portfolio['name'] }}</strong><small>S1 Teknik Informatika · 2026</small></span>
                        </div>
                        <div class="portrait-accent portrait-accent-bottom" aria-hidden="true"></div>
                    </div>
                    <span class="floating-shape floating-shape-one" aria-hidden="true"></span>
                    <span class="floating-shape floating-shape-two" aria-hidden="true"></span>
                </div>
            </div>
            <a class="scroll-cue" href="#tentang"><span aria-hidden="true"></span></a>
        </section>

        <section class="section section-muted" id="tentang" aria-labelledby="about-title">
            <div class="container about-grid">
                <div class="section-heading reveal">
                    <p class="eyebrow">TENTANG SAYA</p>
                    <h2 id="about-title">Teknologi, pengalaman, dan <span>langkah berikutnya.</span></h2>
                </div>
                <div class="about-content reveal">
                    <p>{{ $portfolio['about'] }}</p>
                    <a class="text-link" href="#pendidikan">Pendidikan saya <span aria-hidden="true">↗</span></a>
                </div>
            </div>
        </section>

        <section class="section" id="pendidikan" aria-labelledby="education-title">
            <div class="container">
                <div class="section-heading section-heading-centered reveal">
                    <p class="eyebrow">LATAR AKADEMIS</p>
                    <h2 id="education-title">Pendidikan <span>yang membentuk fondasi.</span></h2>
                </div>
                <div class="education-card reveal">
                    <div class="education-icon" aria-hidden="true">
                        <svg viewBox="0 0 32 32"><path d="m4 12 12-7 12 7-12 7L4 12Z"></path><path d="M9 15v7c4.2 3.2 9.8 3.2 14 0v-7M28 12v8"></path></svg>
                    </div>
                    <div class="education-main">
                        @foreach ($portfolio['education'] as $education)
                            <p class="card-kicker">{{ $education['period'] }}</p>
                            <h3>{{ $education['degree'] }}</h3>
                            <p>{{ $education['institution'] }}</p>
                        @endforeach
                    </div>
                    <div class="education-score"><span>IPK</span><strong>{{ $portfolio['education'][0]['gpa'] }}</strong><small>{{ $portfolio['education'][0]['gpa_scale'] }}</small></div>
                </div>
            </div>
        </section>

        <section class="section section-muted" id="pengalaman" aria-labelledby="experience-title">
            <div class="container">
                <div class="section-heading reveal">
                    <p class="eyebrow">PERJALANAN PROFESIONAL</p>
                    <h2 id="experience-title">Belajar lewat <span>pengalaman.</span></h2>
                    <p class="section-intro">Perjalanan profesional dan magang yang memperluas pengalaman saya.</p>
                </div>
                <div class="timeline">
                    @foreach ($portfolio['experience'] as $item)
                        <article class="timeline-item reveal">
                            <span class="timeline-marker" aria-hidden="true"></span>
                            <div class="timeline-period">{{ $item['period'] }}</div>
                            <div class="timeline-card">
                                <p class="card-kicker">{{ $item['organization'] }}</p>
                                <h3>{{ $item['role'] }}</h3>
                                <p>{{ $item['description'] }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section" id="keahlian" aria-labelledby="skills-title">
            <div class="container">
                <div class="section-heading section-heading-centered reveal">
                    <p class="eyebrow">HAL YANG SAYA KERJAKAN</p>
                    <h2 id="skills-title">Perpaduan <span>teknis dan praktis.</span></h2>
                    <p class="section-intro">Keahlian yang dirangkum dari latar belakang dan pengalaman saya.</p>
                </div>
                <div class="skills-grid">
                    @foreach ($portfolio['skills'] as $skill)
                        <article class="skill-card skill-card-{{ $skill['icon'] }} reveal">
                            <span class="skill-icon" aria-hidden="true">
                                @switch($skill['icon'])
                                    @case('code')
                                        <svg viewBox="0 0 24 24"><path d="m8 8-4 4 4 4m8-8 4 4-4 4m-3-11-2 14"></path></svg>
                                        @break
                                    @case('operations')
                                        <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="15" rx="2"></rect><path d="M8 5V3m8 2V3M3 10h18m-12 4h6"></path></svg>
                                        @break
                                    @case('tools')
                                        <svg viewBox="0 0 24 24"><path d="M14 6a5 5 0 0 0-6 6l-4 4a2 2 0 0 0 3 3l4-4a5 5 0 0 0 6-6l-3 3-3-3 3-3Zm5 10 2 2m-5-5 2 2"></path></svg>
                                        @break
                                    @default
                                        <svg viewBox="0 0 24 24"><path d="M16 20v-1a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v1m6-8a4 4 0 1 0 0-8 4 4 0 0 0 0 8Zm6-7a4 4 0 0 1 0 8m2 3a4 4 0 0 1 2 4"></path></svg>
                                @endswitch
                            </span>
                            <h3>{{ $skill['category'] }}</h3>
                            <ul>
                                @foreach ($skill['items'] as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section section-muted" id="proyek" aria-labelledby="projects-title">
            <div class="container">
                <div class="section-heading projects-heading reveal">
                    <div>
                        <p class="eyebrow">KARYA PILIHAN</p>
                        <h2 id="projects-title">Kumpulan <span>proyek.</span></h2>
                    </div>
                    <p class="section-intro">Beberapa karya yang menjadi bagian dari perjalanan dan portofolio saya.</p>
                </div>
                <div class="projects-grid">
                    @foreach ($portfolio['projects'] as $project)
                        <article class="project-card reveal">
                            <button class="project-open" type="button"
                                data-project-title="{{ $project['name'] }}"
                                data-project-category="{{ $project['category'] }}"
                                data-project-description="{{ $project['description'] }}"
                                data-project-details="{{ $project['details'] }}"
                                aria-label="Lihat detail proyek {{ $project['name'] }}">
                                @if ($project['image'])
                                    <span class="project-image-wrap">
                                        <img src="{{ asset($project['image']) }}" alt="{{ $project['alt'] }}" class="project-image" loading="lazy">
                                        <span class="project-image-action" aria-hidden="true"><span>Lihat Detail</span><span>↗</span></span>
                                    </span>
                                @else
                                    <span class="project-no-image">
                                        <span class="project-initials" aria-hidden="true">{{ strtoupper(substr($project['name'], 0, 2)) }}</span>
                                        <span class="no-image-label">Tangkapan layar belum tersedia</span>
                                        <span class="project-image-action" aria-hidden="true"><span>Lihat Detail</span><span>↗</span></span>
                                    </span>
                                @endif
                                <span class="project-copy">
                                    <span class="project-category">{{ $project['category'] }}</span>
                                    <span class="project-title">{{ $project['name'] }}</span>
                                    <span class="project-description">{{ $project['description'] }}</span>
                                    <span class="project-tags">
                                        @foreach ($project['tags'] as $tag)
                                            <span class="project-tag">{{ $tag }}</span>
                                        @endforeach
                                    </span>
                                </span>
                            </button>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section contact-section" id="kontak" aria-labelledby="contact-title">
            <div class="container contact-grid">
                <div class="contact-copy reveal">
                    <p class="eyebrow">SELALU TERBUKA UNTUK BERKENALAN</p>
                    <h2 id="contact-title">Ada hal seru? <span>Mari ngobrol.</span></h2>
                    <p>Untuk percakapan profesional, pertanyaan tentang proyek, atau peluang kolaborasi, saya senang mendengar dari Anda.</p>
                </div>
                <div class="contact-list reveal">
                    <a class="contact-item" href="{{ $portfolio['contact']['whatsapp_url'] }}">
                        <span class="contact-icon" aria-hidden="true">WA</span>
                        <span><small>WhatsApp</small><strong>{{ $portfolio['contact']['whatsapp'] }}</strong></span>
                        <span class="contact-arrow" aria-hidden="true">↗</span>
                    </a>
                    <a class="contact-item" href="mailto:{{ $portfolio['contact']['email'] }}">
                        <span class="contact-icon" aria-hidden="true">@</span>
                        <span><small>Email</small><strong>{{ $portfolio['contact']['email'] }}</strong></span>
                        <span class="contact-arrow" aria-hidden="true">↗</span>
                    </a>
                    <a class="contact-item" href="{{ $portfolio['contact']['instagram_url'] }}">
                        <span class="contact-icon" aria-hidden="true">IG</span>
                        <span><small>Instagram</small><strong>{{ $portfolio['contact']['instagram'] }}</strong></span>
                        <span class="contact-arrow" aria-hidden="true">↗</span>
                    </a>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <a class="brand footer-brand" href="#beranda">
                <span class="brand-mark">ADB<span aria-hidden="true">.</span></span>
                <span class="brand-name">{{ $portfolio['name'] }}</span>
            </a>
            <p>© {{ now()->year }} {{ $portfolio['name'] }}</p>
            <a class="back-to-top-footer" href="#beranda">Kembali ke atas <span aria-hidden="true">↑</span></a>
        </div>
    </footer>

    <button class="back-to-top-float" type="button" aria-label="Kembali ke atas" data-back-to-top hidden>
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m6 14 6-6 6 6"></path></svg>
    </button>

    <dialog class="project-dialog" aria-labelledby="dialog-title" data-project-dialog>
        <div class="dialog-inner">
            <button class="dialog-close icon-button" type="button" aria-label="Tutup detail proyek" data-dialog-close>×</button>
            <p class="eyebrow" data-dialog-category></p>
            <h2 id="dialog-title" data-dialog-title></h2>
            <p class="dialog-description" data-dialog-description></p>
            <p class="dialog-details" data-dialog-details></p>
        </div>
    </dialog>
</body>
</html>
