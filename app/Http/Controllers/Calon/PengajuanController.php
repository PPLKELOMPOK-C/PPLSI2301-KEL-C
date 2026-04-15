<?php

namespace App\Http\Controllers\Calon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    private function getRusunTersedia()
    {
        return [
            [
                'nama_rusun' => 'Rusun Penggilingan',
                'wilayah' => 'Jakarta Timur',
                'alamat_rusun' => 'Jl. Raya Penggilingan RT 007/RW 019, Kel. Penggilingan, Kec. Cakung, Jakarta Timur, DKI Jakarta 13940',
                'harga_bulanan' => 'Rp450.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Cakung Barat',
                'wilayah' => 'Jakarta Timur',
                'alamat_rusun' => 'Jl. Tipar Cakung, Kel. Cakung Barat, Kec. Cakung, Jakarta Timur, DKI Jakarta 13910',
                'harga_bulanan' => 'Rp520.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Jatinegara Kaum',
                'wilayah' => 'Jakarta Timur',
                'alamat_rusun' => 'Jl. Jatinegara Kaum, Kel. Jatinegara Kaum, Kec. Pulo Gadung, Jakarta Timur, DKI Jakarta 13250',
                'harga_bulanan' => 'Rp430.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Pulogebang',
                'wilayah' => 'Jakarta Timur',
                'alamat_rusun' => 'Jl. Pulo Gebang Permai, Kel. Pulo Gebang, Kec. Cakung, Jakarta Timur, DKI Jakarta 13950',
                'harga_bulanan' => 'Rp470.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Daan Mogot',
                'wilayah' => 'Jakarta Barat',
                'alamat_rusun' => 'Jl. Daan Mogot KM 11, Kel. Cengkareng Timur, Kec. Cengkareng, Jakarta Barat, DKI Jakarta 11730',
                'harga_bulanan' => 'Rp560.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Pondok Bambu',
                'wilayah' => 'Jakarta Timur',
                'alamat_rusun' => 'Jl. Pondok Bambu Batas, Kel. Pondok Bambu, Kec. Duren Sawit, Jakarta Timur, DKI Jakarta 13430',
                'harga_bulanan' => 'Rp505.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Kapuk Muara',
                'wilayah' => 'Jakarta Utara',
                'alamat_rusun' => 'Jl. Kapuk Muara Raya, Kel. Kapuk Muara, Kec. Penjaringan, Jakarta Utara, DKI Jakarta 14460',
                'harga_bulanan' => 'Rp610.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Kebon Kacang',
                'wilayah' => 'Jakarta Pusat',
                'alamat_rusun' => 'Jl. Kebon Kacang Raya, Kel. Kebon Kacang, Kec. Tanah Abang, Jakarta Pusat, DKI Jakarta 10240',
                'harga_bulanan' => 'Rp580.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Kalibata',
                'wilayah' => 'Jakarta Selatan',
                'alamat_rusun' => 'Jl. Kalibata Tengah, Kel. Kalibata, Kec. Pancoran, Jakarta Selatan, DKI Jakarta 12740',
                'harga_bulanan' => 'Rp680.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Pesanggrahan',
                'wilayah' => 'Jakarta Selatan',
                'alamat_rusun' => 'Jl. Pesanggrahan Raya, Kel. Pesanggrahan, Kec. Pesanggrahan, Jakarta Selatan, DKI Jakarta 12320',
                'harga_bulanan' => 'Rp620.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Palmerah',
                'wilayah' => 'Jakarta Barat',
                'alamat_rusun' => 'Jl. Palmerah Barat, Kel. Palmerah, Kec. Palmerah, Jakarta Barat, DKI Jakarta 11480',
                'harga_bulanan' => 'Rp540.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Karet Tengsin',
                'wilayah' => 'Jakarta Pusat',
                'alamat_rusun' => 'Jl. Karet Pasar Baru Barat, Kel. Karet Tengsin, Kec. Tanah Abang, Jakarta Pusat, DKI Jakarta 10220',
                'harga_bulanan' => 'Rp575.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Cengkareng',
                'wilayah' => 'Jakarta Barat',
                'alamat_rusun' => 'Jl. Cengkareng Dalam, Kel. Cengkareng Barat, Kec. Cengkareng, Jakarta Barat, DKI Jakarta 11730',
                'harga_bulanan' => 'Rp465.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Kemayoran',
                'wilayah' => 'Jakarta Pusat',
                'alamat_rusun' => 'Jl. Benyamin Sueb, Kel. Kebon Kosong, Kec. Kemayoran, Jakarta Pusat, DKI Jakarta 10630',
                'harga_bulanan' => 'Rp610.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Sunter',
                'wilayah' => 'Jakarta Utara',
                'alamat_rusun' => 'Jl. Sunter Jaya, Kel. Sunter Jaya, Kec. Tanjung Priok, Jakarta Utara, DKI Jakarta 14360',
                'harga_bulanan' => 'Rp655.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Tebet',
                'wilayah' => 'Jakarta Selatan',
                'alamat_rusun' => 'Jl. Tebet Timur Dalam, Kel. Tebet Timur, Kec. Tebet, Jakarta Selatan, DKI Jakarta 12820',
                'harga_bulanan' => 'Rp635.000',
                'status' => 'tersedia',
            ],
            [
                'nama_rusun' => 'Rusun Matraman',
                'wilayah' => 'Jakarta Timur',
                'alamat_rusun' => 'Jl. Matraman Dalam II, Kel. Kebon Manggis, Kec. Matraman, Jakarta Timur, DKI Jakarta 13150',
                'harga_bulanan' => 'Rp485.000',
                'status' => 'tersedia',
            ],
        ];
    }

    public function create(Request $request)
    {
        $rusunTersedia = collect($this->getRusunTersedia())->values()->all();
        $selectedRusun = $request->query('rusun', '');

        return view('calon.pengajuan.create', [
            'user' => Auth::user(),
            'rusunTersedia' => $rusunTersedia,
            'selectedRusun' => $selectedRusun,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nik' => 'required|string|max:30',
            'no_hp' => 'required|string|max:20',
            'alamat_dom' => 'required|string',
            'nama_rusun' => 'required|string|max:255',
            'wilayah' => 'required|string|max:100',
            'alamat_rusun' => 'required|string',
            'harga_bulanan' => 'required|string|max:100',
            'alasan_pengajuan' => 'required|string|min:10',
        ]);

        $pengajuan = [
            'id' => 'PGJ-' . now()->format('YmdHis'),
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'nik' => $validated['nik'],
            'no_hp' => $validated['no_hp'],
            'alamat_dom' => $validated['alamat_dom'],
            'nama_rusun' => $validated['nama_rusun'],
            'wilayah' => $validated['wilayah'],
            'alamat_rusun' => $validated['alamat_rusun'],
            'harga_bulanan' => $validated['harga_bulanan'],
            'alasan_pengajuan' => $validated['alasan_pengajuan'],
            'tanggal_pengajuan' => now()->format('d M Y, H:i'),
            'status' => 'Pending',
            'catatan' => 'Berkas berhasil dikirim dan menunggu verifikasi admin.',
        ];

        session([
            'pengajuan_terakhir' => $pengajuan,
            'status_pengajuan_dashboard' => 'Pending Verifikasi',
        ]);

        return redirect()
            ->route('calon.pengajuan.tracking')
            ->with('success', 'Pengajuan sewa berhasil dikirim.');
    }

    public function tracking()
    {
        $pengajuan = session('pengajuan_terakhir');

        return view('calon.pengajuan.tracking', [
            'pengajuan' => $pengajuan,
        ]);
    }
}