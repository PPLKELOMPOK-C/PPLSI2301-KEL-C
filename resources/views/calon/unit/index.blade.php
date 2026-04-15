<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBI-07 - Daftar Rusun</title>
    <style>
        :root {
            --green-900: #07281c;
            --green-800: #0d3927;
            --green-700: #164a32;
            --green-600: #1f5f40;
            --green-500: #2f7a54;
            --green-400: #4a9a70;
            --cream-50: #fbf8f2;
            --cream-100: #f5efe4;
            --cream-200: #e8ddc9;
            --cream-300: #d8ccb5;
            --white: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --blue: #4a90e2;
            --red: #c0392b;
            --shadow-sm: 0 10px 24px rgba(15, 23, 42, 0.08);
            --shadow-md: 0 18px 50px rgba(15, 23, 42, 0.10);
            --shadow-lg: 0 28px 70px rgba(15, 23, 42, 0.16);
            --radius-xl: 28px;
            --radius-lg: 22px;
            --radius-md: 16px;
            --radius-sm: 12px;
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Inter, Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(31, 95, 64, 0.05), transparent 30%),
                linear-gradient(180deg, #f8f4ec 0%, #f5efe3 100%);
            color: var(--text);
        }

        .page {
            max-width: 1220px;
            margin: 0 auto;
            padding: 26px 20px 50px;
            animation: fadePage 0.6s ease;
        }

        @keyframes fadePage {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero {
            position: relative;
            overflow: hidden;
            background:
                radial-gradient(circle at top left, rgba(138, 199, 163, 0.22), transparent 22%),
                radial-gradient(circle at bottom right, rgba(138, 199, 163, 0.12), transparent 26%),
                linear-gradient(135deg, var(--green-900), var(--green-700));
            border-radius: var(--radius-xl);
            color: white;
            padding: 30px 30px 34px;
            box-shadow: var(--shadow-lg);
            margin-bottom: 26px;
        }

        .hero::before,
        .hero::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            border: 1px solid rgba(255,255,255,0.08);
            pointer-events: none;
        }

        .hero::before {
            width: 280px;
            height: 280px;
            right: -70px;
            top: -80px;
        }

        .hero::after {
            width: 240px;
            height: 240px;
            left: -90px;
            bottom: -120px;
        }

        .hero-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 28px;
            position: relative;
            z-index: 2;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: rgba(255,255,255,0.10);
            backdrop-filter: blur(6px);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            flex-shrink: 0;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.08);
        }

        .brand-icon img {
            width: 36px;
            height: 36px;
            object-fit: cover;
            border-radius: 10px;
            display: block;
        }

        .brand-text h1 {
            margin: 0;
            font-size: 38px;
            line-height: 1;
            font-family: Georgia, "Times New Roman", serif;
            color: #fff;
            letter-spacing: 0.01em;
        }

        .brand-text p {
            margin: 8px 0 0;
            font-size: 12px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #d6ebdc;
        }

        .back-link {
            text-decoration: none;
            color: var(--green-700);
            font-weight: 700;
            background: rgba(255,255,255,0.98);
            padding: 13px 18px;
            border-radius: 14px;
            white-space: nowrap;
            box-shadow: 0 10px 24px rgba(0,0,0,0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .back-link:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(0,0,0,0.12);
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-content h2 {
            margin: 0;
            font-size: 48px;
            line-height: 1.08;
            font-family: Georgia, "Times New Roman", serif;
            max-width: 760px;
            letter-spacing: -0.02em;
        }

        .hero-content p {
            margin: 14px 0 0;
            color: rgba(255,255,255,0.84);
            max-width: 770px;
            line-height: 1.8;
            font-size: 16px;
        }

        .filter-box {
            position: relative;
            z-index: 2;
            margin-top: 26px;
            background: rgba(255,255,255,0.96);
            border: 1px solid rgba(255,255,255,0.20);
            border-radius: 22px;
            padding: 18px;
            box-shadow: 0 16px 34px rgba(7, 40, 28, 0.14);
        }

        .filter-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr auto;
            gap: 12px;
        }

        .field {
            width: 100%;
            padding: 14px 15px;
            border-radius: 14px;
            border: 1px solid #d8ddcf;
            background: var(--white);
            font-size: 14px;
            color: var(--text);
            transition: 0.2s ease;
        }

        .field:focus {
            outline: none;
            border-color: var(--green-500);
            box-shadow: 0 0 0 4px rgba(47, 122, 84, 0.10);
        }

        .btn {
            border: none;
            border-radius: 14px;
            padding: 14px 20px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            background: linear-gradient(135deg, var(--green-600), var(--green-500));
            color: white;
            box-shadow: 0 10px 18px rgba(31, 95, 64, 0.20);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(31, 95, 64, 0.28);
        }

        .content-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            margin: 8px 0 18px;
        }

        .content-head h3 {
            margin: 0;
            font-size: 24px;
            color: var(--green-800);
        }

        .content-head p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .count-badge {
            background: var(--white);
            border: 1px solid var(--cream-200);
            border-radius: 999px;
            padding: 11px 15px;
            font-size: 14px;
            font-weight: 800;
            color: var(--green-700);
            box-shadow: var(--shadow-sm);
        }

        .card-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px;
        }

        .card {
            background: rgba(255,255,255,0.96);
            border-radius: 24px;
            border: 1px solid rgba(232, 221, 201, 0.95);
            box-shadow: var(--shadow-md);
            overflow: hidden;
            transition: transform 0.28s ease, box-shadow 0.28s ease;
            animation: fadeUp 0.55s ease both;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 30px 60px rgba(15, 23, 42, 0.14);
        }

        .card:nth-child(1) { animation-delay: 0.05s; }
        .card:nth-child(2) { animation-delay: 0.10s; }
        .card:nth-child(3) { animation-delay: 0.15s; }
        .card:nth-child(4) { animation-delay: 0.20s; }
        .card:nth-child(5) { animation-delay: 0.25s; }
        .card:nth-child(6) { animation-delay: 0.30s; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card-image {
            position: relative;
            height: 230px;
            overflow: hidden;
            background: #ddd;
        }

        .card-image::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0,0,0,0.00) 40%, rgba(0,0,0,0.10) 100%);
            pointer-events: none;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .card:hover .card-image img {
            transform: scale(1.04);
        }

        .card-body {
            padding: 22px;
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: start;
            gap: 12px;
            margin-bottom: 16px;
        }

        .card-top h4 {
            margin: 0;
            font-size: 29px;
            color: var(--green-800);
            font-family: Georgia, 'Times New Roman', serif;
            line-height: 1.15;
            letter-spacing: -0.01em;
        }

        .card-sub {
            margin-top: 7px;
            color: var(--muted);
            font-size: 13px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 9px 13px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            color: var(--white);
            white-space: nowrap;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }

        .badge.tersedia {
            background: linear-gradient(135deg, #2f7a54, #3d9b69);
        }

        .badge.penuh {
            background: linear-gradient(135deg, #b73326, #d64a3a);
        }

        .meta-list {
            display: grid;
            gap: 12px;
        }

        .meta-item {
            background: #fafaf7;
            border: 1px solid #ece7db;
            border-radius: 16px;
            padding: 14px;
            font-size: 14px;
            color: #334155;
        }

        .meta-item strong {
            display: block;
            color: var(--text);
            margin-bottom: 5px;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-top: 18px;
        }

        .status-note {
            font-size: 12px;
            color: var(--muted);
            max-width: 68%;
            line-height: 1.7;
        }

        .apply-btn {
            text-decoration: none;
            background: linear-gradient(135deg, var(--green-600), var(--green-500));
            color: #fff;
            padding: 11px 15px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
            box-shadow: 0 10px 18px rgba(31, 95, 64, 0.18);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .apply-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(31, 95, 64, 0.25);
        }

        .full-badge {
            background: rgba(74, 144, 226, 0.10);
            color: var(--blue);
            padding: 11px 15px;
            border-radius: 14px;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
            opacity: 0.78;
            cursor: not-allowed;
        }

        .empty {
            background: var(--white);
            border: 1px dashed var(--cream-300);
            border-radius: 24px;
            text-align: center;
            padding: 64px 24px;
            box-shadow: var(--shadow-md);
        }

        .empty h3 {
            margin: 0 0 10px;
            color: var(--green-800);
            font-size: 28px;
            font-family: Georgia, "Times New Roman", serif;
        }

        .empty p {
            margin: 0;
            color: var(--muted);
            font-size: 15px;
        }

        @media (max-width: 1024px) {
            .filter-grid {
                grid-template-columns: 1fr 1fr;
            }

            .card-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .hero-top,
            .content-head {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .hero-content h2 {
                font-size: 34px;
            }

            .brand-text h1 {
                font-size: 30px;
            }

            .card-top,
            .card-footer {
                flex-direction: column;
                align-items: flex-start;
            }

            .status-note {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    @php
        $gambarRusun = [
            'Rusun Penggilingan' => asset('images/rusun/penggilingan.jpg'),
            'Rusun Marunda' => asset('images/rusun/marunda.jpg'),
            'Rusun Cakung Barat' => asset('images/rusun/cakung-barat.jpg'),
            'Rusun Pasar Rumput' => asset('images/rusun/pasar-rumput.jpg'),
            'Rusun Jatinegara Kaum' => asset('images/rusun/jatinegara-kaum.jpg'),
            'Rusun Pulogebang' => asset('images/rusun/pulogebang.jpg'),
            'Rusun Daan Mogot' => asset('images/rusun/daan-mogot.jpg'),
            'Rusun Pondok Bambu' => asset('images/rusun/pondok-bambu.jpg'),
            'Rusun Kapuk Muara' => asset('images/rusun/kapuk-muara.jpg'),
            'Rusun Kebon Kacang' => asset('images/rusun/kebon-kacang.jpg'),
            'Rusun Kalibata' => asset('images/rusun/kalibata.jpg'),
            'Rusun Pesanggrahan' => asset('images/rusun/pesanggrahan.jpg'),
            'Rusun Palmerah' => asset('images/rusun/palmerah.jpg'),
            'Rusun Karet Tengsin' => asset('images/rusun/karet-tengsin.jpg'),
            'Rusun Cengkareng' => asset('images/rusun/cengkareng.jpg'),
            'Rusun Kemayoran' => asset('images/rusun/kemayoran.jpg'),
            'Rusun Sunter' => asset('images/rusun/sunter.jpg'),
            'Rusun Tebet' => asset('images/rusun/tebet.jpg'),
            'Rusun Matraman' => asset('images/rusun/matraman.jpg'),
        ];
    @endphp

    <div class="page">
        <div class="hero">
            <div class="hero-top">
                <div class="brand">
                    <div class="brand-icon">
                        <img src="{{ asset('images/rusun/iben.jpg') }}" alt="Logo ASRI">
                    </div>
                    <div class="brand-text">
                        <h1>ASRI</h1>
                        <p>Sistem Rusun Digital</p>
                    </div>
                </div>

                <a href="{{ route('calon.dashboard') }}" class="back-link">← Kembali ke Dashboard</a>
            </div>

            <div class="hero-content">
                <h2>Temukan hunian yang sesuai dengan kebutuhanmu</h2>
                <p>
                    Cari rusun berdasarkan nama, wilayah, status ketersediaan, dan harga per bulan
                    dengan tampilan yang lebih modern, rapi, dan nyaman digunakan.
                </p>
            </div>

            <form method="GET" action="{{ route('calon.unit.index') }}" class="filter-box">
                <div class="filter-grid">
                    <input
                        type="text"
                        name="search"
                        class="field"
                        placeholder="Cari nama rusun / wilayah"
                        value="{{ $search }}"
                    >

                    <select name="wilayah" class="field">
                        <option value="">Semua Wilayah</option>
                        <option value="Jakarta Timur" {{ $wilayah == 'Jakarta Timur' ? 'selected' : '' }}>Jakarta Timur</option>
                        <option value="Jakarta Utara" {{ $wilayah == 'Jakarta Utara' ? 'selected' : '' }}>Jakarta Utara</option>
                        <option value="Jakarta Selatan" {{ $wilayah == 'Jakarta Selatan' ? 'selected' : '' }}>Jakarta Selatan</option>
                        <option value="Jakarta Barat" {{ $wilayah == 'Jakarta Barat' ? 'selected' : '' }}>Jakarta Barat</option>
                        <option value="Jakarta Pusat" {{ $wilayah == 'Jakarta Pusat' ? 'selected' : '' }}>Jakarta Pusat</option>
                    </select>

                    <select name="status" class="field">
                        <option value="">Semua Status</option>
                        <option value="tersedia" {{ $status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="penuh" {{ $status == 'penuh' ? 'selected' : '' }}>Penuh</option>
                    </select>

                    <select name="harga" class="field">
                        <option value="">Semua Harga</option>
                        <option value="<=400000" {{ ($harga ?? '') == '<=400000' ? 'selected' : '' }}>≤ Rp400.000</option>
                        <option value="400001-600000" {{ ($harga ?? '') == '400001-600000' ? 'selected' : '' }}>Rp400.001 - Rp600.000</option>
                        <option value=">=600001" {{ ($harga ?? '') == '>=600001' ? 'selected' : '' }}>≥ Rp600.001</option>
                    </select>

                    <button type="submit" class="btn">Cari</button>
                </div>
            </form>
        </div>

        <div class="content-head">
            <div>
                <h3>Hasil Pencarian</h3>
                <p>Daftar rusun yang bisa kamu telusuri berdasarkan filter yang dipilih.</p>
            </div>

            <div class="count-badge">
                {{ count($units) }} hasil ditemukan
            </div>
        </div>

        @if(count($units) > 0)
            <div class="card-grid">
                @foreach($units as $item)
                    <div class="card">
                        <div class="card-image">
                            <img
                                src="{{ $gambarRusun[$item['nama_rusun']] ?? asset('images/rusun/default-rusun.jpg') }}"
                                alt="{{ $item['nama_rusun'] }}"
                            >
                        </div>

                        <div class="card-body">
                            <div class="card-top">
                                <div>
                                    <h4>{{ $item['nama_rusun'] }}</h4>
                                    <div class="card-sub">Pilihan hunian untuk calon penghuni</div>
                                </div>

                                <span class="badge {{ $item['status'] }}">
                                    {{ ucfirst($item['status']) }}
                                </span>
                            </div>

                            <div class="meta-list">
                                <div class="meta-item">
                                    <strong>Wilayah</strong>
                                    {{ $item['wilayah'] }}
                                </div>

                                <div class="meta-item">
                                    <strong>Alamat</strong>
                                    {{ $item['alamat'] }}
                                </div>

                                <div class="meta-item">
                                    <strong>Harga / Bulan</strong>
                                    Rp{{ number_format($item['harga'], 0, ',', '.') }}
                                </div>
                            </div>

                            <div class="card-footer">
                                <span class="status-note">
                                    @if($item['status'] === 'tersedia')
                                        Unit masih dapat dipilih untuk proses pengajuan.
                                    @else
                                        Saat ini unit sedang penuh atau belum tersedia.
                                    @endif
                                </span>

                                @if($item['status'] === 'tersedia')
                                    <a
                                        href="{{ route('calon.pengajuan.create', ['rusun' => $item['nama_rusun']]) }}"
                                        class="apply-btn"
                                    >
                                        Ajukan Sewa
                                    </a>
                                @else
                                    <span class="full-badge">Penuh</span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty">
                <h3>Data tidak ditemukan</h3>
                <p>Coba ubah kata kunci atau filter pencarian untuk melihat pilihan rusun lainnya.</p>
            </div>
        @endif
    </div>
</body>
</html>