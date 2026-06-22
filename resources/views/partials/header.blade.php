<header class="nav">
  <div class="nav-in">
    <a class="logo-link" href="{{ route('home') }}">
      <img src="{{ asset('assets/mark.png') }}" alt="Essência">
      <span class="lg"><b>Essência</b><small>Fisioterapia Integrada</small></span>
    </a>
    <ul class="menu" id="menu">
      <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Início</a></li>
      <li><a href="{{ route('quem-somos') }}" class="{{ request()->routeIs('quem-somos') ? 'active' : '' }}">Quem Somos</a></li>
      <li>
        <span tabindex="0">Saúde da Mulher <i class="caret"></i></span>
        <div class="dropdown">
          <a href="{{ route('mulher') }}"><span class="dt"></span>Visão geral</a>
          <a href="{{ url('/saude-da-mulher/gestacao') }}"><span class="dt"></span>Gestação</a>
          <a href="{{ url('/saude-da-mulher/pos-parto') }}"><span class="dt"></span>Pós-parto</a>
          <a href="{{ route('sexualidade') }}"><span class="dt"></span>Sexualidade Feminina</a>
          <a href="{{ url('/saude-da-mulher/fisioterapia-pelvica') }}"><span class="dt"></span>Fisioterapia Pélvica</a>
        </div>
      </li>
      <li>
        <span tabindex="0">Atendimento <i class="caret"></i></span>
        <div class="dropdown">
          <a href="{{ url('/saude-do-homem') }}"><span class="dt"></span>Saúde do Homem</a>
          <a href="{{ url('/saude-do-idoso') }}"><span class="dt"></span>Saúde do Idoso</a>
          <a href="{{ url('/atendimento-domiciliar') }}"><span class="dt"></span>Atendimento Domiciliar</a>
          <a href="{{ url('/praticas-integrativas') }}"><span class="dt"></span>Práticas Integrativas</a>
          <a href="{{ url('/cuidados-paliativos') }}"><span class="dt"></span>Cuidados Paliativos</a>
        </div>
      </li>
      <li><a href="{{ route('servicos') }}" class="{{ request()->routeIs('servicos') ? 'active' : '' }}">Serviços</a></li>
      <li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog') || request()->routeIs('post') ? 'active' : '' }}">Blog</a></li>
      <li><a href="{{ route('contato') }}" class="{{ request()->routeIs('contato') ? 'active' : '' }}">Contato</a></li>
      <li class="m-only"><button class="btn btn-ghost" style="width:100%;justify-content:center" data-open-aval>Avaliação online</button></li>
      <li class="m-only"><a class="btn btn-primary" style="width:100%;justify-content:center" data-wa="Olá, Essência! Gostaria de agendar uma avaliação.">Agendar</a></li>
    </ul>
    <div class="nav-actions">
      <span class="nav-cta">
        <button class="btn btn-ghost btn-sm" data-open-aval>Avaliação online</button>
        <a class="btn btn-primary btn-sm" data-wa="Olá, Essência! Gostaria de agendar uma avaliação.">Agendar</a>
      </span>
      <button class="burger" id="burger" aria-label="Abrir menu" aria-expanded="false"><span></span><span></span><span></span></button>
    </div>
  </div>
</header>
