@extends('layouts.app')
@section('title','Saúde da Mulher · Essência')
@section('content')
@include('partials.pagehead',['cor'=>'#7F8A6A','crumb'=>'Saúde da Mulher','eyebrow'=>'Saúde da Mulher','titulo'=>'Cuidado integral para a mulher','sub'=>'Acreditamos que a sexualidade e a saúde íntima são parte fundamental do bem-estar da mulher em todas as fases da vida, inclusive na maternidade.'])

<section class="section"><div class="wrap">
  <div class="areas">
    @php $cards=[
      ['fisioterapia-pelvica','Fisioterapia Pélvica Feminina','Incontinência, dor pélvica, vaginismo, dispareunia e prolapso.'],
      ['gestacao','Gestação','Acompanhamento para uma gestação mais saudável e confortável.'],
      ['pos-parto','Pós-Parto','Recuperação segura do corpo, do assoalho pélvico e da autoestima.'],
    ]; @endphp
    @foreach($cards as $c)
      <div class="acard" style="--c:#7F8A6A">
        <h3>{{ $c[1] }}</h3><p>{{ $c[2] }}</p>
        <a href="{{ url('/saude-da-mulher/'.$c[0]) }}">Saiba mais →</a>
      </div>
    @endforeach
    <div class="acard" style="--c:#B8945A">
      <h3>Sexualidade Feminina</h3>
      <p>Intimidade, conforto e bem-estar — com acolhimento e base científica.</p>
      <a href="{{ route('sexualidade') }}">Saiba mais →</a>
    </div>
  </div>
</div></section>
@include('partials.ctaband')
@endsection
