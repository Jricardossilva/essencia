@extends('admin.layout')@section('t','Leads')
@section('content')
<div class="admin-top"><h2 style="color:var(--roxo-esc)">Leads (avaliações)</h2></div>
<div class="card"><div class="tbl-wrap"><table class="tbl">
  <tr><th>Nome</th><th>E-mail</th><th>WhatsApp</th><th>Avaliação</th><th>Resultado</th><th>Data</th></tr>
  @forelse($leads as $l)
  <tr><td>{{ $l->nome }}</td><td>{{ $l->email }}</td><td>{{ $l->telefone }}</td>
      <td><span class="chip">{{ $l->calculadora }}</span></td><td>{{ $l->classificacao }}</td>
      <td>{{ $l->created_at->format('d/m/Y H:i') }}</td></tr>
  @empty<tr><td colspan="6" class="muted">Nenhum lead recebido ainda.</td></tr>@endforelse
</table></div>
<div class="mt">{{ $leads->links() }}</div>
</div>
@endsection
