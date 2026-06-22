@extends('layouts.app')
@section('title',$post->titulo.' · Essência')
@section('desc',$post->resumo)
@section('content')
@include('partials.pagehead',['cor'=>'#475538','crumb'=>'Blog › '.$post->categoria,'eyebrow'=>$post->categoria,'titulo'=>$post->titulo,'sub'=>''])

@php $hero = $post->img('imagem_principal') ?? $post->img('capa'); @endphp
@if($hero)
<div class="wrap" style="margin-top:-32px;position:relative;z-index:2">
  <div class="post-hero"><img src="{{ $hero }}" alt="{{ $post->titulo }}"></div>
</div>
@endif

<section class="section" style="@if($hero)padding-top:40px @endif"><div class="wrap prose">
  @if($post->resumo)<p class="lead">{{ $post->resumo }}</p>@endif

  @php
    $paras = preg_split('/\n{2,}|\n/', trim((string)$post->conteudo), -1, PREG_SPLIT_NO_EMPTY);
    $mid   = (int) ceil(count($paras) / 2);
    $sec   = $post->img('imagem_secundaria');
  @endphp

  <div style="margin-top:1rem">
    @foreach($paras as $idx => $par)
      @if($sec && $idx === $mid)
        <figure class="content-img"><img src="{{ $sec }}" alt="{{ $post->titulo }}"></figure>
      @endif
      <p>{{ $par }}</p>
    @endforeach
    @if($sec && $mid >= count($paras))
      <figure class="content-img"><img src="{{ $sec }}" alt="{{ $post->titulo }}"></figure>
    @endif
  </div>

  <a class="btn btn-ghost mt" href="{{ route('blog') }}">← Voltar ao blog</a>
  <div class="softcard" style="margin-top:2rem;text-align:center">
    <p style="margin:0 0 .8rem;font-weight:500;color:var(--verde)">Quer cuidar disso de perto?</p>
    <a class="btn btn-primary" data-wa="Olá, Essência! Li um artigo no site e gostaria de uma avaliação.">Agendar avaliação</a>
  </div>
</div></section>
@endsection
