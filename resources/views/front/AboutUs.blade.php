<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Tentang Jokanti Coffee — Specialty coffee roasters dengan cita rasa hangat dan autentik.">
    <title>Tentang Kami | Jokanti Coffee</title>
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
            line-height: 1.7;
            color: #333;
            background: var(--coffee-cream);
        }

        /* ─── NAVBAR ─── */
        .navbar {
            position: fixed;
            top: 0; width: 100%;
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

        .nav-logo img {
            height: 52px; width: auto;
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

        /* ─── PAGE HERO ─── */
        .page-hero {
            background: linear-gradient(160deg, var(--coffee-darkest) 0%, #2B1B17 60%, #3D2314 100%);
            padding: 150px 24px 80px;
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

        .page-hero::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 80px;
            background: linear-gradient(to top, var(--coffee-cream), transparent);
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
            position: relative;
            z-index: 1;
        }

        .page-hero h1 {
            font-size: clamp(2rem, 5vw, 3.4rem);
            font-weight: 700;
            color: #fff;
            margin-bottom: 14px;
            position: relative;
            z-index: 1;
        }

        .page-hero h1 span { color: var(--coffee-accent); }

        .page-hero p {
            color: rgba(255,255,255,0.55);
            font-size: 1rem;
            max-width: 520px;
            margin: 0 auto;
            position: relative;
            z-index: 1;
        }

        /* ─── STORY SECTION ─── */
        .story {
            padding: 100px 24px;
        }

        .story-grid {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 72px;
            align-items: center;
        }

        .story-image-wrap {
            position: relative;
        }

        .story-image-wrap::before {
            content: '';
            position: absolute;
            top: -16px; left: -16px;
            right: 16px; bottom: 16px;
            border: 2px solid var(--coffee-border);
            border-radius: 28px;
            z-index: 0;
        }

        .story-image {
            border-radius: 22px;
            overflow: hidden;
            box-shadow: 0 30px 70px rgba(18,14,11,0.18);
            position: relative;
            z-index: 1;
        }

        .story-image img {
            width: 100%;
            height: 460px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .story-image:hover img { transform: scale(1.03); }

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

        .story-text {
            color: var(--coffee-mocha);
            font-size: 0.95rem;
            line-height: 1.85;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        /* ─── VALUES / PILLARS ─── */
        .values {
            padding: 80px 24px;
            background: var(--coffee-darkest);
        }

        .values-inner {
            max-width: 1100px;
            margin: 0 auto;
        }

        .values-head {
            text-align: center;
            margin-bottom: 56px;
        }

        .values-head .section-label { margin-bottom: 12px; }

        .values-head h2 {
            font-size: clamp(1.6rem, 3.5vw, 2.4rem);
            font-weight: 700;
            color: #fff;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
        }

        .value-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid var(--coffee-border);
            border-radius: 18px;
            padding: 36px 28px;
            text-align: center;
            transition: all 0.35s ease;
        }

        .value-card:hover {
            background: rgba(200,149,66,0.07);
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.3);
        }

        .value-icon {
            width: 60px; height: 60px;
            background: rgba(200,149,66,0.12);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.4rem;
            color: var(--coffee-accent);
            border: 1px solid var(--coffee-border);
        }

        .value-title {
            font-size: 1rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
        }

        .value-desc {
            font-size: 0.83rem;
            color: rgba(255,255,255,0.45);
            line-height: 1.65;
        }

        /* ─── DELIVERY SECTION ─── */
        .delivery {
            padding: 90px 24px;
            background: #fff;
        }

        .section-head {
            text-align: center;
            margin-bottom: 52px;
        }

        .section-sub {
            color: var(--coffee-mocha);
            font-size: 0.95rem;
            margin-top: 10px;
        }

        .delivery-grid {
            max-width: 960px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .delivery-card {
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 10px 32px rgba(18,14,11,0.1);
            transition: all 0.35s ease;
            display: block;
            background: var(--coffee-cream);
            border: 1px solid rgba(200,149,66,0.1);
        }

        .delivery-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 22px 50px rgba(18,14,11,0.16);
        }

        .delivery-card img {
            width: 100%;
            height: 120px;
            display: block;
            object-fit: contain;
            padding: 16px;
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
            width: 100%; height: 100%;
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
            .story-grid { grid-template-columns: 1fr; gap: 48px; }
            .story-image-wrap::before { display: none; }
            .story-image img { height: 360px; }
            .values-grid { grid-template-columns: 1fr; gap: 16px; }
            .delivery-grid { grid-template-columns: 1fr 1fr; }
            .footer-grid { grid-template-columns: 1fr; gap: 36px; }
        }

        @media (max-width: 640px) {
            .delivery-grid { grid-template-columns: 1fr; }
            .story-image img { height: 300px; }
        }
    </style>
</head>

<body>
    <!-- ── NAVBAR ── -->
    <nav class="navbar">
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
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="{{ url('/AboutUs') }}" class="active">About</a></li>
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

    <!-- ── PAGE HERO ── -->
    <header class="page-hero">
        <div class="page-hero-badge">
            <i class="fa fa-mug-hot"></i> Our Story
        </div>
        <h1>Tentang <span>Jokanti Coffee</span></h1>
        <p>Hangat, autentik, dan penuh cinta — begitulah kami meracik setiap cangkir untuk Anda.</p>
    </header>

    <!-- ── STORY SECTION ── -->
    <section class="story">
        <div class="story-grid">
            <div class="story-image-wrap">
                <div class="story-image">
                    @if (isset($about) && $about->isNotEmpty())
                        @php $aboutData = $about->first(); @endphp
                        @if (!empty($aboutData->gambar) && file_exists(public_path('storage/' . $aboutData->gambar)))
                            <img src="{{ asset('storage/' . $aboutData->gambar) }}" alt="Cerita Jokanti Coffee">
                        @else
                            <img src="{{ asset('img/header1.jpg') }}" alt="Cerita Jokanti Coffee">
                        @endif
                    @else
                        <img src="{{ asset('img/header1.jpg') }}" alt="Cerita Jokanti Coffee">
                    @endif
                </div>
            </div>

            <div>
                <span class="section-label">✦ Siapa Kami</span>
                <h2 class="section-title">Hangat, Autentik, Berkesan</h2>
                <div class="story-text">
                    @if (isset($about) && $about->isNotEmpty())
                        @php $aboutData = $about->first(); @endphp
                        <p>{{ $aboutData->isi ?? 'Jokanti Coffee lahir dari kecintaan terhadap kopi dan keinginan untuk menciptakan ruang hangat tempat orang bisa berbagi cerita. Kami memilih biji kopi berkualitas, meraciknya dengan presisi, dan menyajikannya dengan hati.' }}</p>
                    @else
                        <p>Jokanti Coffee lahir dari kecintaan terhadap kopi dan keinginan untuk menciptakan ruang hangat tempat orang bisa berbagi cerita. Kami memilih biji kopi berkualitas, meraciknya dengan presisi, dan menyajikannya dengan hati.</p>
                    @endif
                    <p>Setiap kunjungan adalah kesempatan bagi kami untuk menghadirkan kenyamanan, kehangatan, dan secangkir kopi yang layak jadi bagian dari hari kamu.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── VALUES SECTION ── -->
    <section class="values">
        <div class="values-inner">
            <div class="values-head">
                <span class="section-label">✦ Nilai Kami</span>
                <h2>Mengapa Memilih Kami?</h2>
            </div>
            <div class="values-grid">
                <div class="value-card">
                    <div class="value-icon"><i class="fa fa-leaf"></i></div>
                    <h3 class="value-title">Biji Kopi Pilihan</h3>
                    <p class="value-desc">Kami hanya menggunakan biji kopi premium dari petani lokal terpercaya yang dipilih dengan ketat.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="fa fa-heart"></i></div>
                    <h3 class="value-title">Diracik dengan Hati</h3>
                    <p class="value-desc">Setiap cangkir dibuat dengan penuh perhatian dan konsistensi oleh barista berpengalaman kami.</p>
                </div>
                <div class="value-card">
                    <div class="value-icon"><i class="fa fa-users"></i></div>
                    <h3 class="value-title">Komunitas Hangat</h3>
                    <p class="value-desc">Kami percaya bahwa kopi adalah jembatan yang menghubungkan orang-orang dalam kehangatan.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── DELIVERY SECTION ── -->
    <section class="delivery">
        <div class="section-head">
            <span class="section-label">✦ Pesan Online</span>
            <h2 class="section-title">Yuk Order Delivery</h2>
            <p class="section-sub">Nikmati Jokanti Coffee langsung dari rumah atau kantor kamu</p>
        </div>

        <div class="delivery-grid">
            @if (isset($about) && $about->first() && $about->first()->grabfood)
                <a href="{{ $about->first()->grabfood }}" target="_blank" class="delivery-card">
                    <img src="{{ asset('img/grabfood.png') }}" alt="Pesan di GrabFood">
                </a>
            @endif
            @if (isset($about) && $about->first() && $about->first()->gofood)
                <a href="{{ $about->first()->gofood }}" target="_blank" class="delivery-card">
                    <img src="{{ asset('img/gofood.png') }}" alt="Pesan di GoFood">
                </a>
            @endif
            @if (isset($about) && $about->first() && $about->first()->shopeefood)
                <a href="{{ $about->first()->shopeefood }}" target="_blank" class="delivery-card">
                    <img src="{{ asset('img/shopeefood.png') }}" alt="Pesan di ShopeeFood">
                </a>
            @elseif (isset($about) && $about->first() && $about->first()->tokopedia)
                <a href="{{ $about->first()->tokopedia }}" target="_blank" class="delivery-card">
                    <img src="{{ asset('img/tokopedia.png') }}" alt="Pesan di Tokopedia">
                </a>
            @endif
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
        // Mobile nav toggle
        document.getElementById('navToggle').addEventListener('click', () => {
            document.getElementById('navLinks').classList.toggle('open');
        });
    </script>
</body>

</html>
