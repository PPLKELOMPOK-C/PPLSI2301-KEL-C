<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PBI-09 - Tracking Pengajuan</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f3ea;
            color: #1f2937;
        }

        .page {
            max-width: 1000px;
            margin: 0 auto;
            padding: 28px 20px 48px;
        }

        .hero {
            background: linear-gradient(135deg, #07281c, #164a32);
            border-radius: 24px;
            color: white;
            padding: 28px;
            margin-bottom: 24px;
        }

        .hero-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 16px;
            margin-bottom: 20px;
        }

        .brand h1 {
            margin: 0;
            font-size: 34px;
            font-family: Georgia, 'Times New Roman', serif;
        }

        .brand p {
            margin: 6px 0 0;
            font-size: 13px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #cfe8d8;
        }

        .back-link {
            text-decoration: none;
            color: #164a32;
            font-weight: 700;
            background: #fff;
            padding: 12px 16px;
            border-radius: 12px;
        }

        .hero h2 {
            margin: 0;
            font-size: 32px;
        }

        .card {
            background: white;
            border-radius: 22px;
            padding: 24px;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.10);
        }

        .empty {
            text-align: center;
            padding: 36px 20px;
        }

        .empty a {
            display: inline-block;
            margin-top: 18px;
            text-decoration: none;
            background: #1f5f40;
            color: white;
            padding: 12px 16px;
            border-radius: 12px;
            font-weight: 700;
        }

        .status-box {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            background: #fff8eb;
            border: 1px solid #f0ddba;
            border-radius: 18px;
            padding: 18px;
            margin-bottom: 20px;
        }

        .status-badge {
            background: #c57a15;
            color: white;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 700;
            height: fit-content;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .detail-item {
            background: #fbf8f2;
            border: 1px solid #e7ddc9;
            border-radius: 16px;
            padding: 16px;
        }

        .detail-item strong {
            display: block;
            margin-bottom: 6px;
            color: #164a32;
        }

        @media (max-width: 800px) {
            .hero-top, .status-box {
                flex-direction: column;
                align-items: stretch;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="hero">
            <div class="hero-top">
                <div class="brand">
                    <h1>ASRI</h1>
                    <p>Sistem Rusun Digital</p>
                </div>

                <a href="{{ route('calon.dashboard') }}" class="back-link">← Kembali ke Dashboard</a>
            </div>

            <h2>Tracking Pengajuan</h2>
        </div>

        <div class="card">
            @if(!$pengajuan)
                <div class="empty">
                    <h3>Belum ada pengajuan</h3>
                    <p>Kamu belum pernah mengirim form pengajuan sewa.</p>
                    <a href="{{ route('calon.unit.index') }}">Pilih Rusun Sekarang</a>
                </div>
            @else
                <div class="status-box">
                    <div>
                        <h3>{{ $pengajuan['nama_rusun'] }}</h3>
                        <div style="margin-top:6px; color:#6b7280;">
                            ID Pengajuan: {{ $pengajuan['id'] }}
                        </div>
                    </div>

                    <div class="status-badge">{{ $pengajuan['status'] }}</div>
                </div>

                <div class="detail-grid">
                    <div class="detail-item">
                        <strong>Nama Lengkap</strong>
                        {{ $pengajuan['nama_lengkap'] }}
                    </div>

                    <div class="detail-item">
                        <strong>Email</strong>
                        {{ $pengajuan['email'] }}
                    </div>

                    <div class="detail-item">
                        <strong>NIK</strong>
                        {{ $pengajuan['nik'] }}
                    </div>

                    <div class="detail-item">
                        <strong>Nomor HP</strong>
                        {{ $pengajuan['no_hp'] }}
                    </div>

                    <div class="detail-item">
                        <strong>Wilayah</strong>
                        {{ $pengajuan['wilayah'] }}
                    </div>

                    <div class="detail-item">
                        <strong>Harga / Bulan</strong>
                        {{ $pengajuan['harga_bulanan'] }}
                    </div>

                    <div class="detail-item">
                        <strong>Tanggal Pengajuan</strong>
                        {{ $pengajuan['tanggal_pengajuan'] }}
                    </div>

                    <div class="detail-item">
                        <strong>Catatan</strong>
                        {{ $pengajuan['catatan'] }}
                    </div>
                </div>
            @endif
        </div>
    </div>
</body>
</html>