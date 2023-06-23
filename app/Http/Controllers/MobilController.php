<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        return view('mobil.index', compact('mobil'));
    }

    public function tampil()
    {
        $mobil = Mobil::all();
        return view('dashboard', compact('mobil'));
    }

    public function create()
    {
        return view('mobil.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'plat' => 'required',
            'merk' => 'required',
            'kapasitas' => 'required|numeric',
            'tahunproduksi' => 'required|numeric',
            'tipe' => 'required',
            'hargasewa' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);
    
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('public/gambar');
            $data['gambar'] = $gambarPath;
        }
    
        // Simpan data mobil ke dalam database
        $mobil = Mobil::create($data);
    
        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil ditambahkan.');
    }
    

    public function edit($id)
    {
        $mobil = Mobil::findOrFail($id);
        return view('mobil.edit', compact('mobil'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'plat' => 'required',
            'merk' => 'required',
            'kapasitas' => 'required|numeric',
            'tahunproduksi' => 'required|numeric',
            'hargasewa' => 'required|numeric',
            'tipe' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar (opsional)
        ]);

        $mobil = Mobil::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('public/gambar');
            $data['gambar'] = $gambarPath;

            // Hapus gambar lama jika ada
            if ($mobil->gambar) {
                Storage::delete($mobil->gambar);
            }
        }
        $mobil->update($data);

        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil diupdate.');
    }

    public function destroy($id)
    {
        $mobil = Mobil::findOrFail($id);

        if ($mobil->gambar) {
            Storage::delete($mobil->gambar);
        }
        $mobil->delete();
        return redirect()->route('mobil.index')->with('success', 'Mobil berhasil dihapus.');
    }
}
