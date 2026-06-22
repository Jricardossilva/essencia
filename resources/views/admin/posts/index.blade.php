@extends('admin.layout')@section('t','Blog')
@section('content')
<div class="admin-top"><h2>Blog</h2><a class="btn btn-primary btn-sm" href="{{ route('admin.posts.create') }}">+ Novo artigo</a></div>
@if(session('ok'))<div class="flash">{{ session('ok') }}</div>@endif
<div class="card"><div class="tbl-wrap"><table class="tbl">
  <tr><th></th><th>Título</th><th>Categoria</th><th>Status</th><th>Data</th><th></th></tr>
  @forelse($posts as $p)
  <tr>
    <td style="width:64px">
      @if($p->capa)<img src="{{ $p->img('capa') }}" alt="" style="width:56px;height:40px;object-fit:cover;border-radius:6px;border:1px solid var(--line)">
      @else<div style="width:56px;height:40px;border-radius:6px;background:linear-gradient(135deg,var(--salvia),var(--folha))"></div>@endif
    </td>
    <td>{{ $p->titulo }}</td>
    <td><span class="chip">{{ $p->categoria }}</span></td>
    <td>{{ $p->publicado ? 'Publicado' : 'Rascunho' }}</td>
    <td>{{ $p->created_at->format('d/m/Y') }}</td>
    <td style="white-space:nowrap">
      <a class="btn btn-ghost btn-sm" href="{{ route('admin.posts.edit',$p) }}">Editar</a>
      <form method="POST" action="{{ route('admin.posts.destroy',$p) }}" style="display:inline" onsubmit="return confirm('Remover este artigo?')">@csrf @method('DELETE')<button class="btn btn-ghost btn-sm">Excluir</button></form>
    </td>
  </tr>
  @empty<tr><td colspan="6" class="muted">Nenhum artigo.</td></tr>@endforelse
</table></div></div>
@endsection
