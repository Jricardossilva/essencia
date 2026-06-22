<section class="pagehead" style="--c:{{ $cor }}"><div class="wrap">
  <div class="breadcrumb"><a href="{{ route('home') }}">Início</a> › {{ $crumb }}</div>
  <span class="eyebrow">{{ $eyebrow }}</span>
  <h1>{{ $titulo }}</h1>
  @isset($sub)@if($sub)<p>{{ $sub }}</p>@endif @endisset
</div></section>
