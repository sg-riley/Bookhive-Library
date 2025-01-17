<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //buat nge get user yang lagi login
    public function getUser(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'nomor_telepon' => 'required|string|max:15',
        ]);

        $user = User::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'nomor_telepon' => $validated['nomor_telepon'],
            'id_role' => 1,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User registered successfully',
            'access_token' => $token,
            'user' => $user,
            'token_type' => 'Bearer',
        ], 201);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json(['message' => 'Username atau Password Salah'], 401);
        }

        $user->load('role');

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'user' => [
                'id_pengguna' => $user->id_pengguna,
                'nama_lengkap' => $user->nama_lengkap,
                'email' => $user->email,
                'nomor_telepon' => $user->nomor_telepon,
                'role' => $user->role->nama_role, 
            ],
            'token_type' => 'Bearer',
        ], 200);
    }

    

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function getAllUsers()
    {
        $users = User::with('role:id_role,nama_role') 
            ->where('id_role', '=', 1)
            ->get()
            ->map(function ($user) {
                return [
                    'id_pengguna' => $user->id_pengguna,
                    'nama_lengkap' => $user->nama_lengkap,
                    'email' => $user->email,
                    'nomor_telepon' => $user->nomor_telepon,
                    'id_role' => $user->id_role,
                    'nama_role' => $user->role->nama_role ?? null,
                ];
            });

        return response()->json([
            'message' => 'Users retrieved successfully',
            'users' => $users,], 200);
    }

    public function getAllAdmin()
    {
        $users = User::with('role:id_role,nama_role') 
            ->where('id_role', '=', 2)
            ->get()
            ->map(function ($user) {
                return [
                    'id_pengguna' => $user->id_pengguna,
                    'nama_lengkap' => $user->nama_lengkap,
                    'email' => $user->email,
                    'nomor_telepon' => $user->nomor_telepon,
                    'id_role' => $user->id_role,
                    'nama_role' => $user->role->nama_role ?? null,
                ];
            });

        return response()->json([
            'message' => 'Users retrieved successfully',
            'users' => $users,], 200);
    }

    public function deleteUser ($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User  not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User  deleted successfully'], 200);
    }



}
