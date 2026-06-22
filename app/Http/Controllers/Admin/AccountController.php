<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class AccountController extends Controller
{
    public function editPassword() { return view('admin.account.password'); }

    public function updatePassword(Request $req)
    {
        $req->validate([
            'senha_atual' => ['required','current_password'],
            'password'    => ['required','confirmed', Password::min(8)],
        ], [
            'senha_atual.current_password' => 'A senha atual está incorreta.',
            'password.confirmed'           => 'A confirmação da nova senha não confere.',
        ]);

        $req->user()->update(['password' => $req->password]);

        return back()->with('ok', 'Senha alterada com sucesso.');
    }
}
