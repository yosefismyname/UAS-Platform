<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sopir;
use Illuminate\Support\Facades\Storage;


class SopirController extends Controller
{
    public function index()
    {
        $sopir = Sopir::all();

        return view('sopir.index', compact('sopir'));
    }

    public function create()
    {
        return view('sopir.create');
    }

    public function store(Request $request)
    {
        $data = $validatedData = $request->validate([
            'nama' => 'required|string',
            'nomorHP' => 'required|string',
            'hargaJasa' => 'required|integer',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);


        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $gambarPath = $gambar->store('public/gambar');
            $data['gambar'] = $gambarPath;
        }
    
        Sopir::create($validatedData);

        return redirect()->route('sopir.index')->with('success', 'Sopir berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $sopir = Sopir::findOrFail($id);
        $sopir->delete();

        return redirect()->route('sopir.index')->with('success', 'Sopir berhasil dihapus.');
    }

  public function edit($id)
{
    $sopir = Sopir::findOrFail($id);
    return view('sopir.edit', compact('sopir'));
}


public function update(Request $request, $id)
{
    $data = $request->validate([
        'nama' => 'required|string',
        'nomorHP' => 'required|string',
        'hargaJasa' => 'required|integer',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $sopir = Sopir::findOrFail($id);

    if ($request->hasFile('gambar')) {
        $gambar = $request->file('gambar');
        $gambarPath = $gambar->store('public/gambar');
        $data['gambar'] = $gambarPath;

        // Hapus gambar lama jika ada
        if ($sopir->gambar) {
            Storage::delete($sopir->gambar);
        }
    }

    $sopir->update($data);

    return redirect()->route('sopir.index')->with('success', 'Sopir berhasil diperbarui.');
}


}