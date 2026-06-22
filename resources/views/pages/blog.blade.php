@extends('layouts.app')
@section('title','Blog · Essência')
@section('content')
@include('partials.pagehead',['cor'=>'#7F8A6A','crumb'=>'Blog','eyebrow'=>'Blog & conteúdo','titulo'=>'Conteúdo que cuida de você','sub'=>'Informação baseada em evidências sobre saúde da mulher, do homem e do idoso.'])
<section class="section"><div class="wrap">
  <div class="blog-grid">
    @forelse($posts as $p)@include('partials.postcard',['p'=>$p])@empty
      <p class="muted">Nenhum artigo publicado ainda.</p>
    @endforelse
  </div>
  <div class="mt">{{ $posts->links() }}</div>
</div></section>
@endsection
