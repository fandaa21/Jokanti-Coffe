<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login ke akun Jokanti Coffee Anda.">
    <title>Masuk | Jokanti Coffee</title>
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
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--coffee-darkest);
            position: relative;
            overflow: hidden;
        }

        /* Ambient background blobs */
        body::before {
            content: '';
            position: fixed;
            top: -30%;
            left: -20%;
            width: 700px;
            height: 700px;
            background: radial-gradient(circle, rgba(200,149,66,0.07) 0%, transparent 70%);
            pointer-events: none;
        }

        body::after {
            content: '';
            position: fixed;
            bottom: -30%;
            right: -20%;
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(200,149,66,0.05) 0%, transparent 70%);
            pointer-events: none;
        }

        /* ── CARD ── */
        .auth-wrapper {
            width: 100%;
            max-width: 440px;
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .auth-card {
            background: rgba(28, 22, 18, 0.92);
            border: 1px solid rgba(200, 149, 66, 0.15);
            border-radius: 24px;
            padding: 44px 40px;
            box-shadow:
                0 24px 60px rgba(0,0,0,0.5),
                0 0 0 1px rgba(255,255,255,0.03) inset;
            backdrop-filter: blur(20px);
        }

        /* Logo */
        .auth-logo {
            text-align: center;
            margin-bottom: 28px;
        }

        .auth-logo img {
            height: 56px;
            width: auto;
            object-fit: contain;
            filter: brightness(1.1);
        }

        /* Heading */
        .auth-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .auth-badge {
            display: inline-block;
            background: rgba(200,149,66,0.12);
            border: 1px solid rgba(200,149,66,0.25);
            color: var(--coffee-accent);
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 5px 16px;
            border-radius: 50px;
            margin-bottom: 14px;
        }

        .auth-header h1 {
            font-size: 1.65rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 6px;
        }

        .auth-header p {
            color: rgba(255,255,255,0.4);
            font-size: 0.85rem;
        }

        /* Form */
        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            color: rgba(255,255,255,0.6);
            font-size: 0.78rem;
            font-weight: 500;
            margin-bottom: 8px;
            letter-spacing: 0.03em;
            text-transform: uppercase;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255,255,255,0.3);
            font-size: 0.9rem;
            pointer-events: none;
        }

        .form-group input {
            width: 100%;
            padding: 13px 16px 13px 44px;
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 12px;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            outline: none;
        }

        .form-group input::placeholder { color: rgba(255,255,255,0.25); }

        .form-group input:focus {
            border-color: var(--coffee-accent);
            background: rgba(200,149,66,0.06);
            box-shadow: 0 0 0 4px rgba(200,149,66,0.1);
        }

        /* Submit button */
        .btn-submit {
            display: block;
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--coffee-accent), var(--coffee-light));
            color: var(--coffee-darkest);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            margin-top: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(200,149,66,0.35);
            letter-spacing: 0.03em;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 28px rgba(200,149,66,0.5);
        }

        .btn-submit:active { transform: translateY(0); }

        /* Divider */
        .auth-divider {
            text-align: center;
            margin: 24px 0 18px;
            position: relative;
        }

        .auth-divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0; right: 0;
            height: 1px;
            background: rgba(255,255,255,0.08);
        }

        .auth-divider span {
            position: relative;
            background: rgba(28,22,18,0.95);
            color: rgba(255,255,255,0.3);
            font-size: 0.78rem;
            padding: 0 14px;
        }

        /* Footer link */
        .auth-footer {
            text-align: center;
            color: rgba(255,255,255,0.4);
            font-size: 0.83rem;
        }

        .auth-footer a {
            color: var(--coffee-accent);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .auth-footer a:hover { color: var(--coffee-light); }

        /* Back to home */
        .back-link {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 20px;
            color: rgba(255,255,255,0.3);
            font-size: 0.8rem;
            text-decoration: none;
            transition: color 0.3s;
        }

        .back-link:hover { color: rgba(255,255,255,0.6); }

        /* Error/Alert */
        .alert {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.3);
            color: #f87171;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.82rem;
            margin-bottom: 18px;
        }
    </style>
</head>
<body>
    <div class="auth-wrapper">
        <div class="auth-card">
            <!-- Logo -->
            <div class="auth-logo">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('gambar/jokanti-rmv.png') }}" alt="Jokanti Coffee">
                </a>
            </div>

            <!-- Header -->
            <div class="auth-header">
                <span class="auth-badge"><i class="fa fa-coffee"></i> Member Login</span>
                <h1>Selamat Datang</h1>
                <p>Masuk untuk melanjutkan ke akun Anda</p>
            </div>

            <!-- Errors -->
            @if ($errors->any())
                <div class="alert">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fa fa-envelope"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="nama@email.com"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fa fa-lock"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            autocomplete="current-password"
                        >
                    </div>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fa fa-arrow-right-to-bracket" style="margin-right:8px;"></i> Masuk
                </button>
            </form>

            <div class="auth-divider"><span>atau</span></div>

            <p class="auth-footer">
                Belum punya akun? <a href="{{ route('signup') }}">Daftar sekarang</a>
            </p>
        </div>

        <a href="{{ url('/') }}" class="back-link">
            <i class="fa fa-arrow-left"></i> Kembali ke Beranda
        </a>
    </div>
</body>
</html>
