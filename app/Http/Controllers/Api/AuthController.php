<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Proses login user dan menghasilkan token Sanctum.
     */
    public function login(Request $request)
    {
        // Validasi input dari request
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Coba autentikasi menggunakan kredensial yang diberikan
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Email atau password salah.'
            ], 401); // Unauthorized
        }

        // Ambil data user yang berhasil login
        $user = Auth::user();

        // Buat token baru menggunakan Sanctum
        $token = $user->createToken('auth_token')->plainTextToken;

        // Kirimkan response sukses beserta token
        return response()->json([
            'message' => 'Login berhasil.',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    /**
     * Proses logout user dan menghapus token yang aktif.
     */
    public function logout(Request $request)
    {
        // Pastikan user sedang terautentikasi
        if ($request->user()) {
            // Hapus token yang digunakan saat ini
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'message' => 'Logout berhasil.'
            ]);
        }

        // Jika tidak ada user aktif (token invalid)
        return response()->json([
            'message' => 'Token tidak valid atau sudah logout.'
        ], 401);
    }
}
