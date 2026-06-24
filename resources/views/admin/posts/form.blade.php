@extends('admin.layout')@section('t','Artigo')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
<style>
  .img-fields{display:grid;gap:20px;margin:6px 0 16px;padding:18px;background:var(--marfim-2);border:1px solid var(--line);border-radius:12px}
  .img-field>label{font-weight:500;font-size:.9rem;display:block;color:var(--verde)}
  .img-help{font-size:.78rem;color:var(--ink-soft);margin:.15rem 0 .6rem}
  .img-state{display:flex;align-items:center;gap:16px;flex-wrap:wrap}
  .img-thumb{width:150px;height:95px;border-radius:10px;border:1px solid var(--line);overflow:hidden;background:var(--branco);display:grid;place-items:center;flex:none}
  .img-thumb img{width:100%;height:100%;object-fit:cover;display:block}
  .img-thumb .ph{font-size:.74rem;color:var(--ink-soft);text-align:center;padding:0 8px}
  .img-actions{display:flex;flex-direction:column;gap:.5rem}
  .img-remove{font-size:.82rem;display:flex;gap:.4rem;align-items:center;color:var(--ink-soft);cursor:pointer}

  /* modal de recorte */
  .crop-backdrop{position:fixed;inset:0;background:rgba(40,48,30,.6);backdrop-filter:blur(2px);z-index:1000;display:none;align-items:center;justify-content:center;padding:16px}
  .crop-backdrop.open{display:flex}
  .crop-modal{background:var(--marfim);border-radius:16px;width:100%;max-width:520px;box-shadow:var(--shadow);overflow:hidden}
  .crop-head{display:flex;justify-content:space-between;align-items:center;padding:16px 20px;border-bottom:1px solid var(--line)}
  .crop-head b{font-family:var(--serif);color:var(--verde);font-size:1.25rem}
  .crop-head small{display:block;font-size:.74rem;color:var(--ink-soft);font-family:var(--sans)}
  .crop-x{background:none;border:none;font-size:1.7rem;line-height:1;cursor:pointer;color:var(--ink-soft)}
  .crop-body{padding:20px;display:flex;justify-content:center}
  .crop-foot{display:flex;justify-content:flex-end;gap:.5rem;padding:14px 20px;border-top:1px solid var(--line)}
</style>

<div class="admin-top"><h2>{{ $post->exists ? 'Editar artigo' : 'Novo artigo' }}</h2></div>
<div class="card" style="max-width:860px">
  @if($errors->any())<div class="errline" style="margin-bottom:10px">{{ $errors->first() }}</div>@endif
  <form method="POST" id="postForm" action="{{ $post->exists ? route('admin.posts.update',$post) : route('admin.posts.store') }}" enctype="multipart/form-data">
    @csrf @if($post->exists) @method('PUT') @endif

    <div class="adm-field"><label>Título</label><input name="titulo" value="{{ old('titulo',$post->titulo) }}" required></div>
    <div class="adm-field"><label>Categoria</label><input name="categoria" value="{{ old('categoria',$post->categoria) }}" placeholder="Ex.: Saúde da mulher"></div>
    <div class="adm-field"><label>Resumo</label><input name="resumo" value="{{ old('resumo',$post->resumo) }}" placeholder="Breve resumo exibido nos cards"></div>

    <div class="img-fields">
      @php
        $imgs = [
          ['capa','Imagem de capa','Topo do card na listagem do blog. Enquadre em 16:9.',320,180,1200,675],
          ['imagem_principal','Imagem principal','Imagem grande de abertura do artigo (16:9).',320,180,1600,900],
          ['imagem_secundaria','Imagem secundária (opcional)','Exibida no meio do conteúdo (4:3). Pode ficar em branco.',280,210,1200,900],
        ];
      @endphp
      @foreach($imgs as [$campo,$titulo,$ajuda,$vw,$vh,$ow,$oh])
        <div class="img-field" data-campo="{{ $campo }}" data-label="{{ $titulo }}" data-vw="{{ $vw }}" data-vh="{{ $vh }}" data-ow="{{ $ow }}" data-oh="{{ $oh }}">
          <label>{{ $titulo }}</label>
          <p class="img-help">{{ $ajuda }}</p>
          <div class="img-state">
            <div class="img-thumb">
              @if($post->$campo)<img src="{{ $post->img($campo) }}" alt="">@else<span class="ph">Sem imagem</span>@endif
            </div>
            <div class="img-actions">
              <button type="button" class="btn btn-ghost btn-sm img-pick">{{ $post->$campo ? 'Trocar imagem' : 'Selecionar imagem' }}</button>
              @if($post->$campo)
                <label class="img-remove"><input type="checkbox" name="remover_{{ $campo }}" value="1"> Remover atual</label>
              @endif
            </div>
          </div>
          <input type="file" class="img-file" accept="image/png,image/jpeg,image/webp" hidden>
          <input type="hidden" name="{{ $campo }}_data" class="img-data">
        </div>
      @endforeach
    </div>

    <div class="adm-field"><label>Conteúdo</label><textarea name="conteudo" id="conteudo">{{ old('conteudo',$post->conteudo) }}</textarea></div>
    <label style="display:flex;gap:.5rem;align-items:center;font-size:.9rem;margin-bottom:1rem"><input type="checkbox" name="publicado" value="1" style="width:auto" {{ old('publicado',$post->publicado ?? true) ? 'checked' : '' }}> Publicado</label>
    <button class="btn btn-primary">Salvar</button>
    <a class="btn btn-ghost" href="{{ route('admin.posts.index') }}">Cancelar</a>
  </form>
