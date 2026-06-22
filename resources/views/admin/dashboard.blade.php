@extends('admin.layout')@section('t','Visão geral')
@section('content')
<div class="admin-top"><h2 style="color:var(--roxo-esc)">Visão geral</h2></div>
<div class="stat-grid">
  <div class="stat"><b>{{ $posts }}</b><span>Artigos no blog</span></div>
  <div class="stat"><b>{{ $testis }}</b><span>Depoimentos</span></div>
  <div class="stat"><b>{{ $leads }}</b><span>Leads (avaliações)</span></div>
</div>
<div class="card">
  <h3 style="color:var(--roxo-esc);margin-bottom:12px">Últimos leads</h3>
  <div class="tbl-wrap"><table class="tbl"><tr><th>Nome</th><th>WhatsApp</th><th>Avaliação</th><th>Resultado</th><th>Data</th></tr>
    @forelse($ultimos as $l)
      <tr><td>{{ $l->nome }}</td><td>{{ $l->telefone }}</td><td><span class="chip">{{ $l->calculadora }}</span></td><td>{{ $l->classificacao }}</td><td>{{ $l->created_at->format('d/m/Y') }}</td></tr>
    @empty<tr><td colspan="5" class="muted">Nenhum lead ainda.</td></tr>@endforelse
  </table></div>
</div>
@endsection
