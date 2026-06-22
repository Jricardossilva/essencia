<footer>
  <div class="wrap cols">
    <div>
      <div class="fbrand">
        <img src="{{ asset('assets/mark.png') }}" width="44" height="44" alt="">
        <b>Essência</b>
      </div>
      <p style="opacity:.85;max-width:34ch;margin:0">Cuidado especializado para a mulher, o homem e o idoso em todas as fases da vida. Atendimento humanizado e domiciliar em {{ config('site.cidade') }}.</p>
    </div>
    <div><h4>Navegação</h4>
      <a href="{{ route('home') }}">Início</a>
      <a href="{{ route('quem-somos') }}">Quem Somos</a>
      <a href="{{ route('servicos') }}">Serviços</a>
      <a href="{{ route('blog') }}">Blog</a>
      <a href="{{ route('contato') }}">Contato</a></div>
    <div><h4>Atendimento</h4>
      <a href="{{ route('mulher') }}">Saúde da Mulher</a>
      <a href="{{ url('/saude-do-homem') }}">Saúde do Homem</a>
      <a href="{{ url('/saude-do-idoso') }}">Saúde do Idoso</a>
      <a href="{{ url('/atendimento-domiciliar') }}">Atendimento Domiciliar</a>
      <a href="{{ url('/cuidados-paliativos') }}">Cuidados Paliativos</a></div>
    <div><h4>Contato</h4>
      <a data-wa="Olá, Essência! Gostaria de agendar uma avaliação.">WhatsApp {{ config('site.whatsapp_fmt') }}</a>
      <a href="mailto:{{ config('site.email') }}">{{ config('site.email') }}</a>
      <span style="opacity:.85">{{ config('site.cidade') }}</span>
      <a href="{{ route('login') }}" style="margin-top:.6rem;opacity:.6">Área restrita</a></div>
  </div>
  <div class="wrap legal">
    <span>© {{ date('Y') }} Essência Fisioterapia Integrada · {{ config('site.crefito') }}</span>
    <span>Conteúdo informativo — não substitui avaliação profissional individualizada.</span>
  </div>
</footer>