</div>

<!-- Modal de recorte (compartilhado pelos 3 campos) -->
<div class="crop-backdrop" id="cropModal">
  <div class="crop-modal">
    <div class="crop-head"><div><b>Enquadrar imagem</b><small id="cropLabel"></small></div><button type="button" class="crop-x" id="cropClose" aria-label="Fechar">&times;</button></div>
    <div class="crop-body"><div id="cropArea"></div></div>
    <div class="crop-foot">
      <button type="button" class="btn btn-ghost btn-sm" id="cropCancel">Cancelar</button>
      <button type="button" class="btn btn-primary btn-sm" id="cropConfirm">Confirmar recorte</button>
    </div>
  </div>
</div>

<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
<script>
  // ---- Editor de texto (CKEditor) ----
  CKEDITOR.replace('conteudo', {
    versionCheck: false,
    height: 320,
    toolbar: [
      {name:'undo', items:['Undo','Redo']},
      {name:'styles', items:['Format']},
      {name:'basicstyles', items:['Bold','Italic','Underline','Strike','RemoveFormat']},
      {name:'colors', items:['TextColor','BGColor']},
      {name:'paragraph', items:['NumberedList','BulletedList','Outdent','Indent','Blockquote','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']},
      {name:'links', items:['Link','Unlink']},
      {name:'insert', items:['Image','Table','HorizontalRule']},
      {name:'tools', items:['Maximize','Source']}
    ]
  });

  // ---- Recorte de imagens em MODAL (Croppie) ----
  (function(){
    var modal   = document.getElementById('cropModal');
    var area    = document.getElementById('cropArea');
    var label   = document.getElementById('cropLabel');
    var crop    = null;
    var active  = null;

    function open(field, url){
      active = field;
      label.textContent = field.dataset.label;
      modal.classList.add('open');
      if (crop){ crop.destroy(); crop = null; }
      area.innerHTML = '';
      // ajusta o tamanho de visualização para caber bem (mantendo a proporção)
      var vw = +field.dataset.vw, vh = +field.dataset.vh, max = 260;
      if (vw > max){ var k = max/vw; vw = Math.round(vw*k); vh = Math.round(vh*k); }
      crop = new Croppie(area, {
        viewport:{width:vw, height:vh},
        boundary:{width:vw+50, height:vh+80},
        showZoomer:true
      });
      crop.bind({url:url});
    }
    function close(){ modal.classList.remove('open'); if(crop){crop.destroy();crop=null;} active=null; }

    document.querySelectorAll('.img-field').forEach(function(field){
      var file = field.querySelector('.img-file');
      field.querySelector('.img-pick').addEventListener('click', function(){ file.click(); });
      file.addEventListener('change', function(e){
        var f = e.target.files[0]; if(!f) return;
        var r = new FileReader();
        r.onload = function(ev){ open(field, ev.target.result); };
        r.readAsDataURL(f);
        e.target.value = ''; // permite re-selecionar o mesmo arquivo depois
      });
    });

    document.getElementById('cropConfirm').addEventListener('click', function(){
      if(!crop || !active) return;
      var d = active.dataset;
      crop.result({type:'base64', size:{width:+d.ow, height:+d.oh}, format:'jpeg', quality:0.85}).then(function(data){
        active.querySelector('.img-data').value = data;
        active.querySelector('.img-thumb').innerHTML = '<img src="'+data+'" alt="">';
        var rm = active.querySelector('.img-remove input'); if(rm) rm.checked = false;
        close();
      });
    });
    document.getElementById('cropCancel').addEventListener('click', close);
    document.getElementById('cropClose').addEventListener('click', close);
    modal.addEventListener('click', function(e){ if(e.target === modal) close(); });
  })();
</script>
@endsection