<a class="post-card" href="{{ route('post',$p->slug) }}">
  <div class="top">@if($p->capa)<img src="{{ $p->img('capa') }}" alt="{{ $p->titulo }}">@endif</div>
  <div class="bd">
    <span class="cat">{{ $p->categoria }}</span>
    <h3>{{ $p->titulo }}</h3>
    <p>{{ $p->resumo }}</p>
    <span class="more">Ler artigo →</span>
  </div>
</a>
