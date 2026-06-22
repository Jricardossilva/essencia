@extends('layouts.app')
@section('title',$t['titulo'].' · Essência')
@section('content')
@include('partials.pagehead',['cor'=>$t['cor'],'crumb'=>$t['grupo'],'eyebrow'=>$t['eyebrow'],'titulo'=>$t['titulo'],'sub'=>$t['intro']])

<section class="section"><div class="wrap split" style="--c:{{ $t['cor'] }}">
  <div>
    @if(!empty($t['lista']))
      <span class="eyebrow" style="color:{{ $t['cor'] }}">{{ $t['lista_titulo'] ?? 'Atendemos' }}</span>
      <ul class="bullets mt">
        @foreach($t['lista'] as $item)<li><span class="bk">✓</span> {{ $item }}</li>@endforeach
      </ul>
    @endif
    <a class="btn btn-primary mt" data-wa="Olá, Essência! Tenho interesse em {{ $t['titulo'] }}.">Agendar avaliação</a>
  </div>
  <div>
    @if(!empty($t['beneficios']))
      <div class="softcard">
        <h3 class="serif" style="font-size:1.5rem;margin-bottom:.6rem">Benefícios</h3>
        <ul class="benef" style="grid-template-columns:1fr">
          @foreach($t['beneficios'] as $b)<li><span class="bk">✓</span> {{ $b }}</li>@endforeach
        </ul>
      </div>
    @endif
    <div class="softcard">
      <h3 class="serif" style="font-size:1.5rem;margin-bottom:.4rem">Atendimento domiciliar</h3>
      <p class="muted" style="margin:0">Levamos o cuidado até você, em {{ config('site.cidade') }}, com avaliação individualizada e baseada em evidências.</p>
    </div>
  </div>
</div></section>

@include('partials.ctaband')
@endsection
