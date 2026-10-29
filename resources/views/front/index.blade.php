<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Jokanti Coffee — Specialty coffee dengan cita rasa terbaik dari biji kopi pilihan Nusantara.">
    <title>Jokanti Coffee | Home</title>
    <link rel="shortcut icon" href="{{ asset('gambar/jokanti-rmv.png') }}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --coffee-darkest: #120E0B;
            --coffee-dark:    #1C1612;
            --coffee-accent:  #C89542;
            --coffee-light:   #E8BA6C;
            --coffee-cream:   #FAF7F2;
            --coffee-mocha:   #6B5E54;
            --coffee-border:  rgba(200, 149, 66, 0.18);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background: var(--coffee-cream);
        }

        /* ─── NAVBAR ─── */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(18, 14, 11, 0.97);
            backdrop-filter: blur(12px);
            z-index: 1000;
            transition: all 0.3s ease;
            box-shadow: 0 2px 24px rgba(0,0,0,0.25);
        }

        .navbar.scrolled { background: rgba(18, 14, 11, 1); }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 14px 24px;
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 20px;
        }

        .nav-logo img {
            height: 52px;
            width: auto;
            object-fit: contain;
            filter: brightness(1.05);
            transition: transform 0.3s ease;
        }
        .nav-logo img:hover { transform: scale(1.05); }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 36px;
            justify-content: center;
        }

        .nav-links a {
            color: rgba(255,255,255,0.75);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.88rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            transition: color 0.3s ease;
            position: relative;
            padding-bottom: 4px;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0;
            width: 0; height: 2px;
            background: var(--coffee-accent);
            transition: width 0.3s ease;
        }

        .nav-links a:hover,
        .nav-links a.active { color: var(--coffee-accent); }
        .nav-links a:hover::after,
        .nav-links a.active::after { width: 100%; }

        .nav-right {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
        }

        .btn-login {
            background: linear-gradient(135deg, var(--coffee-accent), var(--coffee-light));
            color: var(--coffee-darkest);
            padding: 9px 24px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.82rem;
            text-decoration: none;
            letter-spacing: 0.04em;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(200,149,66,0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(200,149,66,0.45);
        }

        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.4rem;
            cursor: pointer;
            margin-left: 8px;
        }

        /* ─── HERO ─── */
        .hero {
            height: 100vh;
            min-height: 600px;
            background:
                linear-gradient(160deg, rgba(18,14,11,0.82) 0%, rgba(28,22,18,0.65) 100%),
                url('{{ asset('img/header1.jpg') }}') center/cover no-repeat;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
            position: relative;
            overflow: hidden;
        }

        .hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 120px;
            background: linear-gradient(to top, var(--coffee-cream), transparent);
        }

        .hero-content {
            max-width: 800px;
            padding: 0 24px;
            position: relative;
            z-index: 1;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(200,149,66,0.14);
            border: 1px solid var(--coffee-border);
            color: var(--coffee-accent);
            padding: 7px 20px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 24px;
            backdrop-filter: blur(6px);
        }

        .hero-title {
            font-size: clamp(2.2rem, 6vw, 4rem);
            font-weight: 700;
            line-height: 1.15;
            margin-bottom: 20px;
            color: #fff;
        }

        .hero-title span { color: var(--coffee-accent); }

        .hero-desc {
            font-size: clamp(0.95rem, 2vw, 1.1rem);
            color: rgba(255,255,255,0.7);
            font-weight: 300;
            margin-bottom: 40px;
            max-width: 560px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-cta {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 40px;
            border-radius: 50px;
            background: linear-gradient(135deg, var(--coffee-accent), var(--coffee-light));
            color: var(--coffee-darkest);
            text-decoration: none;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.03em;
            box-shadow: 0 8px 28px rgba(200,149,66,0.4);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 36px rgba(200,149,66,0.5);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 14px 40px;
            border-radius: 50px;
            border: 1.5px solid rgba(255,255,255,0.3);
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(4px);
        }

        .btn-outline:hover {
            border-color: var(--coffee-accent);
            color: var(--coffee-accent);
        }

        /* ─── STATS STRIP ─── */
        .stats-strip {
            background: var(--coffee-darkest);
            border-top: 1px solid rgba(200,149,66,0.12);
            border-bottom: 1px solid rgba(200,149,66,0.12);
            padding: 0 24px;
        }

        .stats-inner {
            max-width: 860px;
            margin: 0 auto;
            display: flex;
            align-items: stretch;
        }

        .stat-item {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 36px 20px;
            text-align: center;
            transition: background 0.3s ease;
        }

        .stat-item:hover {
            background: rgba(200,149,66,0.04);
        }

        .stat-icon {
            font-size: 1.1rem;
            color: var(--coffee-accent);
            opacity: 0.7;
            margin-bottom: 4px;
        }

        .stat-num {
            font-size: 2.2rem;
            font-weight: 700;
            color: var(--coffee-accent);
            line-height: 1;
            letter-spacing: -0.02em;
        }

        .stat-label {
            font-size: 0.72rem;
            color: rgba(255,255,255,0.38);
            text-transform: uppercase;
            letter-spacing: 0.1em;
            font-weight: 500;
        }

        .stats-divider {
            width: 1px;
            background: rgba(255,255,255,0.07);
            align-self: stretch;
            flex-shrink: 0;
        }

        /* ─── ABOUT SECTION ─── */
        .about {
            padding: 100px 24px;
            background: var(--coffee-cream);
        }

        .about-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 72px;
            align-items: center;
        }

        .about-image-wrap {
            position: relative;
        }

        .about-image-wrap::before {
            content: '';
            position: absolute;
            top: -16px; left: -16px;
            right: 16px; bottom: 16px;
            border: 2px solid var(--coffee-border);
            border-radius: 26px;
            z-index: 0;
        }

        .about-image {
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 28px 64px rgba(18,14,11,0.2);
            position: relative;
            z-index: 1;
        }

        .about-image img {
            width: 100%;
            height: 440px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .about-image:hover img { transform: scale(1.03); }

        .section-label {
            display: inline-block;
            color: var(--coffee-accent);
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 14px;
        }

        .section-title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 700;
            color: var(--coffee-darkest);
            margin-bottom: 18px;
            line-height: 1.2;
        }

        .section-text {
            color: var(--coffee-mocha);
            font-size: 0.95rem;
            line-height: 1.85;
            margin-bottom: 28px;
        }

        .link-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: var(--coffee-accent);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: gap 0.3s ease, color 0.3s ease;
        }

        .link-btn:hover {
            gap: 16px;
            color: var(--coffee-light);
        }

        /* ─── MENU SECTION ─── */
        .menu-section {
            padding: 100px 24px;
            background: #fff;
        }

        .section-head {
            text-align: center;
            max-width: 600px;
            margin: 0 auto 60px;
        }

        .section-head .section-title { margin-bottom: 12px; }

        .section-sub {
            color: var(--coffee-mocha);
            font-size: 0.95rem;
        }

        .menu-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
        }

        .menu-card {
            background: var(--coffee-cream);
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(18,14,11,0.07);
            transition: all 0.35s ease;
            border: 1px solid rgba(200,149,66,0.08);
        }

        .menu-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 24px 56px rgba(18,14,11,0.14);
        }

        .menu-card-img-wrap {
            overflow: hidden;
            position: relative;
        }

        .menu-card-img-wrap::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 60px;
            background: linear-gradient(to top, rgba(250,247,242,0.6), transparent);
        }

        .menu-card img {
            width: 100%;
            height: 260px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .menu-card:hover img { transform: scale(1.07); }

        .menu-card-body {
            padding: 24px 28px 28px;
        }

        .menu-card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 10px;
        }

        .menu-card-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--coffee-darkest);
        }

        .menu-card-price {
            background: linear-gradient(135deg, var(--coffee-accent), var(--coffee-light));
            color: var(--coffee-darkest);
            padding: 5px 16px;
            border-radius: 50px;
            font-size: 0.82rem;
            font-weight: 700;
            white-space: nowrap;
            box-shadow: 0 3px 10px rgba(200,149,66,0.3);
        }

        .menu-card-desc {
            color: var(--coffee-mocha);
            font-size: 0.85rem;
            line-height: 1.65;
        }

        .menu-cta {
            text-align: center;
            margin-top: 52px;
        }

        .btn-border {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 13px 44px;
            border-radius: 50px;
            border: 1.5px solid var(--coffee-accent);
            color: var(--coffee-darkest);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-border:hover {
            background: var(--coffee-accent);
            color: #fff;
            box-shadow: 0 8px 20px rgba(200,149,66,0.35);
        }

        /* ─── FOOTER ─── */
        .footer {
            background: var(--coffee-darkest);
            padding: 72px 24px 28px;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr;
            gap: 52px;
            margin-bottom: 52px;
        }

        .footer-brand img {
            height: 52px;
            margin-bottom: 16px;
            object-fit: contain;
        }

        .footer-brand p {
            color: rgba(255,255,255,0.45);
            font-size: 0.85rem;
            line-height: 1.7;
            max-width: 280px;
            margin-bottom: 6px;
        }

        .footer-copy {
            color: rgba(255,255,255,0.25);
            font-size: 0.78rem;
        }

        .footer-col h4 {
            color: var(--coffee-accent);
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .footer-map-wrap {
            border-radius: 14px;
            overflow: hidden;
            height: 200px;
            box-shadow: 0 16px 40px rgba(0,0,0,0.3);
        }

        .footer-map-wrap iframe {
            width: 100%;
            height: 100%;
            border: 0;
        }

        .footer-mail {
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            margin-top: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .footer-mail i { color: var(--coffee-accent); }

        .socials {
            display: flex;
            gap: 10px;
            margin-top: 16px;
        }

        .socials a {
            width: 40px; height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(200,149,66,0.1);
            color: var(--coffee-accent);
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid var(--coffee-border);
        }

        .socials a:hover {
            background: var(--coffee-accent);
            color: var(--coffee-darkest);
            border-color: var(--coffee-accent);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.06);
            padding-top: 24px;
            text-align: center;
            color: rgba(255,255,255,0.25);
            font-size: 0.8rem;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 992px) {
            .nav-links { display: none; }
            .nav-links.open {
                display: flex;
                flex-direction: column;
                position: fixed;
                top: 76px; left: 0; right: 0;
                background: rgba(18,14,11,0.98);
                padding: 24px;
                z-index: 999;
                gap: 20px;
            }
            .nav-toggle { display: block; }
            .nav-container { grid-template-columns: auto 1fr auto; }
            .about-grid { grid-template-columns: 1fr; gap: 48px; }
            .about-image-wrap::before { display: none; }
            .about-image img { height: 360px; }
            .footer-grid { grid-template-columns: 1fr; gap: 36px; }
        }

        @media (max-width: 640px) {
            .hero-cta { flex-direction: column; align-items: center; }
            .stats-inner { flex-direction: column; }
            .stats-divider {
                width: 60%;
                height: 1px;
                align-self: center;
            }
            .stat-item { padding: 24px 20px; }
            .menu-grid { grid-template-columns: 1fr; }
            .about-image img { height: 300px; }
        }
    </style>
</head>

<body>
    <!-- ── NAVBAR ── -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <div>
                <a href="{{ url('/') }}" class="nav-logo">
                    @if (isset($about) && $about->first() && $about->first()->logo)
                        <img src="{{ asset('storage/' . $about->first()->logo) }}" alt="Jokanti Coffee">
                    @else
                        <img src="{{ asset('gambar/jokanti-rmv.png') }}" alt="Jokanti Coffee">
                    @endif
                </a>
            </div>

            <ul class="nav-links" id="navLinks">
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
                <li><a href="{{ url('/AboutUs') }}">About</a></li>
                <li><a href="{{ url('/menu') }}">Menu</a></li>
            </ul>

            <div class="nav-right">
                <a href="{{ route('signin') }}" class="btn-login">
                    <i class="fa fa-user"></i> Login
                </a>
                <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- ── HERO ── -->
    <header class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fa fa-coffee"></i> Specialty Coffee Roasters
            </div>
            <h1 class="hero-title">
                Mulai Harimu Dengan<br>
                Secangkir <span>Kopi Terbaik</span>
            </h1>
            <p class="hero-desc">
                Nikmati kehangatan dan cita rasa kopi berkualitas yang diracik dengan penuh perhatian untuk momen spesialmu.
            </p>
            <div class="hero-cta">
                <a href="{{ url('/menu') }}" class="btn-primary">
                    Lihat Menu <i class="fa fa-arrow-right"></i>
                </a>
                <a href="{{ url('/AboutUs') }}" class="btn-outline">
                    Tentang Kami
                </a>
            </div>
        </div>
    </header>

    <!-- ── STATS STRIP ── -->
    <div class="stats-strip">
        <div class="stats-inner">
            <div class="stat-item">
                <i class="fa fa-mug-hot stat-icon"></i>
                <div class="stat-num">100+</div>
                <div class="stat-label">Pilihan Menu</div>
            </div>
            <div class="stats-divider"></div>
            <div class="stat-item">
                <i class="fa fa-star stat-icon"></i>
                <div class="stat-num">5.0</div>
                <div class="stat-label">Rating Pelanggan</div>
            </div>
            <div class="stats-divider"></div>
            <div class="stat-item">
                <i class="fa fa-calendar-check stat-icon"></i>
                <div class="stat-num">3+</div>
                <div class="stat-label">Tahun Berdiri</div>
            </div>
        </div>
    </div>

    <!-- ── ABOUT SECTION ── -->
    <section class="about">
        <div class="about-grid">
            <div class="about-image-wrap">
                <div class="about-image">
                    @if (isset($about) && $about->isNotEmpty())
                        @php $aboutData = $about->first(); @endphp
                        @if (!empty($aboutData->gambar) && file_exists(public_path('storage/' . $aboutData->gambar)))
                            <img src="{{ asset('storage/' . $aboutData->gambar) }}" alt="Tentang Jokanti Coffee">
                        @else
                            <img src="{{ asset('img/header1.jpg') }}" alt="Tentang Jokanti Coffee">
                        @endif
                    @else
                        <img src="{{ asset('img/header1.jpg') }}" alt="Tentang Jokanti Coffee">
                    @endif
                </div>
            </div>
            <div>
                <span class="section-label">✦ Tentang Kami</span>
                <h2 class="section-title">Jokanti Coffee Roasters</h2>
                @if (isset($about) && $about->isNotEmpty())
                    @php $aboutData = $about->first(); @endphp
                    <p class="section-text">{{ $aboutData->isi ?? 'Jokanti Coffee menghadirkan pengalaman ngopi hangat dengan biji kopi pilihan dan racikan konsisten. Setiap cangkir disajikan untuk jadi bagian dari cerita hari kamu.' }}</p>
                @else
                    <p class="section-text">Jokanti Coffee menghadirkan pengalaman ngopi hangat dengan biji kopi pilihan dan racikan konsisten. Setiap cangkir disajikan untuk jadi bagian dari cerita hari kamu.</p>
                @endif
                <a href="{{ url('/AboutUs') }}" class="link-btn">
                    Selengkapnya <i class="fa fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ── MENU SECTION ── -->
    <section class="menu-section">
        <div class="section-head">
            <span class="section-label">✦ Menu Kami</span>
            <h2 class="section-title">Pilihan Terfavorit</h2>
            <p class="section-sub">Beragam minuman kopi dan non-kopi yang siap menemani harimu</p>
        </div>

        <div class="menu-grid">
            @forelse ($product->take(3) as $item)
                <article class="menu-card">
                    <div class="menu-card-img-wrap">
                        @if (!empty($item->gambar))
                            <img src="{{ Storage::url($item->gambar) }}" alt="{{ $item->judul }}" loading="lazy">
                        @else
                            <img src="{{ asset('gambar/jokanti-rmv.png') }}" alt="{{ $item->judul }}" loading="lazy">
                        @endif
                    </div>
                    <div class="menu-card-body">
                        <div class="menu-card-top">
                            <h3 class="menu-card-name">{{ $item->judul }}</h3>
                            <span class="menu-card-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        </div>
                        <p class="menu-card-desc">{{ Str::limit($item->deskripsi, 90) }}</p>
                    </div>
                </article>
            @empty
                <p style="grid-column:1/-1; text-align:center; color:var(--coffee-mocha);">Menu belum tersedia saat ini.</p>
            @endforelse
        </div>

        <div class="menu-cta">
            <a href="{{ url('/menu') }}" class="btn-border">
                Lihat Semua Menu <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </section>

    <!-- ── FOOTER ── -->
    <footer class="footer">
        <div class="footer-inner">
            <div class="footer-grid">
                <div class="footer-brand">
                    @if (isset($about) && $about->first() && $about->first()->logo)
                        <img src="{{ asset('storage/' . $about->first()->logo) }}" alt="Jokanti Coffee">
                    @else
                        <img src="{{ asset('gambar/jokanti-rmv.png') }}" alt="Jokanti Coffee">
                    @endif
                    <p>Kedai kopi hangat dengan cita rasa autentik untuk menemani setiap cerita kamu.</p>
                    <p class="footer-copy">© {{ date('Y') }} Jokanti Coffee. All Rights Reserved.</p>
                </div>

                <div class="footer-col">
                    <h4>Lokasi Kami</h4>
                    <div class="footer-map-wrap">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d312.19039293984684!2d101.42153290699869!3d0.5701994403556715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab41cb4627d3%3A0x2855765c864e40b6!2sJokanti%20Coffee%20Roasters!5e0!3m2!1sen!2sid!4v1734430036381!5m2!1sen!2sid"
                            allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Hubungi Kami</h4>
                    <p class="footer-mail"><i class="fa fa-envelope"></i> Jokanti@gmail.com</p>
                    <div class="socials">
                        @if (isset($about) && $about->first())
                            @if ($about->first()->whatsapp)
                                <a href="{{ $about->first()->whatsapp }}" target="_blank" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                            @endif
                            @if ($about->first()->instagram)
                                <a href="{{ $about->first()->instagram }}" target="_blank" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                            @endif
                            @if ($about->first()->tokopedia)
                                <a href="{{ $about->first()->tokopedia }}" target="_blank" title="Tokopedia"><i class="fa fa-shopping-bag"></i></a>
                            @endif
                        @else
                            <a href="#" title="WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>
                            <a href="#" title="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                Brewing memories, one cup at a time ☕
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 40);
        });

        // Mobile nav toggle
        document.getElementById('navToggle').addEventListener('click', () => {
            document.getElementById('navLinks').classList.toggle('open');
        });
    </script>
</body>

</html>
