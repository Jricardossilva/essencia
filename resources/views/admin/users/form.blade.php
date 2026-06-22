@extends('admin.layout')@section('t','Usuário')
@section('content')
<div class="admin-top"><h2>{{ $user->exists ? 'Editar usuário' : 'Novo usuário' }}</h2></div>
<div class="card" style="max-width:480px">
  @if($errors->any())<div class="errline" style="margin-bottom:10px">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ $user->exists ? route('admin.usuarios.update',$user) : route('admin.usuarios.store') }}">
    @csrf @if($user->exists) @method('PUT') @endif
    <div class="adm-field"><label>Nome</label><input name="name" value="{{ old('name',$user->name) }}" required></div>
    <div class="adm-field"><label>E-mail</label><input type="email" name="email" value="{{ old('email',$user->email) }}" required></div>
    <div class="adm-field"><label>{{ $user->exists ? 'Nova senha (deixe em branco para manter)' : 'Senha' }}</label><input type="password" name="password" autocomplete="new-password" placeholder="Mínimo 8 caracteres" {{ $user->exists ? '' : 'required' }}></div>
    <div class="adm-field"><label>Confirmar senha</label><input type="password" name="password_confirmation" autocomplete="new-password" {{ $user->exists ? '' : 'required' }}></div>
    <button class="btn btn-primary">Salvar</button>
    <a class="btn btn-ghost" href="{{ route('admin.usuarios.index') }}">Cancelar</a>
  </form>
</div>
@endsection
