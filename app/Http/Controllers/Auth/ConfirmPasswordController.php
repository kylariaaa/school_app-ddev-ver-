<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    use ConfirmsPasswords;

    // setelah konfirmasi password berhasil, arahkan ke dashboard
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        // hanya user yang sudah login (auth) bisa konfirmasi password
        $this->middleware('auth');
    }
}
