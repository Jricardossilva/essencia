@extends('layouts.app')
@section('title','Quem Somos · Essência')
@section('content')
@include('partials.pagehead',['cor'=>'#475538','crumb'=>'Quem Somos','eyebrow'=>'Quem Somos','titulo'=>'Danielle Ferreira de Santana','sub'=>'Fisioterapeuta · '.config('site.crefito')])

<section class="section"><div class="wrap split" style="--c:var(--verde)">
  <div class="illus" style="padding:30px;display:grid;place-items:center"><img src="{{ asset('assets/logo-essencia.png') }}" alt="Essência" style="max-width:320px"></div>
  <div>
    <span class="eyebrow">A profissional</span>
    <h2 class="mt" style="margin-bottom:.4rem">Cuidado humanizado e baseado em evidências</h2>
    <p class="lead">Mestranda em Funcionalidade Humana pela Universidade Federal da Paraíba (UFPB), com experiência em fisioterapia pélvica, saúde da mulher e do homem, geriatria e cuidados paliativos.</p>
    <ul class="bullets">
      <li><span class="bk">✓</span> Atendimento humanizado e individualizado</li>
      <li><span class="bk">✓</span> Tratamento baseado em evidências científicas</li>
      <li><span class="bk">✓</span> Especialização em saúde da mulher e do homem</li>
      <li><span class="bk">✓</span> Atendimento domiciliar em {{ config('site.cidade') }}</li>
    </ul>
    <a class="btn btn-primary mt" data-wa="Olá, Danielle! Gostaria de agendar uma avaliação.">Agendar avaliação</a>
  </div>
</div></section>

<section class="section tint"><div class="wrap center">
  <div class="spine" style="margin-bottom:18px"><i></i><i></i><i></i><i></i><i></i></div>
  <h2 class="serif" style="font-style:italic">"Porque cuidar da sua saúde também é cuidar do seu bem-estar."</h2>
</div></section>
@endsection
