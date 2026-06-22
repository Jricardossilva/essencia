@extends('layouts.app')
@section('title','Sexualidade na Gestação e no Pós-Parto · Essência')
@section('desc','Sexualidade na gestação e no pós-parto: informação acolhedora e baseada em evidências, e como a fisioterapia pélvica pode ajudar.')
@section('content')
@include('partials.pagehead',['cor'=>'#7F8A6A','crumb'=>'Saúde da Mulher › Sexualidade','eyebrow'=>'Saúde da Mulher','titulo'=>'Sexualidade na Gestação e no Pós-Parto','sub'=>'Descubra uma nova forma de viver sua intimidade.'])

<section class="section"><div class="wrap prose">
  <p class="lead">A gravidez e o pós-parto trazem inúmeras transformações físicas, hormonais e emocionais. Essas mudanças podem influenciar o desejo sexual, a autoestima, o conforto durante as relações e a conexão com o parceiro.</p>
  <p>Na Essência Fisioterapia Integrada, acreditamos que a sexualidade é parte fundamental da saúde e do bem-estar da mulher em todas as fases da vida, inclusive durante a maternidade.</p>

  <h3>Sexualidade na Gestação</h3>
  <p>Muitas mulheres apresentam dúvidas e inseguranças sobre a vida sexual durante a gravidez. É comum ocorrer:</p>
  <ul class="check">
    <li><span class="bk">✔</span> Alterações no desejo sexual</li>
    <li><span class="bk">✔</span> Mudanças na sensibilidade corporal</li>
    <li><span class="bk">✔</span> Medo de prejudicar o bebê</li>
    <li><span class="bk">✔</span> Desconfortos físicos durante as relações</li>
    <li><span class="bk">✔</span> Alterações na autoestima e imagem corporal</li>
  </ul>
  <p>Na maioria das gestações de baixo risco, a atividade sexual é segura e pode contribuir para o bem-estar físico e emocional do casal.</p>

  <h3>Sexualidade no Pós-Parto</h3>
  <p>O nascimento do bebê marca o início de uma nova fase, que exige adaptação física e emocional. Nesse período podem surgir:</p>
  <ul class="check">
    <li><span class="bk">✔</span> Dor durante a relação sexual</li>
    <li><span class="bk">✔</span> Ressecamento vaginal</li>
    <li><span class="bk">✔</span> Diminuição da libido</li>
    <li><span class="bk">✔</span> Medo de retomar a atividade sexual</li>
    <li><span class="bk">✔</span> Alterações na autoestima</li>
    <li><span class="bk">✔</span> Fraqueza da musculatura do assoalho pélvico</li>
  </ul>
  <p>Essas alterações são frequentes e podem ser tratadas com acompanhamento adequado.</p>

  <h3>Como a Fisioterapia Pélvica Pode Ajudar?</h3>
  <p>A fisioterapia pélvica atua na prevenção, avaliação e tratamento das alterações que afetam a função sexual feminina.</p>
  <div class="softcard">
    <h3 class="serif" style="margin:0 0 .6rem;font-size:1.4rem">Benefícios</h3>
    <ul class="check" style="margin:0">
      <li><span class="bk">✓</span> Fortalecimento do assoalho pélvico</li>
      <li><span class="bk">✓</span> Melhora da percepção corporal</li>
      <li><span class="bk">✓</span> Redução de dores durante a relação sexual</li>
      <li><span class="bk">✓</span> Recuperação após parto normal ou cesariana</li>
      <li><span class="bk">✓</span> Orientações sobre retorno seguro à atividade sexual</li>
      <li><span class="bk">✓</span> Promoção da autoestima e qualidade de vida</li>
    </ul>
  </div>

  <h3>Nosso Cuidado</h3>
  <p>Oferecemos um atendimento humanizado e individualizado, respeitando a história, as necessidades e os objetivos de cada mulher. Porque cuidar da sexualidade também é cuidar da saúde.</p>

  <div class="center" style="margin-top:2rem">
    <a class="btn btn-primary" data-wa="Olá, Essência! Quero agendar uma avaliação sobre saúde íntima/sexualidade.">Agende sua avaliação</a>
  </div>
</div></section>
@include('partials.ctaband')
@endsection
