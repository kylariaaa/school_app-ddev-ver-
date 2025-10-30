<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers; // <-- trait yang berisi logika login

    // setelah login berhasil, user diarahkan ke /dashboard
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        // middleware guest: hanya bisa akses login saat belum login
        // except logout: agar logout tetap bisa dijalankan meski sudah login
        $this->middleware('guest')->except('logout');
    }
}
