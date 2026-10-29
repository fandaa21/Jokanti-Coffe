<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Menu lengkap Jokanti Coffee — kopi specialty pilihan dengan cita rasa terbaik.">
    <title>Menu | Jokanti Coffee</title>
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
            background: var(--coffee-cream);
            color: #333;
            line-height: 1.6;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(18, 14, 11, 0.97);
            backdrop-filter: blur(12px);
            z-index: 1000;
            box-shadow: 0 2px 24px rgba(0,0,0,0.25);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 14px 24px;
            display: grid;
            grid-template-columns: 1fr auto 1fr;
            align-items: center;
            gap: 20px;
        }

        .nav-left { display: flex; align-items: center; gap: 10px; }

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

        /* Mobile nav toggle */
        .nav-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.4rem;
            cursor: pointer;
        }

        /* ── PAGE HERO ── */
        .page-hero {
            background: linear-gradient(160deg, var(--coffee-darkest) 0%, #2B1B17 60%, #3D2314 100%);
            padding: 140px 24px 70px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at 50% 120%, rgba(200,149,66,0.12) 0%, transparent 65%);
        }

        .page-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(200,149,66,0.14);
            border: 1px solid var(--coffee-border);
            color: var(--coffee-accent);
            padding: 6px 18px;
            border-radius: 50px;
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        .page-hero h1 {
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 700;
            color: #fff;
            margin-bottom: 14px;
            line-height: 1.2;
        }

        .page-hero h1 span { color: var(--coffee-accent); }

        .page-hero p {
            color: rgba(255,255,255,0.6);
            font-size: 1rem;
            max-width: 500px;
            margin: 0 auto;
        }

        /* ── DECORATIVE DIVIDER ── */
        .divider-wave {
            height: 60px;
            background: var(--coffee-cream);
            clip-path: ellipse(55% 100% at 50% 100%);
            margin-top: -1px;
        }

        /* ── MENU SECTION ── */
        .menu-section {
            padding: 20px 24px 80px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-header .label {
            display: inline-block;
            color: var(--coffee-accent);
            font-size: 0.78rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .section-header h2 {
            font-size: clamp(1.6rem, 3.5vw, 2.4rem);
            font-weight: 700;
            color: var(--coffee-darkest);
        }

        /* Category Tabs */
        .category-tabs {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .tab-btn {
            background: #fff;
            border: 1.5px solid #e0d5cc;
            color: var(--coffee-mocha);
            padding: 8px 22px;
            border-radius: 50px;
            font-size: 0.83rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.25s ease;
            font-family: 'Poppins', sans-serif;
        }

        .tab-btn:hover,
        .tab-btn.active {
            background: var(--coffee-accent);
            border-color: var(--coffee-accent);
            color: #fff;
            box-shadow: 0 4px 14px rgba(200,149,66,0.35);
        }

        /* Menu Grid */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(290px, 1fr));
            gap: 28px;
        }

        .menu-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.07);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            position: relative;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .menu-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.13);
        }

        .menu-card-img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .menu-card:hover .menu-card-img {
            transform: scale(1.06);
        }

        .menu-card-img-wrapper {
            overflow: hidden;
            position: relative;
        }

        .menu-card-img-wrapper::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 70px;
            background: linear-gradient(to top, rgba(255,255,255,0.5), transparent);
        }

        .menu-card-body {
            padding: 20px 22px 24px;
        }

        .menu-card-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: var(--coffee-darkest);
            margin-bottom: 8px;
        }

        .menu-card-desc {
            font-size: 0.83rem;
            color: var(--coffee-mocha);
            line-height: 1.55;
            margin-bottom: 16px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .menu-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .menu-price {
            background: linear-gradient(135deg, var(--coffee-accent), var(--coffee-light));
            color: var(--coffee-darkest);
            padding: 6px 18px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.88rem;
            letter-spacing: 0.02em;
            box-shadow: 0 3px 10px rgba(200,149,66,0.3);
        }

        .menu-card-icon {
            width: 36px; height: 36px;
            background: var(--coffee-cream);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--coffee-accent);
            font-size: 0.9rem;
            transition: background 0.3s ease;
        }

        .menu-card:hover .menu-card-icon {
            background: var(--coffee-accent);
            color: #fff;
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            grid-column: 1/-1;
        }

        .empty-state i {
            font-size: 3rem;
            color: #ddd;
            margin-bottom: 16px;
        }

        .empty-state p {
            color: var(--coffee-mocha);
            font-size: 1rem;
        }

        /* ── FOOTER ── */
        footer {
            background: var(--coffee-darkest);
            color: rgba(255,255,255,0.65);
            padding: 60px 24px 30px;
        }

        .footer-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
        }

        .footer-brand img { height: 52px; margin-bottom: 14px; }

        .footer-brand p {
            font-size: 0.85rem;
            line-height: 1.7;
            color: rgba(255,255,255,0.5);
            max-width: 280px;
        }

        .footer-col h4 {
            color: #fff;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 18px;
        }

        .footer-col p,
        .footer-col a {
            display: block;
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            text-decoration: none;
            margin-bottom: 8px;
            transition: color 0.3s;
        }

        .footer-col a:hover { color: var(--coffee-accent); }

        .footer-socials { display: flex; gap: 12px; margin-top: 10px; }

        .footer-socials a {
            width: 38px; height: 38px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.6);
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 0;
        }

        .footer-socials a:hover {
            background: var(--coffee-accent);
            color: #fff;
        }

        .footer-map iframe {
            border-radius: 12px;
            width: 100%;
            max-width: 320px;
            height: 180px;
            border: 0;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.07);
            padding-top: 24px;
            text-align: center;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.3);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .nav-links { display: none; flex-direction: column; gap: 16px; }
            .nav-links.open {
                display: flex;
                position: fixed;
                top: 72px; left: 0; right: 0;
                background: rgba(18,14,11,0.98);
                padding: 24px;
                z-index: 999;
            }
            .nav-toggle { display: block; }
            .nav-container { grid-template-columns: auto 1fr auto; }
            .nav-links { grid-column: 1/-1; }
            .footer-grid { grid-template-columns: 1fr; gap: 32px; }
            .menu-grid { grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); }
        }
    </style>
