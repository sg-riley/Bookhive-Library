<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\User;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        $riwayatReservasi = Reservasi::with('user', 'ruangan')->get();
        foreach ($riwayatReservasi as $item) {
            if ($item->ruangan) {
                $item->ruangan->detail = Ruangan::find($item->ruangan->id_ruangan);
            }
        }

        return response()->json([
            'data' => $riwayatReservasi,
            'message' => 'Data riwayat reservasi berhasil diambil'
        ], 200);
    }

    public function tambahReservasi(Request $request)
    {
        $validated = $request->validate([
            'id_pengguna' => 'required|exists:users,id_pengguna',
            'id_ruangan' => 'required|exists:ruangans,id_ruangan',
            'tanggal_reservasi' => 'required|date',
        ]);

        $reservasi = Reservasi::create($validated);

        return response()->json([
            'data' => $reservasi,
            'message' => 'Data reservasi berhasil ditambahkan'
        ], 200);
    }

    public function showRiwayatReservasiUser($id)
    {
        $reservasi = Reservasi::with('user', 'ruangan')->where('id_pengguna', $id)->get();
        foreach ($reservasi as $item) {
            if ($item->ruangan) {
                $item->ruangan->detail = Ruangan::find($item->ruangan->id_ruangan);
            }
        }

        return response()->json([
            'data' => $reservasi,
            'message' => 'Data riwayat reservasi berhasil diambil'
        ], 200);
    }

}
