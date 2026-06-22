@extends('admin.layout')@section('t','Depoimento')
@section('content')
<div class="admin-top"><h2 style="color:var(--roxo-esc)">{{ $item->exists ? 'Editar depoimento' : 'Novo depoimento' }}</h2></div>
<div class="card" style="max-width:620px">
  @if($errors->any())<div class="errline">{{ $errors->first() }}</div>@endif
  <form method="POST" action="{{ $item->exists ? route('admin.testimonials.update',$item) : route('admin.testimonials.store') }}">
    @csrf @if($item->exists) @method('PUT') @endif
    <div class="adm-field"><label>Autor</label><input name="autor" value="{{ old('autor',$item->autor) }}" required></div>
    <div class="adm-field"><label>Estrelas</label>
      <select name="estrelas">@for($i=5;$i>=3;$i--)<option value="{{ $i }}" {{ old('estrelas',$item->estrelas ?? 5)==$i?'selected':'' }}>{{ str_repeat('★',$i) }}</option>@endfor</select>
    </div>
    <div class="adm-field"><label>Texto</label><textarea name="texto" required>{{ old('texto',$item->texto) }}</textarea></div>
    <div class="adm-field"><label>Ordem</label><input type="number" name="ordem" value="{{ old('ordem',$item->ordem ?? 0) }}"></div>
    <label style="display:flex;gap:.5rem;align-items:center;font-size:.9rem;margin-bottom:1rem"><input type="checkbox" name="publicado" value="1" style="width:auto" {{ old('publicado',$item->publicado ?? true) ? 'checked' : '' }}> Publicado</label>
    <button class="btn btn-grad">Salvar</button>
    <a class="btn btn-ghost" href="{{ route('admin.testimonials.index') }}">Cancelar</a>
  </form>
</div>
@endsection