</head>

<body>

    <!-- ── NAVBAR ── -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-left">
                <a class="nav-logo" href="{{ url('/') }}">
                    @if ($about->first() && $about->first()->logo)
                        <img src="{{ asset('storage/' . $about->first()->logo) }}" alt="Jokanti Coffee Logo">
                    @else
                        <img src="{{ asset('gambar/jokanti-rmv.png') }}" alt="Jokanti Coffee Logo">
                    @endif
                </a>
            </div>

            <ul class="nav-links" id="navLinks">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/AboutUs') }}">About</a></li>
                <li><a href="{{ url('/menu') }}" class="active">Menu</a></li>
            </ul>

            <div class="nav-right">
                <a href="{{ route('signin') }}" class="btn-login">
                    <i class="fa fa-user" style="margin-right:6px;"></i> Login
                </a>
                <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- ── PAGE HERO ── -->
    <section class="page-hero">
        <div class="page-hero-badge">
            <i class="fa fa-coffee"></i> Specialty Coffee
        </div>
        <h1>Menu <span>Kami</span></h1>
        <p>Temukan minuman favorit Anda dari pilihan kopi specialty dan non-kopi terbaik kami.</p>
    </section>
    <div class="divider-wave"></div>

    <!-- ── MENU SECTION ── -->
    <section class="menu-section">
        <div class="section-header">
            <span class="label">✦ Pilihan Terbaik</span>
            <h2>Semua Menu</h2>
        </div>

        <!-- Category Filter Tabs -->
        <div class="category-tabs" id="categoryTabs">
            <button class="tab-btn active" data-category="all">Semua</button>
        </div>

        <!-- Menu Grid -->
        <div class="menu-grid" id="menuGrid">
            @forelse ($product as $item)
                <div class="menu-card" data-category="{{ strtolower($item->kategori ?? 'all') }}">
                    <div class="menu-card-img-wrapper">
                        <img
                            class="menu-card-img"
                            src="{{ Storage::url($item->gambar) }}"
                            alt="{{ $item->judul }}"
                            loading="lazy"
                        >
                    </div>
                    <div class="menu-card-body">
                        <h3 class="menu-card-title">{{ $item->judul }}</h3>
                        <p class="menu-card-desc">{{ $item->deskripsi }}</p>
                        <div class="menu-card-footer">
                            <span class="menu-price">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                            <div class="menu-card-icon">
                                <i class="fa fa-coffee"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fa fa-mug-hot"></i>
                    <p>Menu belum tersedia. Silakan cek kembali nanti.</p>
                </div>
            @endforelse
        </div>
    </section>

    <!-- ── FOOTER ── -->
    <footer>
        <div class="footer-inner">
            <div class="footer-grid">
                <div class="footer-brand">
                    @if ($about->first() && $about->first()->logo)
                        <img src="{{ asset('storage/' . $about->first()->logo) }}" alt="Logo">
                    @else
                        <img src="{{ asset('gambar/jokanti-rmv.png') }}" alt="Logo">
                    @endif
                    <p>Jokanti Coffee Roasters — specialty coffee dengan cita rasa pilihan dari biji kopi terbaik Nusantara.</p>
                </div>
                <div class="footer-col">
                    <h4>Navigasi</h4>
                    <a href="{{ url('/') }}">Home</a>
                    <a href="{{ url('/AboutUs') }}">About Us</a>
                    <a href="{{ url('/menu') }}">Menu</a>
                </div>
                <div class="footer-col">
                    <h4>Lokasi</h4>
                    <div class="footer-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d312.19039293984684!2d101.42153290699869!3d0.5701994403556715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab41cb4627d3%3A0x2855765c864e40b6!2sJokanti%20Coffee%20Roasters!5e0!3m2!1sen!2sid!4v1734430036381!5m2!1sen!2sid"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <p style="margin-top:12px; font-size:0.8rem;">Jokanti@gmail.com</p>
                    <div class="footer-socials">
                        @if ($about && $about->first())
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
                &copy; {{ date('Y') }} Jokanti Coffee Roasters. All Rights Reserved.
            </div>
        </div>
    </footer>

    <script>
        // Mobile nav toggle
        const toggle = document.getElementById('navToggle');
        const navLinks = document.getElementById('navLinks');
        toggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            document.querySelector('.navbar').classList.toggle('scrolled', window.scrollY > 50);
        });

        // Dynamically build category tabs from product data
        const cards = document.querySelectorAll('.menu-card[data-category]');
        const categories = new Set();
        cards.forEach(c => {
            const cat = c.getAttribute('data-category');
            if (cat && cat !== '' && cat !== 'all') categories.add(cat);
        });

        const tabContainer = document.getElementById('categoryTabs');
        categories.forEach(cat => {
            const btn = document.createElement('button');
            btn.className = 'tab-btn';
            btn.dataset.category = cat;
            btn.textContent = cat.charAt(0).toUpperCase() + cat.slice(1);
            tabContainer.appendChild(btn);
        });

        // Category filter logic
        tabContainer.addEventListener('click', e => {
            const btn = e.target.closest('.tab-btn');
            if (!btn) return;
            tabContainer.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const selected = btn.dataset.category;
            cards.forEach(card => {
                const match = selected === 'all' || card.dataset.category === selected;
                card.style.display = match ? 'block' : 'none';
            });
        });
    </script>
</body>

</html>
