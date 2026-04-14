<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ASRI — @yield('title', 'Portal Hunian')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        /* ─── Reset & Base ─── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { height: 100%; font-size: 16px; }
        body {
            font-family: 'Outfit', sans-serif;
            background: #f7f2e8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        /* ─── Color Tokens ─── */
        :root {
            --g900: #112218;
            --g800: #1a3828;
            --g700: #23503a;
            --g600: #2d6a4f;
            --g500: #40916c;
            --g400: #74c69d;
            --g300: #b7e4c7;
            --g100: #d8f3dc;
            --g50:  #f0faf2;
            --c50:  #fdfbf7;
            --c100: #f7f2e8;
            --c200: #ede4d0;
            --c300: #dfd3b8;
            --c400: #cfc0a0;
            --ink:  #1a1a18;
            --ink2: #3d3d38;
            --ink3: #6b6b64;
            --ink4: #9a9a92;
        }

        /* ─── Page Shell ─── */
        .auth-shell {
            width: 100%;
            max-width: 960px;
            min-height: 580px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(17,34,24,.25), 0 4px 16px rgba(0,0,0,.08);
        }

        /* ─── Left Panel ─── */
        .auth-left {
            background: var(--g900);
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
            overflow: hidden;
        }
        .auth-left::before {
            content: '';
            position: absolute;
            width: 380px; height: 380px;
            border-radius: 50%;
            border: 1px solid rgba(116,198,157,.09);
            top: -100px; left: -100px;
            pointer-events: none;
        }
        .auth-left::after {
            content: '';
            position: absolute;
            width: 260px; height: 260px;
            border-radius: 50%;
            border: 1px solid rgba(116,198,157,.06);
            bottom: -60px; right: -80px;
            pointer-events: none;
        }
        .left-inner { position: relative; z-index: 1; display: flex; flex-direction: column; height: 100%; justify-content: space-between; }

        /* Brand */
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .brand-icon {
            width: 38px; height: 38px;
            border-radius: 10px;
            background: var(--g600);
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
        }
        .brand-icon svg { width: 20px; height: 20px; stroke: #fff; fill: none; stroke-width: 1.8; }
        .brand-text .name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px; font-weight: 600;
            color: #fff; line-height: 1;
            letter-spacing: .5px;
        }
        .brand-text .tagline {
            font-size: 9px; color: rgba(255,255,255,.3);
            text-transform: uppercase; letter-spacing: 2.5px;
            margin-top: 3px;
        }

        /* Hero copy */
        .left-hero { flex: 1; display: flex; flex-direction: column; justify-content: center; padding: 2rem 0; }
        .hero-eyebrow {
            font-size: 10px; letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--g400);
            margin-bottom: 14px;
            display: flex; align-items: center; gap: 8px;
        }
        .hero-eyebrow::before {
            content: ''; display: block;
            width: 24px; height: 1px;
            background: var(--g400);
        }
        .hero-heading {
            font-family: 'Cormorant Garamond', serif;
            font-size: 38px; font-weight: 500;
            color: #fff; line-height: 1.18;
            margin-bottom: 16px;
        }
        .hero-heading em {
            color: var(--g400);
            font-style: italic;
        }
        .hero-body {
            font-size: 13px;
            color: rgba(255,255,255,.38);
            line-height: 1.75;
            max-width: 280px;
        }

        /* Feature list */
        .left-features { padding-bottom: .5rem; }
        .feature-item {
            display: flex; align-items: center; gap: 10px;
            margin-bottom: 11px;
        }
        .feature-pip {
            width: 5px; height: 5px;
            border-radius: 50%;
            background: var(--g400);
            flex-shrink: 0;
            opacity: .8;
        }
        .feature-label {
            font-size: 12px;
            color: rgba(255,255,255,.38);
            line-height: 1.4;
        }

        /* ─── Right Panel ─── */
        .auth-right {
            background: var(--c50);
            padding: 3rem 2.75rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Tab switch */
        .tab-bar {
            display: flex;
            background: var(--c200);
            border-radius: 11px;
            padding: 3px;
            gap: 2px;
            margin-bottom: 2rem;
        }
        .tab-btn {
            flex: 1; padding: 9px 0;
            border: none; border-radius: 8px;
            font-size: 13px; font-weight: 500;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            transition: all .2s ease;
            background: transparent;
            color: var(--ink3);
        }
        .tab-btn.active {
            background: #fff;
            color: var(--g700);
            box-shadow: 0 1px 4px rgba(0,0,0,.1);
        }

        /* Form typography */
        .form-heading {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px; font-weight: 500;
            color: var(--ink);
            margin-bottom: 4px;
        }
        .form-sub {
            font-size: 12.5px;
            color: var(--ink3);
            margin-bottom: 1.75rem;
            line-height: 1.5;
        }

        /* Alert */
        .alert {
            padding: .65rem .9rem;
            border-radius: 8px;
            font-size: 12px;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }
        .alert-success {
            background: var(--g50);
            border: 1px solid var(--g100);
            color: var(--g700);
        }

        /* Fields */
        .field-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .field { margin-bottom: 14px; }
        .field label {
            display: block;
            font-size: 11px; font-weight: 500;
            color: var(--ink2);
            margin-bottom: 6px;
            letter-spacing: .4px;
        }
        .field label .req { color: #c0392b; margin-left: 1px; }
        .field input {
            width: 100%;
            padding: 10px 13px;
            border: 1px solid var(--c300);
            border-radius: 9px;
            font-size: 13px; font-family: 'Outfit', sans-serif;
            color: var(--ink);
            background: #fff;
            outline: none;
            transition: border-color .18s, box-shadow .18s;
            -webkit-appearance: none;
        }
        .field input:hover { border-color: var(--c400); }
        .field input:focus {
            border-color: var(--g500);
            box-shadow: 0 0 0 3px rgba(64,145,108,.12);
        }
        .field input.invalid {
            border-color: #f87171;
            box-shadow: 0 0 0 3px rgba(248,113,113,.1);
        }
        .field input::placeholder { color: var(--ink4); }
        .field-hint {
            font-size: 10.5px;
            color: var(--ink4);
            margin-top: 4px;
            line-height: 1.4;
        }
        .field-error {
            font-size: 11px;
            color: #dc2626;
            margin-top: 4px;
        }

        /* Remember row */
        .remember-row {
            display: flex; align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }
        .remember-row label {
            display: flex; align-items: center; gap: 6px;
            font-size: 12px; color: var(--ink3); cursor: pointer;
        }
        .remember-row label input[type="checkbox"] { accent-color: var(--g600); }
        .link-muted {
            font-size: 12px;
            color: var(--g600);
            text-decoration: none;
            font-weight: 500;
        }
        .link-muted:hover { text-decoration: underline; }

        /* Buttons */
        .btn-submit {
            width: 100%;
            padding: 11px;
            background: var(--g700);
            color: #fff;
            border: none;
            border-radius: 10px;
            font-size: 14px; font-weight: 500;
            font-family: 'Outfit', sans-serif;
            cursor: pointer;
            letter-spacing: .3px;
            transition: background .18s, transform .1s;
        }
        .btn-submit:hover { background: var(--g800); }
        .btn-submit:active { transform: scale(.99); }

        .divider {
            display: flex; align-items: center; gap: 12px;
            margin: 16px 0;
            font-size: 11px; color: var(--ink4);
        }
        .divider::before, .divider::after {
            content: ''; flex: 1;
            height: 1px; background: var(--c200);
        }

        .btn-google {
            width: 100%;
            padding: 10px;
            background: #fff;
            border: 1px solid var(--c300);
            border-radius: 10px;
            font-size: 13px;
            font-family: 'Outfit', sans-serif;
            color: var(--ink2);
            cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 9px;
            text-decoration: none;
            transition: border-color .18s, background .18s;
        }
        .btn-google:hover {
            border-color: var(--g400);
            background: #fafafa;
        }
        .btn-google svg { width: 17px; height: 17px; flex-shrink: 0; }

        /* Footer */
        .auth-foot {
            text-align: center;
            font-size: 12px;
            color: var(--ink3);
            margin-top: 16px;
        }
        .auth-foot a {
            color: var(--g600);
            font-weight: 500;
            text-decoration: none;
        }
        .auth-foot a:hover { text-decoration: underline; }

        /* Panel visibility */
        .panel { display: none; }
        .panel.active { display: block; }

        /* ─── Responsive ─── */
        @media (max-width: 700px) {
            body { padding: 0; align-items: stretch; }
            .auth-shell {
                grid-template-columns: 1fr;
                border-radius: 0;
                min-height: 100vh;
                box-shadow: none;
            }
            .auth-left { display: none; }
            .auth-right { padding: 2.5rem 1.75rem; justify-content: flex-start; padding-top: 3rem; }
        }
    </style>
</head>
<body>
<div class="auth-shell">

    {{-- ── Left Decorative Panel ── --}}
    <div class="auth-left">
        <div class="left-inner">
            <div class="brand">
                <div class="brand-icon">
                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <div class="name">ASRI</div>
                    <div class="tagline">Sistem Rusun Digital</div>
                </div>
            </div>

            <div class="left-hero">
                <div class="hero-eyebrow">Portal Hunian</div>
                <h1 class="hero-heading">
                    Hunian nyaman,<br>
                    proses yang <em>transparan</em>
                </h1>
                <p class="hero-body">
                    Daftarkan diri, pantau status pengajuan, dan kelola hunian Anda dalam satu platform terintegrasi.
                </p>
            </div>

            <div class="left-features">
                @foreach([
                    'Pendaftaran online tanpa antre',
                    'Monitoring status pengajuan real-time',
                    'Tagihan & pembayaran digital',
                    'Pusat bantuan terintegrasi',
                ] as $f)
                <div class="feature-item">
                    <div class="feature-pip"></div>
                    <div class="feature-label">{{ $f }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── Right Form Panel ── --}}
    <div class="auth-right">
        @yield('auth-content')
    </div>

</div>

<script>
function switchTab(tab) {
    document.querySelectorAll('.tab-btn').forEach(b => {
        b.classList.toggle('active', b.dataset.tab === tab);
    });
    document.querySelectorAll('.panel').forEach(p => {
        p.classList.toggle('active', p.id === 'panel-' + tab);
    });
}
</script>
@stack('scripts')
</body>
</html>
