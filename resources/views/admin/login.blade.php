<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Entrar · Essência</title>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}"></head>
<body><div class="login-page"><div class="login-box">
  <div style="text-align:center;margin-bottom:16px">
    <img src="{{ asset('assets/logo-essencia.png') }}" alt="Essência Fisioterapia Integrada" style="max-width:200px;height:auto;display:inline-block">
  </div>
  <h3>Área restrita</h3>
  <p class="muted" style="font-size:.9rem;margin:0 0 1rem">Gerenciador de conteúdo — acesso da equipe.</p>
  @if($errors->any())<p class="errline">{{ $errors->first() }}</p>@endif
  <form method="POST" action="{{ route('login') }}">@csrf
    <div class="adm-field"><label>E-mail</label><input type="email" name="email" value="{{ old('email') }}" required autofocus></div>
    <div class="adm-field"><label>Senha</label><input type="password" name="password" required></div>
    <label style="display:flex;gap:.5rem;align-items:center;font-size:.88rem;margin-bottom:1rem"><input type="checkbox" name="remember" style="width:auto"> Manter conectado</label>
    <button class="btn btn-grad" style="width:100%;justify-content:center">Entrar</button>
  </form>
  <p class="disc" style="text-align:left;margin-top:1rem">Acesso padrão: <b>admin@essencia.com.br</b> / <b>essencia2026</b> (troque após o 1º acesso).</p>
</div></div></body></html>
