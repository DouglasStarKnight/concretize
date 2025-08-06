<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $title ?? 'Concretize' }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css" />
  <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
  @props([
      'layout' => false,
      'class' => '',
  ])

  @if ($layout)
    <x-nav-bar></x-nav-bar>
  @endif

  <x-notificacao />
  <div id="app-layout" class="{{ $class }}">
    {{ $slot }}
  </div>
  @stack('scripts')
</body>
<style>
  @media(max-width:768px){
    #app-layout{
      margin: 0px 50px !important
    }
  }
  @media(min-width:769px){
    #app-layout{
      margin:0px 100px !important
    }
  }
</style>
</html>
