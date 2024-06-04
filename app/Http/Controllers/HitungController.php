<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternatif;
use App\Models\Kriteria;

class HitungController extends Controller
{
    public function index()
    {
        return view('admin.perhitungan.normalisasi', [
            'title' => 'Normalisasi'
        ]);
    }

    public function hitung(Request $request)
    {
        // Bobot Kriteria
        $bobot1 = 1; 
        $bobot2 = 0.8; 
        $bobot3 = 0.8;
        $bobot4 = 0.4;

        $widget1 = ['kriterias' => $bobot1];
        $widget2 = ['kriterias' => $bobot2];
        $widget3 = ['kriterias' => $bobot3];
        $widget4 = ['kriterias' => $bobot4];

        $alternatif = Alternatif::get();
        // foreach ($alternatif as $key) {
        //     // subkriteria 1
        //     if ($key->C1 >= 1000001) {
        //         $key->C1 = 0.4;
        //     } elseif ($key->C1 >= 200001) {
        //         $key->C1 = 0.8;
        //     } elseif ($key->C1 >= 20000) {
        //         $key->C1 = 1;
        //     }

        //     // subkriteria 2
        //     if ($key->C2 >= 750) {
        //         $key->C2 = 1;
        //     } elseif ($key->C2 >= 300) {
        //         $key->C2 = 0.8;
        //     } elseif ($key->C2 >= 0) {
        //         $key->C2 = 0.4;
        //     }

        //     // subkriteria 3
        //     if ($key->C3 >= 1000) {
        //         $key->C3 = 1;
        //     } elseif ($key->C3 >= 500) {
        //         $key->C3 = 0.8;
        //     } elseif ($key->C3 >= 0) {
        //         $key->C3 = 0.4;
        //     }

        //     // subkriteria 4
        //     if ($key->C4 == 5) {
        //         $key->C4 = 1;
        //     } elseif ($key->C4 >= 3) {
        //         $key->C4 = 0.8;
        //     } elseif ($key->C4 >= 0) {
        //         $key->C4 = 0.4;
        //     }

        //     // Simpan perubahan jika perlu disimpan ke database
        //     $key->save();
        // }

        // Mengambil data untuk perhitungan normalisasi
        $data = Alternatif::get();
        
        // $minC1 = Alternatif::min('C1');
        // $maxC1 = Alternatif::max('C1');
        // $minC2 = Alternatif::min('C2');
        // $maxC2 = Alternatif::max('C2');
        // $minC3 = Alternatif::min('C3');
        // $maxC3 = Alternatif::max('C3');
        // $minC4 = Alternatif::min('C4');
        // $maxC4 = Alternatif::max('C4');

        // $C1min = ['alternatifs' => $minC1];
        // $C1max = ['alternatifs' => $maxC1];
        // $C2min = ['alternatifs' => $minC2];
        // $C2max = ['alternatifs' => $maxC2];
        // $C3min = ['alternatifs' => $minC3];
        // $C3max = ['alternatifs' => $maxC3];
        // $C4min = ['alternatifs' => $minC4];
        // $C4max = ['alternatifs' => $maxC4];

        // Normalisasi data dan hitung nilai preferensi
        $hasilNormalisasi = [];
        $nilaiPreferensi = [];
        foreach ($data as $item) {
            $normC1 = 0.4 / $item->C1;
            $normC2 = $item->C2 / 1;
            $normC3 = $item->C3 / 1;
            $normC4 = $item->C4 / 0.8;

            // Hitung nilai preferensi
            $nilaiPref = ($normC1 * $bobot1) + ($normC2 * $bobot2) + ($normC3 * $bobot3) + ($normC4 * $bobot4);

            $hasilNormalisasi[] = [
                'nama' => $item->nama,
                'C1' => $normC1,
                'C2' => $normC2,
                'C3' => $normC3,
                'C4' => $normC4,
                'preferensi' => $nilaiPref
            ];

            $nilaiPreferensi[] = [
                'nama' => $item->nama,
                'nilai' => $nilaiPref
            ];
        }

        // Urutkan berdasarkan nilai preferensi
        usort($nilaiPreferensi, function($a, $b) {
            return $b['nilai'] <=> $a['nilai'];
        });

        return view('admin.perhitungan.preferensi', compact(
            'hasilNormalisasi',
            'nilaiPreferensi',
            'data',
            'widget1',
            'widget2',
            'widget3',
            'widget4',
        ), [
            'title' => 'Nilai Preferensi'
        ]);
    }
}
