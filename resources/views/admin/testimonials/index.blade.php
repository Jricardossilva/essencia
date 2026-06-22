@extends('admin.layout')@section('t','Depoimentos')
@section('content')
<div class="admin-top"><h2 style="color:var(--roxo-esc)">Depoimentos</h2><a class="btn btn-grad btn-sm" href="{{ route('admin.testimonials.create') }}">+ Novo depoimento</a></div>
<div class="card"><div class="tbl-wrap"><table class="tbl">
  <tr><th>Autor</th><th>Texto</th><th>★</th><th>Status</th><th></th></tr>
  @forelse($itens as $d)
  <tr>
    <td>{{ $d->autor }}</td><td>{{ \Illuminate\Support\Str::limit($d->texto,60) }}</td>
    <td>{{ str_repeat('★',$d->estrelas) }}</td>
    <td>{{ $d->publicado ? 'Publicado' : 'Oculto' }}</td>
    <td style="white-space:nowrap">
      <a class="btn btn-ghost btn-sm" href="{{ route('admin.testimonials.edit',$d) }}">Editar</a>
      <form method="POST" action="{{ route('admin.testimonials.destroy',$d) }}" style="display:inline" onsubmit="return confirm('Remover?')">@csrf @method('DELETE')<button class="btn btn-ghost btn-sm">Excluir</button></form>
    </td>
  </tr>
  @empty<tr><td colspan="5" class="muted">Nenhum depoimento.</td></tr>@endforelse
</table></div></div>
@endsection
