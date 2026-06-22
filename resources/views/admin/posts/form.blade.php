@extends('admin.layout')@section('t','Artigo')
@section('content')
<div class="admin-top"><h2>{{ $post->exists ? 'Editar artigo' : 'Novo artigo' }}</h2></div>
<div class="card" style="max-width:780px">
  @if($errors->any())<div class="errline" style="margin-bottom:10px">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ $post->exists ? route('admin.posts.update',$post) : route('admin.posts.store') }}" enctype="multipart/form-data">
    @csrf @if($post->exists) @method('PUT') @endif

    <div class="adm-field"><label>Título</label><input name="titulo" value="{{ old('titulo',$post->titulo) }}" required></div>
    <div class="adm-field"><label>Categoria</label><input name="categoria" value="{{ old('categoria',$post->categoria) }}" placeholder="Ex.: Saúde da mulher"></div>
    <div class="adm-field"><label>Resumo</label><input name="resumo" value="{{ old('resumo',$post->resumo) }}" placeholder="Breve resumo exibido nos cards"></div>

    <div class="img-fields">
      @php
        $imgs = [
          ['capa','Imagem de capa','Aparece no topo do card, na listagem do blog.'],
          ['imagem_principal','Imagem principal','Imagem grande de abertura do artigo.'],
          ['imagem_secundaria','Imagem secundária (opcional)','Exibida no meio do conteúdo. Pode ficar em branco.'],
        ];
      @endphp
      @foreach($imgs as [$campo,$titulo,$ajuda])
        <div class="img-field">
          <label>{{ $titulo }}</label>
          <p class="img-help">{{ $ajuda }}</p>
          @if($post->$campo)
            <div class="img-prev"><img src="{{ $post->img($campo) }}" alt="">
              <label class="img-remove"><input type="checkbox" name="remover_{{ $campo }}" value="1"> Remover</label>
            </div>
          @endif
          <input type="file" name="{{ $campo }}" accept="image/png,image/jpeg,image/webp">
        </div>
      @endforeach
    </div>

    <div class="adm-field"><label>Conteúdo</label><textarea name="conteudo" style="min-height:220px">{{ old('conteudo',$post->conteudo) }}</textarea></div>
    <label style="display:flex;gap:.5rem;align-items:center;font-size:.9rem;margin-bottom:1rem"><input type="checkbox" name="publicado" value="1" style="width:auto" {{ old('publicado',$post->publicado ?? true) ? 'checked' : '' }}> Publicado</label>
    <button class="btn btn-primary">Salvar</button>
    <a class="btn btn-ghost" href="{{ route('admin.posts.index') }}">Cancelar</a>
  </form>
</div>
@endsection
