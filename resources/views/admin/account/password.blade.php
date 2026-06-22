@extends('admin.layout')@section('t','Minha senha')
@section('content')
<div class="admin-top"><h2>Minha senha</h2></div>
<div class="card" style="max-width:480px">
  <p class="muted" style="margin-top:0">Logado como <b>{{ auth()->user()->email }}</b></p>
  @if($errors->any())<div class="errline" style="margin-bottom:10px">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ route('admin.account.password.update') }}">
    @csrf @method('PUT')
    <div class="adm-field"><label>Senha atual</label><input type="password" name="senha_atual" required autocomplete="current-password"></div>
    <div class="adm-field"><label>Nova senha</label><input type="password" name="password" required autocomplete="new-password" placeholder="Mínimo 8 caracteres"></div>
    <div class="adm-field"><label>Confirmar nova senha</label><input type="password" name="password_confirmation" required autocomplete="new-password"></div>
    <button class="btn btn-primary">Alterar senha</button>
  </form>
</div>
@endsection
