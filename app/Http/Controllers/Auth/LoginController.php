<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show() { return view('admin.login'); }

    public function login(Request $req)
    {
        $cred = $req->validate([
            'email'    => ['required','email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($cred, $req->boolean('remember'))) {
            $req->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors(['email' => 'Credenciais inválidas.'])->onlyInput('email');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect()->route('home');
    }
}
