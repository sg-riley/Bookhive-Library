<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DonasiController extends Controller
{
 
    public function index()
    {
        $donasi = Donasi::with(['user', 'kategori'])->get()->map(function ($item) {
            return [
                'id_donasi' => $item->id_donasi,
                'id_kategori' => $item->id_kategori,
                'judul' => $item->judul,
                'isbn' => $item->isbn,
                'tahun_terbit' => $item->tahun_terbit,
                'penulis' => $item->penulis,
                'penerbit' => $item->penerbit,
                'deskripsi' => $item->deskripsi,
                'jumlah' => $item->jumlah,
                'gambar_sampul' => $item->gambar_sampul,
                'status_pengajuan' => $item->status_pengajuan,
                'nama_pengguna' => $item->user->nama_lengkap,  
                'kategori' => $item->kategori()->first()->nama_kategori,  
            ];
        });

        return response()->json([
            'data' => $donasi,
            'message' => 'Data donasi berhasil diambil'
        ], 200);
    }

    
    public function show($id)
    {
        $donasi = Donasi::with(['user', 'kategori'])->find($id);

        if (!$donasi) {
            return response()->json([
                'message' => 'Data donasi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $donasi,
            'message' => 'Data donasi berhasil diambil'
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_pengguna' => 'required|exists:users,id_pengguna',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|numeric',
            'gambar_sampul' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'status_pengajuan' => 'nullable|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $file = $request->file('gambar_sampul');
        $path = $file->store('images', 'public');

        $donasi = Donasi::create([
            'id_pengguna' => $request->id_pengguna,
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'isbn' => $request->isbn,
            'tahun_terbit' => $request->tahun_terbit,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'deskripsi' => $request->deskripsi,
            'jumlah' => $request->jumlah,
            'gambar_sampul' => $path,
            'status_pengajuan' => $request->status_pengajuan,
        ]);

        return response()->json([
            'data' => $donasi,
            'message' => 'Data donasi berhasil disimpan'
        ], 201);
    }


    public function update(Request $request, $id)
    {
   
        $validator = Validator::make($request->all(), [
            'id_pengguna' => 'required|exists:users,id_pengguna',
            'id_kategori' => 'required|exists:kategoris,id_kategori',
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string|max:255',
            'tahun_terbit' => 'required|numeric',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jumlah' => 'required|numeric',
            'gambar_sampul' => 'required|image',
            'status_pengajuan' => 'nullable|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        $donasi = Donasi::find($id);

        if (!$donasi) {
            return response()->json([
                'message' => 'Data donasi tidak ditemukan'
            ], 404);
        }

        $donasi->update($request->all());

        return response()->json([
            'data' => $donasi,
            'message' => 'Data donasi berhasil diupdate'
        ], 200);
    }

    public function destroy($id)
    {
        $donasi = Donasi::find($id);

        if (!$donasi) {
            return response()->json([
                'message' => 'Data donasi tidak ditemukan'
            ], 404);
        }

  
        $donasi->delete();

        return response()->json([
            'message' => 'Data donasi berhasil dihapus'
        ], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status_pengajuan' => 'required|in:0,1',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        $donasi = Donasi::find($id);

        if (!$donasi) {
            return response()->json([
                'message' => 'Data donasi tidak ditemukan',
            ], 404);
        }

        $donasi->status_pengajuan = $request->status_pengajuan;
        $donasi->save();

        return response()->json([
            'data' => $donasi,
            'message' => 'Status pengajuan donasi berhasil diperbarui',
        ], 200);
    }
}
