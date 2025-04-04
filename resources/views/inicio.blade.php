<x-layout>
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
    <div class="maisvendidos mt-5">
        <div class="titlemaisvendidos">Produtos mais vendidos</div>
        <div class="contentmaisvendidos">
            <div class="produtos  border">
                <div>your content</div>
                <div>your content</div>
                <div>your content</div>
            </div>
        </div>
    </div>
</div>
</x-layout>
