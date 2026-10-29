<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin | Jokanti Coffee')</title>
    <link rel="icon" type="image/png" href="{{ asset('gambar/jokanti-rmv.png') }}">

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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

        * { box-sizing: border-box; }

        body {
            font-family: 'Poppins', sans-serif;
            background: #F0EDE8;
            color: #333;
            min-height: 100vh;
        }

        /* ── TOPBAR ── */
        .admin-topbar {
            background: var(--coffee-darkest);
            border-bottom: 1px solid rgba(200,149,66,0.15);
            padding: 0 24px;
            height: 62px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 16px rgba(0,0,0,0.3);
        }

        .topbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }

        .topbar-brand img {
            height: 38px;
            width: auto;
            object-fit: contain;
        }

        .topbar-brand span {
            color: #fff;
            font-weight: 600;
            font-size: 0.95rem;
            letter-spacing: 0.02em;
        }

        .topbar-brand span em {
            color: var(--coffee-accent);
            font-style: normal;
        }

        .topbar-nav {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .topbar-nav a {
            color: rgba(255,255,255,0.65);
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 500;
            letter-spacing: 0.04em;
            text-transform: uppercase;
            padding: 7px 16px;
            border-radius: 8px;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .topbar-nav a:hover {
            color: #fff;
            background: rgba(255,255,255,0.06);
        }

        .topbar-nav a.active {
            color: var(--coffee-accent);
            background: rgba(200,149,66,0.1);
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            color: rgba(255,255,255,0.7);
            font-size: 0.83rem;
        }

        .user-avatar {
            width: 32px; height: 32px;
            background: var(--coffee-accent);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--coffee-darkest);
            font-weight: 700;
            font-size: 0.78rem;
        }

        .btn-logout {
            background: rgba(200,149,66,0.15);
            border: 1px solid var(--coffee-border);
            color: var(--coffee-accent);
            padding: 6px 16px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
        }

        .btn-logout:hover {
            background: rgba(200,149,66,0.25);
            color: var(--coffee-light);
        }

        /* ── PAGE WRAPPER ── */
        .admin-content {
            max-width: 1300px;
            margin: 32px auto;
            padding: 0 24px 60px;
        }

        /* ── CARDS ── */
        .card {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.06);
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .card-header {
            background: linear-gradient(135deg, var(--coffee-darkest), var(--coffee-dark));
            padding: 18px 24px;
            border-bottom: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header h2,
        .card-header h3 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
        }

        .card-body {
            padding: 24px;
        }

        /* ── TABLE ── */
        .table {
            font-size: 0.88rem;
            margin-bottom: 0;
        }

        .table thead th {
            background: var(--coffee-cream);
            color: var(--coffee-darkest);
            font-weight: 600;
            font-size: 0.78rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-bottom: 2px solid rgba(200,149,66,0.2);
            padding: 12px 14px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 12px 14px;
            vertical-align: middle;
            border-bottom: 1px solid rgba(0,0,0,0.04);
            color: #444;
        }

        .table tbody tr:last-child td { border-bottom: none; }

        .table tbody tr:hover td { background: rgba(250,247,242,0.6); }

        .table-img {
            width: 64px;
            height: 64px;
            object-fit: cover;
            border-radius: 10px;
            border: 2px solid rgba(200,149,66,0.15);
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }

        /* ── BUTTONS ── */
        .btn-admin-primary {
            background: linear-gradient(135deg, var(--coffee-accent), var(--coffee-light));
            color: var(--coffee-darkest);
            border: none;
            padding: 9px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.83rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(200,149,66,0.25);
        }

        .btn-admin-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(200,149,66,0.4);
            color: var(--coffee-darkest);
        }

        .btn-sm-edit {
            background: rgba(59,130,246,0.1);
            border: 1px solid rgba(59,130,246,0.25);
            color: #3b82f6;
            padding: 5px 14px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: all 0.2s;
        }

        .btn-sm-edit:hover {
            background: rgba(59,130,246,0.2);
            color: #2563eb;
        }

        .btn-sm-delete {
            background: rgba(239,68,68,0.1);
            border: 1px solid rgba(239,68,68,0.25);
            color: #ef4444;
            padding: 5px 14px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            transition: all 0.2s;
        }

        .btn-sm-delete:hover {
            background: rgba(239,68,68,0.18);
            color: #dc2626;
        }

        /* ── ALERTS ── */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 12px 18px;
            font-size: 0.88rem;
            margin-bottom: 18px;
        }

        .alert-success {
            background: rgba(34,197,94,0.1);
            border-left: 4px solid #22c55e;
            color: #15803d;
        }

        .alert-danger {
            background: rgba(239,68,68,0.1);
            border-left: 4px solid #ef4444;
            color: #dc2626;
        }

        .alert-info {
            background: rgba(59,130,246,0.08);
            border-left: 4px solid #3b82f6;
            color: #2563eb;
        }

        .alert-warning {
            background: rgba(200,149,66,0.1);
            border-left: 4px solid var(--coffee-accent);
            color: #92400e;
        }

        /* ── FORMS ── */
        .form-label {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--coffee-darkest);
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-bottom: 6px;
        }

        .form-control, .form-select {
            border: 1.5px solid #e5e0db;
            border-radius: 10px;
            padding: 10px 14px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.88rem;
            transition: all 0.25s ease;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--coffee-accent);
            box-shadow: 0 0 0 4px rgba(200,149,66,0.12);
        }

        /* ── BADGE ── */
        .badge-role {
            padding: 4px 12px;
            border-radius: 50px;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.04em;
        }

        .badge-admin {
            background: rgba(200,149,66,0.12);
            color: var(--coffee-accent);
            border: 1px solid var(--coffee-border);
        }

        .badge-super {
            background: rgba(239,68,68,0.1);
            color: #dc2626;
            border: 1px solid rgba(239,68,68,0.2);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 768px) {
            .topbar-nav { display: none; }
            .admin-content { padding: 0 16px 40px; margin-top: 20px; }
        }
    </style>

    @yield('extra_css')
</head>
<body>
    <!-- ── TOPBAR ── -->
    <div class="admin-topbar">
        <a href="{{ route('dashboard') }}" class="topbar-brand">
            <img src="{{ asset('gambar/jokanti-rmv.png') }}" alt="Logo">
            <span>Jokanti <em>Admin</em></span>
        </a>

        <nav class="topbar-nav">
            <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa fa-gauge-high"></i> Dashboard
            </a>
            @if(auth()->check() && (auth()->user()->isAdmin() || auth()->user()->isSuperAdmin()))
                <a href="{{ route('about.index') }}" class="{{ request()->routeIs('about.*') ? 'active' : '' }}">
                    <i class="fa fa-circle-info"></i> About
                </a>
                <a href="{{ route('product.index') }}" class="{{ request()->routeIs('product.*') ? 'active' : '' }}">
                    <i class="fa fa-mug-hot"></i> Produk
                </a>
                <a href="{{ route('ulasan.index') }}" class="{{ request()->routeIs('ulasan.*') ? 'active' : '' }}">
                    <i class="fa fa-star"></i> Ulasan
                </a>
            @endif
        </nav>

        <div class="topbar-right">
            @auth
                <div class="user-pill">
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <span>{{ auth()->user()->name }}</span>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fa fa-right-from-bracket"></i> Keluar
                    </button>
                </form>
            @endauth
        </div>
    </div>

    <!-- ── CONTENT ── -->
    <div class="admin-content">
        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('extra_js')
</body>
</html>
