<?php

namespace App\Http\Controllers\Calon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusUnitController extends Controller
{
    public function index(Request $request)
    {
        $data = collect([
            [
                'nama_rusun' => 'Rusun Penggilingan',
                'wilayah' => 'Jakarta Timur',
                'status' => 'tersedia',
                'alamat' => 'Jl. Raya Penggilingan RT 007/RW 019, Kel. Penggilingan, Kec. Cakung, Jakarta Timur, DKI Jakarta 13940',
                'harga' => 450000,
            ],
            [
                'nama_rusun' => 'Rusun Marunda',
                'wilayah' => 'Jakarta Utara',
                'status' => 'penuh',
                'alamat' => 'Jl. Akses Rusun Marunda Cluster D, Kel. Marunda, Kec. Cilincing, Jakarta Utara, DKI Jakarta 14150',
                'harga' => 380000,
            ],
            [
                'nama_rusun' => 'Rusun Cakung Barat',
                'wilayah' => 'Jakarta Timur',
                'status' => 'tersedia',
                'alamat' => 'Jl. Tipar Cakung, Kel. Cakung Barat, Kec. Cakung, Jakarta Timur, DKI Jakarta 13910',
                'harga' => 520000,
            ],
            [
                'nama_rusun' => 'Rusun Pasar Rumput',
                'wilayah' => 'Jakarta Selatan',
                'status' => 'penuh',
                'alamat' => 'Jl. Pasar Rumput, Kel. Pasar Manggis, Kec. Setiabudi, Jakarta Selatan, DKI Jakarta 12970',
                'harga' => 700000,
            ],
            [
                'nama_rusun' => 'Rusun Jatinegara Kaum',
                'wilayah' => 'Jakarta Timur',
                'status' => 'tersedia',
                'alamat' => 'Jl. Jatinegara Kaum, Kel. Jatinegara Kaum, Kec. Pulo Gadung, Jakarta Timur, DKI Jakarta 13250',
                'harga' => 430000,
            ],
            [
                'nama_rusun' => 'Rusun Pulogebang',
                'wilayah' => 'Jakarta Timur',
                'status' => 'tersedia',
                'alamat' => 'Jl. Pulo Gebang Permai, Kel. Pulo Gebang, Kec. Cakung, Jakarta Timur, DKI Jakarta 13950',
                'harga' => 470000,
            ],
            [
                'nama_rusun' => 'Rusun Tambora',
                'wilayah' => 'Jakarta Barat',
                'status' => 'penuh',
                'alamat' => 'Jl. Tambora Raya, Kel. Tambora, Kec. Tambora, Jakarta Barat, DKI Jakarta 11220',
                'harga' => 410000,
            ],
            [
                'nama_rusun' => 'Rusun Daan Mogot',
                'wilayah' => 'Jakarta Barat',
                'status' => 'tersedia',
                'alamat' => 'Jl. Daan Mogot KM 11, Kel. Cengkareng Timur, Kec. Cengkareng, Jakarta Barat, DKI Jakarta 11730',
                'harga' => 560000,
            ],
            [
                'nama_rusun' => 'Rusun Rawa Bebek',
                'wilayah' => 'Jakarta Timur',
                'status' => 'penuh',
                'alamat' => 'Jl. Raya Bekasi KM 23, Kel. Rawa Terate, Kec. Cakung, Jakarta Timur, DKI Jakarta 13920',
                'harga' => 395000,
            ],
            [
                'nama_rusun' => 'Rusun Pondok Bambu',
                'wilayah' => 'Jakarta Timur',
                'status' => 'tersedia',
                'alamat' => 'Jl. Pondok Bambu Batas, Kel. Pondok Bambu, Kec. Duren Sawit, Jakarta Timur, DKI Jakarta 13430',
                'harga' => 505000,
            ],
            [
                'nama_rusun' => 'Rusun Kapuk Muara',
                'wilayah' => 'Jakarta Utara',
                'status' => 'tersedia',
                'alamat' => 'Jl. Kapuk Muara Raya, Kel. Kapuk Muara, Kec. Penjaringan, Jakarta Utara, DKI Jakarta 14460',
                'harga' => 610000,
            ],
            [
                'nama_rusun' => 'Rusun Penjaringan',
                'wilayah' => 'Jakarta Utara',
                'status' => 'penuh',
                'alamat' => 'Jl. Penjaringan Baru, Kel. Penjaringan, Kec. Penjaringan, Jakarta Utara, DKI Jakarta 14440',
                'harga' => 640000,
            ],
            [
                'nama_rusun' => 'Rusun Kebon Kacang',
                'wilayah' => 'Jakarta Pusat',
                'status' => 'tersedia',
                'alamat' => 'Jl. Kebon Kacang Raya, Kel. Kebon Kacang, Kec. Tanah Abang, Jakarta Pusat, DKI Jakarta 10240',
                'harga' => 580000,
            ],
            [
                'nama_rusun' => 'Rusun Tanah Tinggi',
                'wilayah' => 'Jakarta Pusat',
                'status' => 'penuh',
                'alamat' => 'Jl. Tanah Tinggi XII, Kel. Tanah Tinggi, Kec. Johar Baru, Jakarta Pusat, DKI Jakarta 10540',
                'harga' => 490000,
            ],
            [
                'nama_rusun' => 'Rusun Kalibata',
                'wilayah' => 'Jakarta Selatan',
                'status' => 'tersedia',
                'alamat' => 'Jl. Kalibata Tengah, Kel. Kalibata, Kec. Pancoran, Jakarta Selatan, DKI Jakarta 12740',
                'harga' => 680000,
            ],
            [
                'nama_rusun' => 'Rusun Pesanggrahan',
                'wilayah' => 'Jakarta Selatan',
                'status' => 'tersedia',
                'alamat' => 'Jl. Pesanggrahan Raya, Kel. Pesanggrahan, Kec. Pesanggrahan, Jakarta Selatan, DKI Jakarta 12320',
                'harga' => 620000,
            ],
            [
                'nama_rusun' => 'Rusun Lenteng Agung',
                'wilayah' => 'Jakarta Selatan',
                'status' => 'penuh',
                'alamat' => 'Jl. Raya Lenteng Agung, Kel. Lenteng Agung, Kec. Jagakarsa, Jakarta Selatan, DKI Jakarta 12610',
                'harga' => 590000,
            ],
            [
                'nama_rusun' => 'Rusun Palmerah',
                'wilayah' => 'Jakarta Barat',
                'status' => 'tersedia',
                'alamat' => 'Jl. Palmerah Barat, Kel. Palmerah, Kec. Palmerah, Jakarta Barat, DKI Jakarta 11480',
                'harga' => 540000,
            ],
            [
                'nama_rusun' => 'Rusun Karet Tengsin',
                'wilayah' => 'Jakarta Pusat',
                'status' => 'tersedia',
                'alamat' => 'Jl. Karet Pasar Baru Barat, Kel. Karet Tengsin, Kec. Tanah Abang, Jakarta Pusat, DKI Jakarta 10220',
                'harga' => 575000,
            ],
            [
                'nama_rusun' => 'Rusun Ancol',
                'wilayah' => 'Jakarta Utara',
                'status' => 'penuh',
                'alamat' => 'Jl. Ancol Timur Dalam, Kel. Ancol, Kec. Pademangan, Jakarta Utara, DKI Jakarta 14430',
                'harga' => 720000,
            ],
            [
                'nama_rusun' => 'Rusun Cengkareng',
                'wilayah' => 'Jakarta Barat',
                'status' => 'tersedia',
                'alamat' => 'Jl. Cengkareng Dalam, Kel. Cengkareng Barat, Kec. Cengkareng, Jakarta Barat, DKI Jakarta 11730',
                'harga' => 465000,
            ],
            [
                'nama_rusun' => 'Rusun Grogol',
                'wilayah' => 'Jakarta Barat',
                'status' => 'penuh',
                'alamat' => 'Jl. Dr. Susilo, Kel. Grogol, Kec. Grogol Petamburan, Jakarta Barat, DKI Jakarta 11450',
                'harga' => 525000,
            ],
            [
                'nama_rusun' => 'Rusun Kemayoran',
                'wilayah' => 'Jakarta Pusat',
                'status' => 'tersedia',
                'alamat' => 'Jl. Benyamin Sueb, Kel. Kebon Kosong, Kec. Kemayoran, Jakarta Pusat, DKI Jakarta 10630',
                'harga' => 610000,
            ],
            [
                'nama_rusun' => 'Rusun Johar Baru',
                'wilayah' => 'Jakarta Pusat',
                'status' => 'penuh',
                'alamat' => 'Jl. Kramat Jaya Baru, Kel. Johar Baru, Kec. Johar Baru, Jakarta Pusat, DKI Jakarta 10560',
                'harga' => 435000,
            ],
            [
                'nama_rusun' => 'Rusun Sunter',
                'wilayah' => 'Jakarta Utara',
                'status' => 'tersedia',
                'alamat' => 'Jl. Sunter Jaya, Kel. Sunter Jaya, Kec. Tanjung Priok, Jakarta Utara, DKI Jakarta 14360',
                'harga' => 655000,
            ],
            [
                'nama_rusun' => 'Rusun Koja',
                'wilayah' => 'Jakarta Utara',
                'status' => 'penuh',
                'alamat' => 'Jl. Bhayangkara, Kel. Tugu Utara, Kec. Koja, Jakarta Utara, DKI Jakarta 14260',
                'harga' => 445000,
            ],
            [
                'nama_rusun' => 'Rusun Tebet',
                'wilayah' => 'Jakarta Selatan',
                'status' => 'tersedia',
                'alamat' => 'Jl. Tebet Timur Dalam, Kel. Tebet Timur, Kec. Tebet, Jakarta Selatan, DKI Jakarta 12820',
                'harga' => 635000,
            ],
            [
                'nama_rusun' => 'Rusun Jagakarsa',
                'wilayah' => 'Jakarta Selatan',
                'status' => 'penuh',
                'alamat' => 'Jl. Moh. Kahfi II, Kel. Ciganjur, Kec. Jagakarsa, Jakarta Selatan, DKI Jakarta 12630',
                'harga' => 570000,
            ],
            [
                'nama_rusun' => 'Rusun Matraman',
                'wilayah' => 'Jakarta Timur',
                'status' => 'tersedia',
                'alamat' => 'Jl. Matraman Dalam II, Kel. Kebon Manggis, Kec. Matraman, Jakarta Timur, DKI Jakarta 13150',
                'harga' => 485000,
            ],
            [
                'nama_rusun' => 'Rusun Klender',
                'wilayah' => 'Jakarta Timur',
                'status' => 'penuh',
                'alamat' => 'Jl. I Gusti Ngurah Rai, Kel. Klender, Kec. Duren Sawit, Jakarta Timur, DKI Jakarta 13470',
                'harga' => 455000,
            ],
        ]);

        $search = $request->search;
        $wilayah = $request->wilayah;
        $status = $request->status;
        $harga = $request->harga;

        if ($search) {
            $search = strtolower($search);

            $data = $data->filter(function ($item) use ($search) {
                return str_contains(strtolower($item['nama_rusun']), $search) ||
                       str_contains(strtolower($item['wilayah']), $search) ||
                       str_contains(strtolower($item['alamat']), $search);
            });
        }

        if ($wilayah) {
            $data = $data->where('wilayah', $wilayah);
        }

        if ($status) {
            $data = $data->where('status', $status);
        }

        if ($harga) {
            $data = $data->filter(function ($item) use ($harga) {
                if ($harga === '<=400000') {
                    return $item['harga'] <= 400000;
                }

                if ($harga === '400001-600000') {
                    return $item['harga'] >= 400001 && $item['harga'] <= 600000;
                }

                if ($harga === '>=600001') {
                    return $item['harga'] >= 600001;
                }

                return true;
            });
        }

        return view('calon.unit.index', [
            'units' => $data->values(),
            'search' => $request->search,
            'wilayah' => $wilayah,
            'status' => $status,
            'harga' => $harga,
        ]);
    }
}