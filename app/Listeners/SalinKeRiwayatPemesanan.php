<?php

namespace App\Listeners;

use App\Events\TransaksiCreated;
use App\Models\RiwayatPemesanan;
use Illuminate\Contracts\Queue\ShouldQueue;

class SalinKeRiwayatPemesanan implements ShouldQueue
{
    public function handle(TransaksiCreated $event)
    {
        $transaksi = $event->transaksi;

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
}
