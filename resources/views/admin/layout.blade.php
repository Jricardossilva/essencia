<!DOCTYPE html><html lang="pt-BR"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('t','Painel') · Essência</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}"></head>
<body><div class="admin-wrap">
  <aside class="admin-side">
    <div class="brand"><img src="{{ asset('assets/mark.png') }}" width="36" height="36" alt=""><b>Essência</b></div>
    <nav class="admin-nav">
      <span class="admin-cat">Gerenciar</span>
      <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard')?'on':'' }}">📊 Visão geral</a>
      <a href="{{ route('admin.posts.index') }}" class="{{ request()->routeIs('admin.posts.*')?'on':'' }}">📝 Blog</a>
      <a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials.*')?'on':'' }}">💬 Depoimentos</a>
      <a href="{{ route('admin.leads.index') }}" class="{{ request()->routeIs('admin.leads.*')?'on':'' }}">👥 Leads</a>
      <span class="admin-cat">Conta</span>
      <a href="{{ route('admin.account.password') }}" class="{{ request()->routeIs('admin.account.*')?'on':'' }}">🔑 Minha senha</a>
      <a href="{{ route('admin.usuarios.index') }}" class="{{ request()->routeIs('admin.usuarios.*')?'on':'' }}">👤 Usuários</a>
      <span class="admin-cat">Site</span>
      <a href="{{ route('home') }}" target="_blank">↗ Ver o site</a>
      <form method="POST" action="{{ route('logout') }}" style="margin-top:8px">@csrf<button class="btn btn-sm" style="width:100%;justify-content:center;background:rgba(255,255,255,.12);color:#F1EFE5;border:1px solid rgba(255,255,255,.30)">↩ Sair</button></form>
    </nav>
  </aside>
  <main class="admin-main">
    @if(session('ok'))<div class="flash">{{ session('ok') }}</div>@endif
    @yield('content')
  </main>
</div></body></html>