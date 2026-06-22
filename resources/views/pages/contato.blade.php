@extends('layouts.app')
@section('title','Contato · Essência')
@section('content')
@include('partials.pagehead',['cor'=>'#475538','crumb'=>'Contato','eyebrow'=>'Contato','titulo'=>'Agende sua avaliação','sub'=>'Atendimento humanizado e domiciliar. Fale com a gente pelo WhatsApp.'])
<section class="section"><div class="wrap contact-grid">
  <div>
    <div class="cc"><div class="ci">📱</div><div><b>WhatsApp</b><span>{{ config('site.whatsapp_fmt') }}</span></div></div>
    <div class="cc"><div class="ci">✉️</div><div><b>E-mail</b><span>{{ config('site.email') }}</span></div></div>
    <div class="cc"><div class="ci">📍</div><div><b>Atendimento</b><span>Domiciliar · {{ config('site.cidade') }}</span></div></div>
    <div class="cc"><div class="ci">🪪</div><div><b>Registro</b><span>{{ config('site.crefito') }}</span></div></div>
    <a class="btn btn-wa mt" data-wa="Olá, Essência! Gostaria de agendar uma avaliação.">Falar no WhatsApp</a>
    <a class="btn btn-ghost mt" href="mailto:{{ config('site.email') }}" style="margin-left:.5rem">Enviar e-mail</a>
  </div>
  <div class="softcard">
    <h3 class="serif" style="font-size:1.6rem;margin-bottom:.5rem">Cuidado especializado para a mulher, o homem e o idoso</h3>
    <p class="muted">"Seu bem-estar merece atenção especializada. Entre em contato e descubra como a fisioterapia pode transformar sua qualidade de vida."</p>
    <div class="spine" style="margin-top:1rem;flex-direction:row;align-items:center"><i></i><i></i><i></i><i></i><i></i></div>
  </div>
</div></section>
@endsection
