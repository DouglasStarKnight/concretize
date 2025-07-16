<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Concretize' }}</title>



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/regular/style.css"/>
    <link rel="stylesheet"type="text/css"href="https://cdn.jsdelivr.net/npm/@phosphor-icons/web@2.1.1/src/fill/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
</head>
<body>
    @props([
        'layout' => false,
        'class' => '',
    ])
    @if($layout)
    <x-nav-bar></x-nav-bar>
    @endif
        <x-notificacao/>
        <div class="{{$class}}" style="margin:0px 150px">
            {{ $slot }}
        </div>
    {{-- @stack('scripts') --}}
</body>
</html>

<style>
body {
    overflow-x: hidden;
    width: 100vw;
    height: 100vh;
    background-color: #f1f1f1
}

.justify-self-center{
    justify-self: center
}
.justify-self-end{
    justify-self: end
}
.align-self-center{
    align-self: center;
}
.container-fluid {
max-width: 100vw;
overflow-x: hidden;
}
.navbar .dropdown-menu {
position: absolute;
top: 100%;
left: auto;
right: 0;
z-index: 1000;
}
.alpha-color{
    background-color: #ff6500;
}
.letters-color{
    color: #ff6500
}
.title-color{
background: #ff924a;
background: linear-gradient(0deg,rgba(255, 146, 74, 1) 0%, rgba(255, 102, 0, 1) 100%);
}
.header-color {
    background: linear-gradient(180deg,rgba(9, 29, 102, 1) 0%, rgba(11, 40, 82, 1) 42%, rgba(0, 5, 54, 1) 78%);
}
</style>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');
    
            forms.forEach(form => {
                form.addEventListener('submit', function () {
                    const submitButtons = form.querySelectorAll('button[type="submit"]');
    
                    submitButtons.forEach(button => {
                        button.disabled = true;
                        button.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Salvando...';
                    });
                });
            });
        });
        widthWindow = screen.width
        if(widthWindow < 768){
            $('#entregamos').hide()
        }else{
            $('#entregamos').show()
    
        }

//   $('.money_mask').mask('000.000.000.000.000,00', { reverse: true });
    </script>