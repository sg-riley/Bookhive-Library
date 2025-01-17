<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RekomendasiController extends Controller
{
    public function index()
    {
  
        $rekomendasi = Rekomendasi::with('user')->get()->map(function ($item) {
            return [
                'id_rekomendasi' => $item->id_rekomendasi,
                'nama_pengguna' => $item->user()->first()->nama_lengkap,
                'judul' => $item->judul,
                'penulis' => $item->penulis,
                'tahun_terbit' => $item->tahun_terbit,
                'kategori' => $item->kategori, 
                'alasan' => $item->alasan,
            ];
        });

        
        return response()->json([
            'data' => $rekomendasi,
            'message' => 'Berhasil mengambil data rekomendasi'
        ], 200);
    }


    public function show($id)
    {
        $rekomendasi = Rekomendasi::find($id);

        if (!$rekomendasi) {
            return response()->json([
                'message' => 'Data rekomendasi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'data' => $rekomendasi,
            'message' => 'Berhasil mengambil data rekomendasi'
        ], 200);
    }

    public function store(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'id_pengguna' => 'required|exists:users,id_pengguna',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'alasan' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $rekomendasi = Rekomendasi::create([
            'id_pengguna' => $request->id_pengguna,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'kategori' => $request->kategori,
            'tahun_terbit' => $request->tahun_terbit,
            'alasan' => $request->alasan,
        ]);

        return response()->json([
            'data' => $rekomendasi,
            'message' => 'Rekomendasi berhasil ditambahkan'
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $rekomendasi = Rekomendasi::find($id);

        if (!$rekomendasi) {
            return response()->json([
                'message' => 'Data rekomendasi tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_pengguna' => 'required|exists:users,id_pengguna',
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'alasan' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 400);
        }

        $rekomendasi->update([
            'id_pengguna' => $request->id_pengguna,
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'kategori' => $request->kategori,
            'tahun_terbit' => $request->tahun_terbit,
            'alasan' => $request->alasan,
        ]);

        return response()->json([
            'data' => $rekomendasi,
            'message' => 'Rekomendasi berhasil diperbarui'
        ], 200);
    }

    public function destroy($id)
    {
        $rekomendasi = Rekomendasi::find($id);

        if (!$rekomendasi) {
            return response()->json([
                'message' => 'Data rekomendasi tidak ditemukan'
            ], 404);
        }

        $rekomendasi->delete();

        return response()->json([
            'message' => 'Rekomendasi berhasil dihapus'
        ], 200);
    }
}
