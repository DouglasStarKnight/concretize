<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div id="content" class="h-100">
        <div class="header border">
            <nav class="navbar bg-body-tertiary row" style="background-color: #E67F25">
                <div class="logo col-1">
                    <img src="{{ asset('image/concretizelogo.jpg') }}" alt="">
                </div>
                <div class="container-fluid col-7">
                    <form class="d-flex w-100" role="search">
                        <input class="form-control me-2 w-75" type="search" placeholder="Digite o produto que deseja" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">
                            <img src="{{ asset('image/search-alt-2-svgrepo-com.svg') }}" alt="search" height="35px" width="35px">
                        </button>
                    </form>
                </div>
                <div class="entrega col-2">Entregamos em toda a cidade</div>
                <div class="carrinho col-1">
                    <img src="{{ asset('image/shopping-cart-free-15-svgrepo-com.svg') }}" alt="carrinho" height="35px" width="35px">
                </div>
                <div class="perfil col-1">
                    <img src="{{ asset('image/profile-circle-svgrepo-com.svg') }}" alt="perfil" height="35px" width="35px">
                </div>
            </nav>
        </div>
        <div class="sub-header border">
            Materiais elétricos... blablabla ablalalbla
        </div>
        <div class="conteudo">
                <!-- SLIDER CORRIGIDO -->
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicadores -->
                    <ol class="carousel-indicators">
                        <li data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="1"></li>
                        <li data-bs-target="#myCarousel" data-bs-slide-to="2"></li>
                    </ol>

                    <!-- Slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('image/slide.jpeg') }}" alt="Slide 1" class="d-block w-100" style="height: 300px;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/cimento.heic') }}" alt="Slide 2" class="d-block w-100" style="height: 300px;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('image/cimento.heic') }}" alt="Slide 3" class="d-block w-100" style="height: 300px;">
                        </div>
                    </div>

                    <!-- Controles -->
                    <a class="carousel-control-prev" href="#myCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#myCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
                <div class="maisvendidos">
                    <div class="titlemaisvendidos">Produtos mais vendidos</div>
                    <div class="contentmaisvendidos">
                        <div class="produto  border">olha esse material aqui!</div>
                    </div>
                </div>
        </div>
    </div>

    <style>
        body {
            height: 100vh;
            margin: 0;
        }
        #content {
            height: 100vh;
        }
    </style>
</body>
</html>
