<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
  
    public function index()
    {
        $ruangan = Ruangan::all();
        return response()->json(['message' => 'List ruangan retrieved successfully', 'data' => $ruangan], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar_ruangan' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('gambar_ruangan')) {
            $file = $request->file('gambar_ruangan');
            $fileName = time().'_'.$file->getClientOriginalName();
            $filePath = $file->storeAs('images/ruangan', $fileName, 'public');
            $validated['gambar_ruangan'] = $filePath;
        }

        $ruangan = Ruangan::create($validated);

        return response()->json([
            'message' => 'Ruangan created successfully',
            'data' => $ruangan
        ], 201);
    }


  
    public function show($id)
    {
        $ruangan = Ruangan::find($id);

        if (!$ruangan) {
            return response()->json(['message' => 'Ruangan not found'], 404);
        }

        return response()->json(['message' => 'Ruangan retrieved successfully', 'data' => $ruangan], 200);
    }


    public function update(Request $request, $id)
    {
        $ruangan = Ruangan::find($id);

        if (!$ruangan) {
            return response()->json(['message' => 'Ruangan not found'], 404);
        }

        $validated = $request->validate([
            'nama_ruangan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar_ruangan' => 'required|string',
        ]);

        $ruangan->update($validated);

        return response()->json(['message' => 'Ruangan updated successfully', 'data' => $ruangan], 200);
    }

   
    public function destroy($id)
    {
        $ruangan = Ruangan::find($id);

        if (!$ruangan) {
            return response()->json(['message' => 'Ruangan not found'], 404);
        }

        $ruangan->delete();

        return response()->json(['message' => 'Ruangan deleted successfully'], 200);
    }
}
