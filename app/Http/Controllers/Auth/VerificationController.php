<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    use VerifiesEmails;

    // setelah verifikasi email, user diarahkan ke dashboard
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        // hanya user login yang bisa melakukan verifikasi email
        $this->middleware('auth');

        // verifikasi link harus bertanda tangan (signed URL)
        $this->middleware('signed')->only('verify');

        // membatasi percobaan request max 6 kali per menit untuk 'verify' dan 'resend'
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
