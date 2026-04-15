<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBI-08 - Form Pengajuan Sewa</title>
    <style>
        :root {
            --green-900: #07281c;
            --green-800: #0d3927;
            --green-700: #164a32;
            --green-600: #1f5f40;
            --green-500: #2f7a54;
            --green-400: #4a9a70;
            --green-100: #e8f3ec;
            --cream-50: #fbf8f2;
            --cream-100: #f4eee2;
            --cream-200: #e7ddc9;
            --white: #ffffff;
            --text: #1f2937;
            --muted: #6b7280;
            --red: #c0392b;
            --shadow-sm: 0 10px 24px rgba(15, 23, 42, 0.08);
            --shadow-md: 0 18px 50px rgba(15, 23, 42, 0.10);
            --shadow-lg: 0 28px 70px rgba(15, 23, 42, 0.16);
        }

        * { box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: "Inter", "Segoe UI", Arial, sans-serif;
            background:
                radial-gradient(circle at top, rgba(31, 95, 64, 0.05), transparent 30%),
                linear-gradient(180deg, #f8f4ec 0%, #f5efe3 100%);
            color: var(--text);
        }

        .page {
            max-width: 1180px;
            margin: 0 auto;
            padding: 24px 20px 42px;
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
            border-radius: 28px;
            color: white;
            padding: 28px 30px 30px;
            box-shadow: var(--shadow-lg);
            margin-bottom: 24px;
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
            width: 230px;
            height: 230px;
            left: -90px;
            bottom: -110px;
        }

        .hero-top {
            position: relative;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 18px;
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
            font-size: 40px;
            line-height: 1;
            font-family: Georgia, "Times New Roman", serif;
            letter-spacing: 0.02em;
            color: #fff;
        }

        .brand-text p {
            margin: 8px 0 0;
            font-size: 12px;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: #d5eadb;
        }

        .back-link {
            text-decoration: none;
            color: var(--green-700);
            font-weight: 700;
            background: rgba(255,255,255,0.98);
            padding: 12px 18px;
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
            max-width: 900px;
        }

        .hero-content h2 {
            margin: 0;
            font-size: 54px;
            line-height: 1.06;
            font-family: Georgia, "Times New Roman", serif;
            letter-spacing: -0.02em;
        }

        .hero-content p {
            margin: 14px 0 0;
            color: rgba(255,255,255,0.84);
            max-width: 820px;
            line-height: 1.8;
            font-size: 16px;
        }

        .alert-error {
            background: #fff1ef;
            border: 1px solid #f0c2bc;
            color: #a93226;
            border-radius: 16px;
            padding: 14px 16px;
            margin-bottom: 18px;
            font-size: 14px;
            box-shadow: var(--shadow-sm);
        }

        .form-card {
            background: rgba(255,255,255,0.97);
            border-radius: 24px;
            border: 1px solid var(--cream-200);
            box-shadow: var(--shadow-md);
            padding: 24px;
            animation: fadeUp 0.55s ease both;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(16px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .section-head {
            margin-bottom: 18px;
        }

        .section-head h3 {
            margin: 0;
            font-size: 24px;
            color: var(--green-800);
            font-weight: 800;
        }

        .section-head p {
            margin: 6px 0 0;
            color: var(--muted);
            font-size: 14px;
        }

        .info-box {
            background: #f8fbf8;
            border: 1px solid #dce9db;
            border-radius: 18px;
            padding: 16px;
            margin-bottom: 22px;
            color: #425466;
            line-height: 1.7;
            font-size: 14px;
        }

        .info-box strong {
            color: var(--green-800);
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .full {
            grid-column: 1 / -1;
        }

        .field-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .label {
            font-size: 14px;
            font-weight: 700;
            color: #243142;
        }

        .input,
        .textarea,
        .select {
            width: 100%;
            padding: 14px 15px;
            border-radius: 14px;
            border: 1px solid #d8ddcf;
            background: #fff;
            font-size: 14px;
            color: var(--text);
            transition: 0.2s ease;
        }

        .input:focus,
        .textarea:focus,
        .select:focus {
            outline: none;
            border-color: var(--green-500);
            box-shadow: 0 0 0 4px rgba(47, 122, 84, 0.10);
            transform: translateY(-1px);
        }

        .textarea {
            min-height: 120px;
            resize: vertical;
        }

        .readonly-box {
            background: #fafaf7;
        }

        .error-text {
            font-size: 12px;
            color: var(--red);
            margin-top: -2px;
        }

        .rusun-detail {
            background: linear-gradient(180deg, #eef7f1 0%, #e5f1e9 100%);
            border: 1px solid #cfe3d4;
            border-radius: 20px;
            padding: 18px;
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.5);
        }

        .rusun-detail h4 {
            margin: 0 0 12px;
            color: var(--green-800);
            font-size: 21px;
            font-family: Georgia, "Times New Roman", serif;
        }

        .rusun-detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1.4fr;
            gap: 12px;
        }

        .rusun-detail-item {
            background: #fff;
            border: 1px solid #d7e6da;
            border-radius: 14px;
            padding: 13px;
            box-shadow: var(--shadow-sm);
        }

        .rusun-detail-item strong {
            display: block;
            margin-bottom: 6px;
            font-size: 11px;
            color: var(--green-700);
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .action-row {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 26px;
        }

        .btn-secondary,
        .btn-primary {
            border: none;
            border-radius: 14px;
            padding: 13px 18px;
            font-size: 14px;
            font-weight: 800;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-secondary {
            background: #eef1f4;
            color: #374151;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--green-600), var(--green-500));
            color: white;
            box-shadow: 0 12px 22px rgba(31, 95, 64, 0.18);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 28px rgba(31, 95, 64, 0.25);
        }

        @media (max-width: 900px) {
            .form-grid,
            .rusun-detail-grid {
                grid-template-columns: 1fr;
            }

            .hero-top,
            .action-row {
                flex-direction: column;
                align-items: stretch;
            }

            .hero-content h2 {
                font-size: 38px;
            }

            .brand-text h1 {
                font-size: 30px;
            }

            .hero-content p {
                font-size: 15px;
            }
        }
    </style>
</head>
<body>
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
                <h2>Form Pengajuan Sewa</h2>
                <p>
                    Pilih rusun yang tersedia, lalu lengkapi data diri dan alasan pengajuan.
                    Detail rusun akan terisi otomatis sesuai pilihan, sehingga proses pengajuan jadi lebih cepat dan nyaman.
                </p>
            </div>
        </div>

        @if($errors->any())
            <div class="alert-error">
                Ada data yang belum benar. Silakan cek kembali form pengajuan kamu.
            </div>
        @endif

        <div class="form-card">
            <div class="section-head">
                <h3>Data Pengajuan</h3>
                <p>Lengkapi formulir berikut untuk melanjutkan proses pengajuan sewa rusun.</p>
            </div>

            <div class="info-box">
                <strong>Info:</strong> Hanya rusun dengan status <strong>tersedia</strong> yang bisa dipilih.
                Setelah form dikirim, data pengajuan akan masuk ke proses verifikasi admin.
            </div>

            <form method="POST" action="{{ route('calon.pengajuan.store') }}">
                @csrf

                <div class="form-grid">
                    <div class="field-group">
                        <label class="label">Nama Lengkap</label>
                        <input
                            type="text"
                            name="nama_lengkap"
                            class="input"
                            value="{{ old('nama_lengkap', $user->name ?? '') }}"
                            placeholder="Masukkan nama lengkap"
                        >
                        @error('nama_lengkap') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group">
                        <label class="label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="input readonly-box"
                            value="{{ old('email', $user->email ?? '') }}"
                            placeholder="Masukkan email"
                        >
                        @error('email') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group">
                        <label class="label">NIK</label>
                        <input
                            type="text"
                            name="nik"
                            class="input"
                            value="{{ old('nik') }}"
                            placeholder="Contoh: 3174xxxxxxxxxxxx"
                        >
                        @error('nik') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group">
                        <label class="label">Nomor HP</label>
                        <input
                            type="text"
                            name="no_hp"
                            class="input"
                            value="{{ old('no_hp') }}"
                            placeholder="Contoh: 08xxxxxxxxxx"
                        >
                        @error('no_hp') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group full">
                        <label class="label">Alamat Domisili</label>
                        <textarea
                            name="alamat_dom"
                            class="textarea"
                            placeholder="Masukkan alamat domisili lengkap"
                        >{{ old('alamat_dom') }}</textarea>
                        @error('alamat_dom') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group full">
                        <label class="label">Pilih Rusun Tersedia</label>
                        <select name="nama_rusun" id="nama_rusun" class="select">
                            <option value="">-- Pilih Rusun --</option>
                            @foreach($rusunTersedia as $rusun)
                                <option
                                    value="{{ $rusun['nama_rusun'] }}"
                                    data-wilayah="{{ $rusun['wilayah'] }}"
                                    data-alamat="{{ $rusun['alamat_rusun'] }}"
                                    data-harga="{{ $rusun['harga_bulanan'] }}"
                                    {{ old('nama_rusun', $selectedRusun) == $rusun['nama_rusun'] ? 'selected' : '' }}
                                >
                                    {{ $rusun['nama_rusun'] }}
                                </option>
                            @endforeach
                        </select>
                        @error('nama_rusun') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group full">
                        <div class="rusun-detail">
                            <h4>Detail Rusun Terpilih</h4>
                            <div class="rusun-detail-grid">
                                <div class="rusun-detail-item">
                                    <strong>Wilayah</strong>
                                    <div id="preview_wilayah">-</div>
                                </div>
                                <div class="rusun-detail-item">
                                    <strong>Harga / Bulan</strong>
                                    <div id="preview_harga">-</div>
                                </div>
                                <div class="rusun-detail-item">
                                    <strong>Alamat</strong>
                                    <div id="preview_alamat">-</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="field-group">
                        <label class="label">Wilayah</label>
                        <input
                            type="text"
                            name="wilayah"
                            id="wilayah"
                            class="input readonly-box"
                            value="{{ old('wilayah') }}"
                            readonly
                        >
                        @error('wilayah') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group">
                        <label class="label">Harga / Bulan</label>
                        <input
                            type="text"
                            name="harga_bulanan"
                            id="harga_bulanan"
                            class="input readonly-box"
                            value="{{ old('harga_bulanan') }}"
                            readonly
                        >
                        @error('harga_bulanan') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group full">
                        <label class="label">Alamat Rusun</label>
                        <textarea
                            name="alamat_rusun"
                            id="alamat_rusun"
                            class="textarea readonly-box"
                            readonly
                        >{{ old('alamat_rusun') }}</textarea>
                        @error('alamat_rusun') <div class="error-text">{{ $message }}</div> @enderror
                    </div>

                    <div class="field-group full">
                        <label class="label">Alasan Pengajuan</label>
                        <textarea
                            name="alasan_pengajuan"
                            class="textarea"
                            placeholder="Jelaskan alasan mengajukan sewa rusun"
                        >{{ old('alasan_pengajuan') }}</textarea>
                        @error('alasan_pengajuan') <div class="error-text">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="action-row">
                    <a href="{{ route('calon.unit.index') }}" class="btn-secondary">Kembali ke Katalog</a>
                    <button type="submit" class="btn-primary">Kirim Pengajuan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const selectRusun = document.getElementById('nama_rusun');
        const wilayahInput = document.getElementById('wilayah');
        const hargaInput = document.getElementById('harga_bulanan');
        const alamatInput = document.getElementById('alamat_rusun');

        const previewWilayah = document.getElementById('preview_wilayah');
        const previewHarga = document.getElementById('preview_harga');
        const previewAlamat = document.getElementById('preview_alamat');

        function updateRusunDetail() {
            const selectedOption = selectRusun.options[selectRusun.selectedIndex];

            if (!selectedOption || !selectedOption.value) {
                wilayahInput.value = '';
                hargaInput.value = '';
                alamatInput.value = '';

                previewWilayah.textContent = '-';
                previewHarga.textContent = '-';
                previewAlamat.textContent = '-';
                return;
            }

            const wilayah = selectedOption.getAttribute('data-wilayah') || '';
            const harga = selectedOption.getAttribute('data-harga') || '';
            const alamat = selectedOption.getAttribute('data-alamat') || '';

            wilayahInput.value = wilayah;
            hargaInput.value = harga;
            alamatInput.value = alamat;

            previewWilayah.textContent = wilayah;
            previewHarga.textContent = harga;
            previewAlamat.textContent = alamat;
        }

        selectRusun.addEventListener('change', updateRusunDetail);
        window.addEventListener('load', updateRusunDetail);
    </script>
</body>
</html>