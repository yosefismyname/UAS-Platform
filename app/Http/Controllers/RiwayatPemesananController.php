<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\RiwayatPemesanan;
use Illuminate\Http\Request;

class RiwayatPemesananController extends Controller
{
    public function copyTransaksiData()
    {
        // Mengambil semua data transaksi
        $transaksis = Transaksi::all();

        foreach ($transaksis as $transaksi) {
            // Membuat instance RiwayatPemesanan berdasarkan data transaksi
            $riwayatPemesanan = new RiwayatPemesanan();
            $riwayatPemesanan->id = $transaksi->id;
            $riwayatPemesanan->tanggalTransaksi = $transaksi->tanggalTransaksi;
            $riwayatPemesanan->tanggalSewa = $transaksi->tanggalSewa;
            $riwayatPemesanan->mulaiSewa = $transaksi->mulaiSewa;
            $riwayatPemesanan->lamaSewa = $transaksi->lamaSewa;
            $riwayatPemesanan->idMobil = $transaksi->idMobil;
            $riwayatPemesanan->idCustomer = $transaksi->idCustomer;
            $riwayatPemesanan->idSopir = $transaksi->idSopir;
            $riwayatPemesanan->timestamps = $transaksi->timestamps;
            
            // Menyimpan data riwayat pemesanan ke database
            $riwayatPemesanan->save();
        }

        return "Data transaksi telah disalin sebagai riwayat pemesanan.";
        
    }
}
