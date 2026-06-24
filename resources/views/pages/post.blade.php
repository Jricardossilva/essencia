@extends('layouts.app')
@section('title',$post->titulo.' · Essência')
@section('desc',$post->resumo)
@section('content')
<style>
  .article-body{color:var(--ink);font-size:1.06rem;line-height:1.8}
  .article-body p{margin:0 0 1rem}
  .article-body h1,.article-body h2,.article-body h3,.article-body h4{font-family:var(--serif);color:var(--verde);margin:1.6rem 0 .5rem;line-height:1.2}
  .article-body ul,.article-body ol{margin:0 0 1rem;padding-left:1.5rem}
  .article-body li{margin:.3rem 0}
  .article-body a{color:var(--dourado);text-decoration:underline}
  .article-body blockquote{margin:1.2rem 0;padding:.7rem 1.2rem;border-left:3px solid var(--dourado);background:var(--marfim-2);border-radius:8px;font-style:italic}
  .article-body img{max-width:100%;height:auto;border-radius:12px;margin:1rem 0}
  .article-body table{width:100%;border-collapse:collapse;margin:1rem 0}
  .article-body td,.article-body th{border:1px solid var(--line);padding:.5rem .7rem}
  .article-body hr{border:none;border-top:1px solid var(--line);margin:1.6rem 0}
</style>
@include('partials.pagehead',['cor'=>'#475538','crumb'=>'Blog › '.$post->categoria,'eyebrow'=>$post->categoria,'titulo'=>$post->titulo,'sub'=>''])

@php $hero = $post->img('imagem_principal') ?? $post->img('capa'); @endphp
@if($hero)
<div class="wrap" style="margin-top:-32px;position:relative;z-index:2">
  <div class="post-hero"><img src="{{ $hero }}" alt="{{ $post->titulo }}"></div>
</div>
@endif

@php
  $html = (string) $post->conteudo;
  $sec  = $post->img('imagem_secundaria');
  if ($sec) {
      $figura = '<figure class="content-img"><img src="'.$sec.'" alt="'.e($post->titulo).'"></figure>';
      $partes = explode('</p>', $html);
      if (count($partes) >= 3) {                       // insere no meio, entre parágrafos
          $meio = intdiv(count($partes), 2);
          $partes[$meio] = $figura.$partes[$meio];
          $html = implode('</p>', $partes);
      } else {
          $html .= $figura;                            // poucos parágrafos: ao final
      }
  }
@endphp

<section class="section" style="@if($hero)padding-top:40px @endif"><div class="wrap prose">
  @if($post->resumo)<p class="lead">{{ $post->resumo }}</p>@endif
  <div class="article-body">{!! $html !!}</div>

  <a class="btn btn-ghost mt" href="{{ route('blog') }}">← Voltar ao blog</a>
  <div class="softcard" style="margin-top:2rem;text-align:center">
    <p style="margin:0 0 .8rem;font-weight:500;color:var(--verde)">Quer cuidar disso de perto?</p>
    <a class="btn btn-primary" data-wa="Olá, Essência! Li um artigo no site e gostaria de uma avaliação.">Agendar avaliação</a>
  </div>
</div></section>
@endsection