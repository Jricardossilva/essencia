@extends('layouts.app')
@section('title','Essência Fisioterapia Integrada · João Pessoa/PB')

@php
  $icons = [
    'saude-da-mulher' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="4"/><path d="M12 12v8M9 17h6"/></svg>',
    'saude-do-homem' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="10" cy="14" r="5"/><path d="M14 10l6-6m0 0h-5m5 0v5"/></svg>',
    'saude-do-idoso' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="4.5" r="2"/><path d="M11 7v6l-3 7m3-7l3 5M8 11h6M17 8v13"/></svg>',
    'atendimento-domiciliar' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l9-7 9 7M5 10v10h14V10"/><path d="M10 20v-5h4v5"/></svg>',
    'praticas-integrativas' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21c0-6 3-10 8-11-1 6-4 9-8 11zM12 21c0-5-2-8-6-9 1 5 3 7 6 9z"/></svg>',
    'cuidados-paliativos' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21s-7-4.5-7-10a4 4 0 017-2.6A4 4 0 0119 11c0 5.5-7 10-7 10z"/></svg>',
  ];
@endphp

@section('content')
<section class="hero"><div class="wrap">
  <div>
    <span class="eyebrow">Fisioterapia Integrada · {{ config('site.cidade') }}</span>
    <h1 class="mt">Cuidar da sua <em>essência</em> é cuidar de você por inteiro.</h1>
    <p class="tagline">Movimento, equilíbrio e cuidado em todas as fases da vida — fisioterapia pélvica, saúde da mulher e do homem, saúde do idoso e atendimento domiciliar.</p>
    <div class="actions">
      <a class="btn btn-primary" data-wa="Olá, Essência! Gostaria de agendar uma avaliação.">Agendar avaliação</a>
      <button class="btn btn-ghost" data-open-aval>Fazer avaliação online</button>
    </div>
    <div class="credential">Mestranda em Funcionalidade Humana · UFPB &nbsp;·&nbsp; {{ config('site.crefito') }}</div>
  </div>
  <img class="hero-emblem" src="{{ asset('assets/logo-essencia.png') }}" alt="Essência Fisioterapia Integrada">
</div></section>

<section class="section"><div class="wrap">
  <div class="kicker">
    <span class="eyebrow">Áreas de atuação</span>
    <h2>Cuidado especializado, do início ao fim</h2>
    <div class="divider mt"><span></span></div>
  </div>
  <div class="areas">
    @foreach(config('site.areas') as $slug => $a)
      <div class="acard" style="--c:{{ $a['cor'] }}">
        <div class="ic">{!! $icons[$slug] ?? '' !!}</div>
        <h3>{{ $a['nome'] }}</h3>
        <p>{{ $a['resumo'] }}</p>
        <a href="{{ $slug==='saude-da-mulher' ? route('mulher') : url('/'.$slug) }}">Saiba mais →</a>
      </div>
    @endforeach
  </div>
</div></section>

<section class="section tint"><div class="wrap split">
  <div class="illus" style="padding:30px;display:grid;place-items:center"><img src="{{ asset('assets/logo-essencia.png') }}" alt="Essência" style="max-width:320px"></div>
  <div>
    <span class="eyebrow">Quem somos</span>
    <h2 class="mt" style="margin-bottom:.4rem">Acolhimento e técnica em cada atendimento</h2>
    <p class="lead">Na Essência Fisioterapia Integrada, acreditamos que cuidar da saúde é cuidar da pessoa por inteiro — com escuta, respeito e tratamento baseado em evidências.</p>
    <ul class="bullets">
      <li><span class="bk">✓</span> Avaliação individualizada e humanizada</li>
      <li><span class="bk">✓</span> Especialização em saúde da mulher e do homem</li>
      <li><span class="bk">✓</span> Atendimento domiciliar em {{ config('site.cidade') }}</li>
    </ul>
    <a class="btn btn-primary mt" href="{{ route('quem-somos') }}">Conheça a Essência</a>
  </div>
</div></section>

<section class="section"><div class="wrap split">
  <div>
    <span class="eyebrow">Saúde da mulher</span>
    <h2 class="mt" style="margin-bottom:.4rem">Sexualidade na gestação e no pós-parto</h2>
    <p class="lead">A maternidade transforma o corpo e as emoções. Falar sobre intimidade nessa fase é parte do cuidado — com acolhimento, sem julgamentos e com base científica.</p>
    <a class="btn btn-ghost mt" href="{{ route('sexualidade') }}">Ler com calma</a>
  </div>
  <div class="softcard">
    <h3 class="serif" style="font-size:1.6rem;color:var(--verde);margin-bottom:.4rem">Você não está sozinha</h3>
    <p class="muted" style="margin:0">Alterações no desejo, desconfortos e dúvidas são comuns — e podem ser cuidadas. A fisioterapia pélvica ajuda você a viver sua intimidade com mais conforto e confiança.</p>
  </div>
</div></section>

<section class="section tint"><div class="wrap">
  <div class="kicker">
    <span class="eyebrow">Por que a Essência</span>
    <h2>Nossos diferenciais</h2>
  </div>
  <ul class="diffs">
    @foreach(config('site.diferenciais') as $d)<li><span class="bk">✓</span> {{ $d }}</li>@endforeach
  </ul>
</div></section>

@if($testimonials->count())
<section class="section"><div class="wrap center">
  <span class="eyebrow">Depoimentos</span>
  <h2 class="serif" style="font-style:italic;margin-top:.3rem">Quem confia na Essência</h2>
  <div class="testi" id="testi">
    @foreach($testimonials as $i => $d)
      <div class="tslide {{ $i===0?'active':'' }}">
        <div class="stars">{{ str_repeat('★',$d->estrelas) }}</div>
        <p>"{{ $d->texto }}"</p><cite>— {{ $d->autor }}</cite>
      </div>
    @endforeach
  </div>
  <div class="tdots">@foreach($testimonials as $i => $d)<button class="{{ $i===0?'on':'' }}" onclick="testiGo({{ $i }})"></button>@endforeach</div>
</div></section>
@endif

@if($posts->count())
<section class="section tint"><div class="wrap">
  <div style="display:flex;justify-content:space-between;align-items:flex-end;flex-wrap:wrap;gap:10px;margin-bottom:30px">
    <div><span class="eyebrow">Blog & conteúdo</span><h2 style="margin-top:.3rem">Conteúdo que cuida de você</h2></div>
    <a class="btn btn-ghost" href="{{ route('blog') }}">Ver todos os artigos</a>
  </div>
  <div class="blog-grid">
    @foreach($posts as $p)@include('partials.postcard',['p'=>$p])@endforeach
  </div>
</div></section>
@endif

@include('partials.ctaband')
@endsection
