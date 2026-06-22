<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index() { return view('admin.users.index', ['users' => User::orderBy('name')->get()]); }
    public function create() { return view('admin.users.form', ['user' => new User()]); }

    public function store(Request $req)
    {
        $req->validate([
            'name'     => ['required','string','max:120'],
            'email'    => ['required','email','max:160','unique:users,email'],
            'password' => ['required','confirmed', Password::min(8)],
        ]);
        User::create($req->only('name','email','password'));
        return redirect()->route('admin.usuarios.index')->with('ok', 'Usuário criado.');
    }

    public function edit(User $user) { return view('admin.users.form', ['user' => $user]); }

    public function update(Request $req, User $user)
    {
        $req->validate([
            'name'     => ['required','string','max:120'],
            'email'    => ['required','email','max:160', Rule::unique('users','email')->ignore($user->id)],
            'password' => ['nullable','confirmed', Password::min(8)],
        ]);
        $data = $req->only('name','email');
        if ($req->filled('password')) $data['password'] = $req->password;
        $user->update($data);
        return redirect()->route('admin.usuarios.index')->with('ok', 'Usuário atualizado.');
    }

    public function destroy(Request $req, User $user)
    {
        if ($user->id === $req->user()->id) return back()->with('ok', 'Você não pode excluir o próprio usuário.');
        if (User::count() <= 1) return back()->with('ok', 'É preciso manter ao menos um usuário.');
        $user->delete();
        return back()->with('ok', 'Usuário removido.');
    }
}
