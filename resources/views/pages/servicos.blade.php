@extends('layouts.app')
@section('title','Serviços · Essência')
@section('content')
@include('partials.pagehead',['cor'=>'#475538','crumb'=>'Serviços','eyebrow'=>'Nossos Serviços','titulo'=>'Soluções para cada fase da vida','sub'=>'Cuidado especializado, humanizado e baseado em evidências — conheça cada área de atuação.'])

@php $grupos=[
  ['slug'=>'saude-da-mulher','emoji'=>'🌸','nome'=>'Saúde da Mulher','desc'=>'Fisioterapia pélvica feminina, gestação, pós-parto e sexualidade — com acolhimento em cada fase.','itens'=>['Incontinência urinária e fecal','Bexiga hiperativa','Dor pélvica crônica','Vaginismo e dispareunia','Prolapso genital','Gestação e pós-parto','Sexualidade feminina'],'cor'=>'#7F8A6A','link'=>route('mulher')],
  ['slug'=>'saude-do-homem','emoji'=>'👨','nome'=>'Saúde do Homem','desc'=>'Fisioterapia pélvica masculina para devolver controle, confiança e qualidade de vida.','itens'=>['Incontinência urinária','Dor pélvica','Recuperação pós-prostatectomia','Disfunções sexuais','Fortalecimento do assoalho pélvico'],'cor'=>'#5A694B','link'=>url('/saude-do-homem')],
  ['slug'=>'saude-do-idoso','emoji'=>'👵','nome'=>'Saúde do Idoso','desc'=>'Fisioterapia geriátrica que promove independência, equilíbrio e funcionalidade.','itens'=>['Equilíbrio e risco de quedas','Fraqueza muscular','Limitações funcionais','Doenças neurológicas','Reabilitação pós-internação'],'cor'=>'#929B7C','link'=>url('/saude-do-idoso')],
  ['slug'=>'atendimento-domiciliar','emoji'=>'🏠','nome'=>'Atendimento Domiciliar','desc'=>'Levamos o cuidado até você, com a mesma técnica e atenção, no conforto da sua casa.','itens'=>['Idosos','Pacientes acamados','Pós-operatórios','Cuidados paliativos','Dificuldade de locomoção'],'cor'=>'#B8945A','link'=>url('/atendimento-domiciliar')],
  ['slug'=>'praticas-integrativas','emoji'=>'🌿','nome'=>'Práticas Integrativas','desc'=>'Abordagens complementares para o equilíbrio físico e emocional.','itens'=>['Técnicas de relaxamento','Auriculoterapia','Cuidados integrativos','Promoção do bem-estar'],'cor'=>'#6E7B4F','link'=>url('/praticas-integrativas')],
  ['slug'=>'cuidados-paliativos','emoji'=>'❤️','nome'=>'Cuidados Paliativos','desc'=>'Assistência humanizada para conforto, funcionalidade e dignidade.','itens'=>['Alívio de sintomas','Apoio à mobilidade','Acolhimento ao paciente e à família'],'cor'=>'#8A6E3A','link'=>url('/cuidados-paliativos')],
]; @endphp

<section class="section"><div class="wrap">
  <div class="svc-carousel" id="svcCarousel">
    <div class="svc-track" id="svcTrack">
      @foreach($grupos as $g)
        <article class="svc-slide" style="--c:{{ $g['cor'] }}">
          <div class="svc-img" style="background-image:url('{{ asset('assets/servicos/'.$g['slug'].'.jpg') }}')">
            <span class="svc-badge">{{ $g['emoji'] }}</span>
          </div>
          <div class="svc-info">
            <span class="eyebrow" style="color:{{ $g['cor'] }}">Área de atuação</span>
            <h3>{{ $g['nome'] }}</h3>
            <p class="sub">{{ $g['desc'] }}</p>
            <div class="svc-items">@foreach($g['itens'] as $it)<span>{{ $it }}</span>@endforeach</div>
            <div class="svc-cta">
              <a class="btn btn-primary" data-wa="Olá, Essência! Tenho interesse em {{ $g['nome'] }}.">Agendar avaliação</a>
              <a class="btn btn-ghost" href="{{ $g['link'] }}">Ver detalhes</a>
            </div>
          </div>
        </article>
      @endforeach
    </div>
    <button class="svc-arrow prev" onclick="svcMove(-1)" aria-label="Anterior">‹</button>
    <button class="svc-arrow next" onclick="svcMove(1)" aria-label="Próximo">›</button>
  </div>
  <div class="svc-dots" id="svcDots">
    @foreach($grupos as $i => $g)<button class="{{ $i===0?'on':'' }}" onclick="svcGo({{ $i }})" aria-label="{{ $g['nome'] }}"></button>@endforeach
  </div>
</div></section>

<section class="section tint"><div class="wrap">
  <div class="kicker"><span class="eyebrow">Por que a Essência</span><h2>Nossos diferenciais</h2></div>
  <ul class="diffs">@foreach(config('site.diferenciais') as $d)<li><span class="bk">✓</span> {{ $d }}</li>@endforeach</ul>
</div></section>
@include('partials.ctaband')
@endsection
