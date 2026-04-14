
<style>
  :root {
    --g50: #f0f7ec;
    --g100: #d4eac4;
    --g200: #a8d48d;
    --g500: #3b7c1a;
    --g600: #2d6013;
    --g700: #1e420d;
    --cream: #faf6ee;
    --cream2: #f2ead8;
    --cream3: #e8dfc8;
  }
  * { box-sizing: border-box; margin: 0; padding: 0; font-family: var(--font-sans, sans-serif); }
  .dash { background: var(--cream); min-height: 100vh; padding: 0; }
  .topbar {
    background: var(--g600);
    padding: 18px 24px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .topbar-left { display: flex; flex-direction: column; gap: 2px; }
  .topbar-label { font-size: 12px; color: var(--g100); font-weight: 400; }
  .topbar-name { font-size: 18px; font-weight: 500; color: #fff; }
  .topbar-avatar {
    width: 42px; height: 42px; border-radius: 50%;
    background: var(--g200); color: var(--g700);
    display: flex; align-items: center; justify-content: center;
    font-size: 15px; font-weight: 500;
    border: 2px solid var(--g100);
  }
  .content { padding: 20px 20px 32px; display: flex; flex-direction: column; gap: 16px; }

  .status-card {
    background: #fff;
    border-radius: 14px;
    padding: 16px 18px;
    border: 0.5px solid var(--cream3);
    display: flex;
    align-items: center;
    gap: 14px;
  }
  .status-icon {
    width: 44px; height: 44px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; flex-shrink: 0;
  }
  .status-icon.pending { background: #fff8e1; }
  .status-label { font-size: 12px; color: #888; font-weight: 400; }
  .status-value { font-size: 15px; font-weight: 500; color: #b86a00; margin-top: 2px; }
  .status-dot {
    width: 8px; height: 8px; border-radius: 50%;
    background: #f0a500; display: inline-block; margin-right: 6px;
  }

  .section-title { font-size: 13px; font-weight: 500; color: var(--g600); letter-spacing: 0.04em; text-transform: uppercase; }

  .menu-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; }
  .menu-card {
    background: #fff;
    border-radius: 14px;
    padding: 16px 14px 14px;
    border: 0.5px solid var(--cream3);
    display: flex;
    flex-direction: column;
    gap: 6px;
    cursor: pointer;
    transition: border-color 0.15s;
  }
  .menu-card:hover { border-color: var(--g200); }
  .menu-icon {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; margin-bottom: 4px;
  }
  .menu-icon.blue { background: #e6f1fb; }
  .menu-icon.green { background: var(--g50); }
  .menu-icon.amber { background: #faeeda; }
  .menu-title { font-size: 13px; font-weight: 500; color: #222; }
  .menu-desc { font-size: 11px; color: #999; line-height: 1.4; }
  .menu-btn {
    margin-top: 8px;
    padding: 7px 0;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    width: 100%;
    transition: opacity 0.15s;
  }
  .menu-btn:active { opacity: 0.8; }
  .menu-btn.blue { background: #378add; color: #fff; }
  .menu-btn.green { background: var(--g500); color: #fff; }
  .menu-btn.amber { background: #ba7517; color: #fff; }

  .info-strip {
    background: var(--g700);
    border-radius: 14px;
    padding: 16px 18px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 12px;
  }
  .info-strip-text { color: var(--g100); font-size: 13px; line-height: 1.5; }
  .info-strip-text strong { color: #fff; font-weight: 500; display: block; font-size: 14px; margin-bottom: 2px; }
  .info-strip-action {
    background: var(--g200);
    color: var(--g700);
    border: none;
    border-radius: 8px;
    padding: 8px 14px;
    font-size: 12px;
    font-weight: 500;
    cursor: pointer;
    white-space: nowrap;
    flex-shrink: 0;
  }

  .steps-card {
    background: #fff;
    border-radius: 14px;
    padding: 16px 18px;
    border: 0.5px solid var(--cream3);
  }
  .steps-title { font-size: 13px; font-weight: 500; color: #333; margin-bottom: 14px; }
  .step-row { display: flex; align-items: flex-start; gap: 12px; margin-bottom: 12px; }
  .step-row:last-child { margin-bottom: 0; }
  .step-num {
    width: 24px; height: 24px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 500; flex-shrink: 0;
  }
  .step-num.done { background: var(--g500); color: #fff; }
  .step-num.active { background: var(--g50); color: var(--g600); border: 1.5px solid var(--g500); }
  .step-num.todo { background: var(--cream2); color: #aaa; }
  .step-info { flex: 1; }
  .step-name { font-size: 13px; font-weight: 400; color: #333; }
  .step-sub { font-size: 11px; color: #aaa; margin-top: 1px; }
  .step-connector { width: 1.5px; height: 14px; background: var(--cream3); margin-left: 11px; }
</style>

<div class="dash">
  <div class="topbar">
    <div class="topbar-left">
      <span class="topbar-label">Selamat datang</span>
      <span class="topbar-name">{{ auth()->user()->name }}</span>
    </div>
    <a href="{{ route('profile') }}" class="topbar-avatar">
    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
</a>


  </div>

  <div class="content">
    <div class="status-card">
      <div class="status-icon pending">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#f0a500" stroke-width="1.8"/><path d="M12 7v5l3 3" stroke="#f0a500" stroke-width="1.8" stroke-linecap="round"/></svg>
      </div>
      <div>
        <div class="status-label">Status Pengajuan</div>
        <div class="status-value"><span class="status-dot"></span>Belum Mengajukan</div>
      </div>
    </div>

    <div class="section-title">Menu Utama</div>

    <div class="menu-grid">
      <div class="menu-card">
        <div class="menu-icon blue">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><rect x="3" y="3" width="8" height="8" rx="1.5" fill="#378add"/><rect x="13" y="3" width="8" height="8" rx="1.5" fill="#85b7eb"/><rect x="3" y="13" width="8" height="8" rx="1.5" fill="#85b7eb"/><rect x="13" y="13" width="8" height="8" rx="1.5" fill="#b5d4f4"/></svg>
        </div>
        <div class="menu-title">Unit Tersedia</div>
        <div class="menu-desc">Lihat unit yang masih kosong</div>
        <button class="menu-btn blue">Lihat Unit</button>
      </div>
      <div class="menu-card">
        <div class="menu-icon green">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><path d="M12 5v14M5 12h14" stroke="#3b7c1a" stroke-width="2" stroke-linecap="round"/></svg>
        </div>
        <div class="menu-title">Ajukan Sewa</div>
        <div class="menu-desc">Isi form pengajuan sewa</div>
        <button class="menu-btn green">Ajukan</button>
      </div>
      <div class="menu-card">
        <div class="menu-icon amber">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="#ba7517" stroke-width="1.8"/><path d="M12 7v5l3 3" stroke="#ba7517" stroke-width="1.8" stroke-linecap="round"/></svg>
        </div>
        <div class="menu-title">Tracking</div>
        <div class="menu-desc">Pantau status pengajuan</div>
        <button class="menu-btn amber">Lihat Status</button>
      </div>
    </div>

    <div class="info-strip">
      <div class="info-strip-text">
        <strong>Butuh bantuan?</strong>
        Hubungi admin untuk informasi lebih lanjut
      </div>
      <button class="info-strip-action">Hubungi</button>
    </div>

    <div class="steps-card">
      <div class="steps-title">Alur Pengajuan Sewa</div>
      <div class="step-row">
        <div class="step-num todo">1</div>
        <div class="step-info">
          <div class="step-name">Pilih unit yang tersedia</div>
          <div class="step-sub">Cek ketersediaan & detail unit</div>
        </div>
      </div>
      <div class="step-connector"></div>
      <div class="step-row">
        <div class="step-num todo">2</div>
        <div class="step-info">
          <div class="step-name">Isi form pengajuan</div>
          <div class="step-sub">Lengkapi data diri & dokumen</div>
        </div>
      </div>
      <div class="step-connector"></div>
      <div class="step-row">
        <div class="step-num todo">3</div>
        <div class="step-info">
          <div class="step-name">Tunggu persetujuan admin</div>
          <div class="step-sub">Proses review 1–3 hari kerja</div>
        </div>
      </div>
      <div class="step-connector"></div>
      <div class="step-row">
        <div class="step-num todo">4</div>
        <div class="step-info">
          <div class="step-name">Tanda tangan kontrak</div>
          <div class="step-sub">Selesaikan administrasi sewa</div>
        </div>
      </div>
    </div>
  </div>
</div>
