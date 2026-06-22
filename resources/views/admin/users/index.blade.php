@extends('admin.layout')@section('t','Usuários')
@section('content')
<div class="admin-top"><h2>Usuários</h2><a class="btn btn-primary btn-sm" href="{{ route('admin.usuarios.create') }}">+ Novo usuário</a></div>
<div class="card"><div class="tbl-wrap"><table class="tbl">
  <tr><th>Nome</th><th>E-mail</th><th>Criado em</th><th></th></tr>
  @foreach($users as $u)
  <tr>
    <td>{{ $u->name }} @if($u->id===auth()->id())<span class="chip">você</span>@endif</td>
    <td>{{ $u->email }}</td>
    <td>{{ $u->created_at?->format('d/m/Y') }}</td>
    <td style="white-space:nowrap">
      <a class="btn btn-ghost btn-sm" href="{{ route('admin.usuarios.edit',$u) }}">Editar</a>
      @if($u->id!==auth()->id())
      <form method="POST" action="{{ route('admin.usuarios.destroy',$u) }}" style="display:inline" onsubmit="return confirm('Remover este usuário?')">@csrf @method('DELETE')<button class="btn btn-ghost btn-sm">Excluir</button></form>
      @endif
    </td>
  </tr>
  @endforeach
</table></div></div>
@endsection
