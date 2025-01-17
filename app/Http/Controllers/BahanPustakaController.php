<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BahanPustaka;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;

class BahanPustakaController extends Controller
{


    public function index()
    {
        $bahanPustakas = BahanPustaka::with('kategori')->get()->map(function ($bahan) {
            return [
                'id_bahan_pustaka' => $bahan->id_bahan_pustaka,
                'id_kategori' => $bahan->id_kategori,
                'judul' => $bahan->judul,
                'isbn' => $bahan->isbn,
                'tahun_terbit' => $bahan->tahun_terbit,
                'penulis' => $bahan->penulis,
                'penerbit' => $bahan->penerbit,
                'deskripsi' => $bahan->deskripsi,
                'jumlah' => $bahan->jumlah,
                'gambar_sampul' => $bahan->gambar_sampul,
                'nama_kategori' => $bahan->kategori->nama_kategori, // Ambil nama kategori
            ];
        });

        return response()->json(['message' => 'List bahan pustaka retrieved successfully', 'data' => $bahanPustakas], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'tahun_terbit' => 'required|integer',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar_sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_sampul')) {
            $file = $request->file('gambar_sampul');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('images/bahan_pustaka', $fileName, 'public');
            $validated['gambar_sampul'] = $filePath;
        }

        $bahanPustaka = BahanPustaka::create($validated);

        return response()->json(['message' => 'Bahan Pustaka created successfully', 'data' => $bahanPustaka], 201);
    }

    public function show($id)
    {
        $bahanPustaka = BahanPustaka::with('kategori')->find($id);

        if (!$bahanPustaka) {
            return response()->json(['message' => 'Bahan Pustaka not found'], 404);
        }

        return response()->json([
            'data' => [
                'id_bahan_pustaka' => $bahanPustaka->id_bahan_pustaka,
                'id_kategori' => $bahanPustaka->id_kategori,
                'judul' => $bahanPustaka->judul,
                'isbn' => $bahanPustaka->isbn,
                'tahun_terbit' => $bahanPustaka->tahun_terbit,
                'penulis' => $bahanPustaka->penulis,
                'penerbit' => $bahanPustaka->penerbit,
                'deskripsi' => $bahanPustaka->deskripsi,
                'jumlah' => $bahanPustaka->jumlah,
                'gambar_sampul' => $bahanPustaka->gambar_sampul,
                'nama_kategori' => $bahanPustaka->kategori->nama_kategori, // Menambahkan nama kategori
            ]
        ], 200);
    }


    public function update(Request $request, $id)
    {
        $bahanPustaka = BahanPustaka::find($id);

        if (!$bahanPustaka) {
            return response()->json(['message' => 'Bahan Pustaka not found'], 404);
        }

        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'tahun_terbit' => 'required|integer',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar_sampul' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_sampul')) {
            if ($bahanPustaka->gambar_sampul) {
                Storage::disk('public')->delete($bahanPustaka->gambar_sampul);
            }
            $file = $request->file('gambar_sampul');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('images/bahan_pustaka', $fileName, 'public');
            $validated['gambar_sampul'] = $filePath;
        }

        $bahanPustaka->update($validated);

        return response()->json(['message' => 'Bahan Pustaka updated successfully', 'data' => $bahanPustaka], 200);
    }

    public function destroy($id)
    {
        $bahanPustaka = BahanPustaka::find($id);

        if (!$bahanPustaka) {
            return response()->json(['message' => 'Bahan Pustaka not found'], 404);
        }

        if ($bahanPustaka->gambar_sampul) {
            Storage::disk('public')->delete($bahanPustaka->gambar_sampul);
        }

        $bahanPustaka->delete();

        return response()->json(['message' => 'Bahan Pustaka deleted successfully'], 200);
    }

    public function storeDonasi(Request $request)
    {
        $validated = $request->validate([
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'tahun_terbit' => 'required|integer',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|integer',
            'gambar_sampul' => 'required|string',
        ]);

        if ($request->hasFile('gambar_sampul')) {
            $file = $request->file('gambar_sampul');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('images/bahan_pustaka', $fileName, 'public');
            $validated['gambar_sampul'] = $filePath;
        }

        $bahanPustaka = BahanPustaka::create($validated);

        return response()->json(['message' => 'Bahan Pustaka created successfully', 'data' => $bahanPustaka], 201);
    }
}
