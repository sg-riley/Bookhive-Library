<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Container\Attributes\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $riwayatPeminjaman = Peminjaman::with('bahanPustaka', 'user', 'denda')->get();
        foreach ($riwayatPeminjaman as $item) {
            if ($item->bahanPustaka) {
                $item->bahanPustaka->kategori = Kategori::find($item->bahanPustaka->id_kategori);
            }
        }

        return response()->json(['data' => $riwayatPeminjaman, 'message' => 'Data riwayat peminjaman berhasil diambil'], 200);
    }

    public function pinjamBuku()
    {
        $validated = request()->validate([
            'id_pengguna' => 'required|exists:users,id_pengguna',
            'id_bahan_pustaka' => 'required|exists:bahanpustakas,id_bahan_pustaka',
            'tanggal_peminjaman' => 'required|date',
        ]);

        $validated['jatuh_tempo'] = date('Y-m-d', strtotime('+7 day', strtotime($validated['tanggal_peminjaman'])));
        $validated['status_peminjaman'] = 'menunggu konfirmasi';

        $peminjaman = Peminjaman::create($validated);

        return response()->json(['data' => $peminjaman, 'message' => 'Data peminjaman berhasil ditambahkan'], 200);
    }

    public function showRiwayatPeminjamanUser($id)
    {
        $peminjaman = Peminjaman::with('bahanPustaka', 'user', 'denda')->where('id_pengguna', $id)->get();

        foreach ($peminjaman as $item) {
            if ($item->bahanPustaka) {
                $item->bahanPustaka->kategori = Kategori::find($item->bahanPustaka->id_kategori);
            }
        }

        return response()->json(['data' => $peminjaman, 'message' => 'Data riwayat peminjaman berhasil diambil'], 200);
    }

    public function reviewPeminjaman(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string|max:1000',
        ]);

        if (!$peminjaman) {
            return response()->json(['message' => 'Peminjaman not found'], 404);
        }

        $peminjaman->update([
            'nilai' => $validated['rating'],
            'ulasan' => $validated['ulasan'],
        ]);

        return response()->json(['message' => 'Peminjaman updated successfully', 'data' => $peminjaman], 200);
    }

    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status_peminjaman' => 'required|in:diterima,ditolak,dikembalikan,menunggu konfirmasi',
            'jatuh_tempo' => 'required|date',
            'tanggal_pengembalian' => 'required_if:status_peminjaman,dikembalikan|date',
        ]);

        $peminjaman = Peminjaman::find($id);

        if (!$peminjaman) {
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }

        $peminjaman->update(['status_peminjaman' => $validated['status_peminjaman']]);

        return response()->json([
            'message' => 'Status peminjaman berhasil diperbarui',
            'data' => $peminjaman
        ], 200);
    }
}
