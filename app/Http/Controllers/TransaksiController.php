<?php
/*
namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Events\TransaksiCreated;
use App\Models\Mobil;
use Illuminate\Support\Facades\Auth;


class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('mobil', 'customer', 'sopir')->get();

        return view('trans', compact('transaksis'));
    }

       // event(new TransaksiCreated($transaksi));


    public function showConfirmation(Request $request, $id)
    {
    $transaksi = Transaksi::findOrFail($id);

    // Logika untuk menentukan apakah transaksi sudah selesai atau belum
    $selesai = false;
    // ...

    // Jika transaksi sudah selesai, hapus data transaksi
    if ($selesai) {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('message', 'Transaksi berhasil dihapus');
    }

    // Mengirimkan data ke view
    return view('confirmation', compact('transaksi', 'selesai'));
    }
    
    public function create()
    {
            $mobil = Mobil::all();
            return view('booking', compact('mobil'));
    }
    
    public function store(Request $request)
    {
            $request->validate([
                'tanggalSewa' => 'required|date',
                'mulaiSewa' => 'required|date_format:H:i',
                'lamaSewa' => 'required|integer',
                'idMobil' => 'required',
                // tambahkan validasi lainnya sesuai kebutuhan
            ]);
    
            $transaksi = new Transaksi();
            $transaksi->tanggalSewa = $request->input('tanggalSewa');
            $transaksi->mulaiSewa = $request->input('mulaiSewa');
            $transaksi->lamaSewa = $request->input('lamaSewa');
            $transaksi->idMobil = $request->input('idMobil');
            
            // Mendapatkan ID pengguna yang sedang login
            $transaksi->idCustomer = Auth::id(); // ID pengguna
            
            // Mendapatkan ID pelanggan yang sedang login
            // Misalnya, jika ada relasi antara User dan Customer
            $customer = Auth::user()->customer;
            $transaksi->idCustomer = $customer->id; // ID pelanggan
    
            // tambahkan inputan lainnya sesuai dengan field pada tabel
    
            // Simpan data ke database
            $transaksi->save();
    
            // Redirect atau tampilkan halaman sukses
            return redirect()->route('transaksi.index')->with('success', 'Data transaksi berhasil disimpan.');
        }
    }
    



*/


namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Mobil;
use App\Models\Customer;
use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('mobil', 'customer', 'sopir')->get();

        return view('trans', compact('transaksis'));
    }

    public function showConfirmation(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Logika untuk menentukan apakah transaksi sudah selesai atau belum
        $selesai = false;
        // ...

        // Jika transaksi sudah selesai, hapus data transaksi
        if ($selesai) {
            $transaksi->delete();
            return redirect()->route('transaksi.index')->with('message', 'Transaksi berhasil dihapus');
        }

        // Mengirimkan data ke view
        return view('confirmation', compact('transaksi', 'selesai'));
    }

    public function create()
    {
        $mobils = Mobil::all();
        $customers = Customer::all();
        $sopir = Sopir::all();

        return view('book', compact('mobils', 'customers', 'sopir'));
    }


    private function calculateRentalDurationAndPrice($mulaiSewa, $lamaSewa, $harga)
    {
        $startDateTime = Carbon::parse($mulaiSewa);
        $endDateTime = $startDateTime->copy()->addHours($lamaSewa);

        $hoursDiff = $endDateTime->diffInHours($startDateTime);
        $daysDiff = $endDateTime->diffInDays($startDateTime);

        $totalHours = $hoursDiff % 24;
        $totalDays = floor($hoursDiff / 24) + $daysDiff;

        $price = $harga;

        if ($totalDays > 1) {
            $price *= ($totalDays > 2) ? 3 : 2;
        }

        return [
            'duration' => sprintf('%02d:%02d', $totalDays, $totalHours),
            'price' => $price
        ];
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggalSewa' => 'required|date',
            'mulaiSewa' => 'required|date_format:H:i',
            'lamaSewa' => 'required|integer',
            'idMobil' => 'required',
            'idCustomer' => 'required',
        ]);
        $mobil = Mobil::findOrFail($request->input('idMobil'));
        $harga = $mobil->hargasewa;
        $rentalDurationAndPrice = $this->calculateRentalDurationAndPrice($request->input('mulaiSewa'), $request->input('lamaSewa'), $harga);

        $transaksi = new Transaksi();
        $transaksi->tanggalTransaksi = Carbon::now();
        $transaksi->tanggalSewa = $request->input('tanggalSewa');
        $transaksi->mulaiSewa = $request->input('mulaiSewa');
        $transaksi->lamaSewa = $request->input('lamaSewa');
        $transaksi->idMobil = $request->input('idMobil');
        $transaksi->idCustomer = $request->input('idCustomer');

        // Mendapatkan ID pengguna yang sedang login
        $transaksi->idCustomer = Auth::id(); // ID pengguna

        // Mendapatkan ID pelanggan yang sedang login
        // Misalnya, jika ada relasi antara User dan Customer
        $customer = Customer::findOrFail($request->input('idCustomer'));
        $transaksi->idCustomer = $customer->id; // ID pelanggan

        // tambahkan inputan lainnya sesuai dengan field pada tabel

        // Simpan data ke database
        $transaksi->save();

        // Redirect atau tampilkan halaman sukses
        return redirect()->route('trans')->with('success', 'Data transaksi berhasil disimpan.');
    }

    public function tampil($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        return view('transaksi.show', compact('transaksi'));
    }

    public function destroy($id)
    {
        // Temukan transaksi yang akan dihapus
        $transaksi = Transaksi::findOrFail($id);

        // Hapus transaksi
        $transaksi->delete();

        // Redirect atau berikan respon sukses
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus');
    }
}
