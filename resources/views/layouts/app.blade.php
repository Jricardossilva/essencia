<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'Essência · Fisioterapia Integrada — João Pessoa/PB')</title>
<meta name="description" content="@yield('desc', 'Essência Fisioterapia Integrada — fisioterapia pélvica, saúde da mulher e do homem, saúde do idoso e atendimento domiciliar em João Pessoa/PB. Cuidado humanizado e baseado em evidências.')">
<link rel="icon" type="image/png" href="{{ asset('assets/mark.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
@include('partials.header')

<main>@yield('content')</main>

@include('partials.footer')
@include('partials.whatsapp')
@include('partials.modal')

<script>window.ESSENCIA = { whatsapp: "{{ config('site.whatsapp') }}" };</script>
<script src="{{ asset('js/app.js') }}"></script>
@stack('scripts')
</body>
</html>
