<div id="departamento" style="background-color:#ffffff" class="rounded">
        <div class="d-flex align-items-center gap-1 mb-3">
            <i class="fa-solid fa-list fa-xl" style="color: #ff6500;"></i>
            <h3 class="m-0 letters-color fw-bold" >DEPARTAMENTOS</h3>
        </div>
        <div class="swiper departamento_Swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'basico'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/cimento.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold letters-color fw-bold">BÁSICOS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'acabamento'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/pisos.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">ACABAMENTOS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'hidraulica'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/tubos.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">HIDRÁULICA</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'eletrica'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/fios.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">ELÉTRICA</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'estruturas'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/vergalao.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">ESTRUTURAS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'ferramentas'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/ferramenta.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">FERRAMENTAS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'equipamentos'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/epi.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">EQUIPAMENTOS</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="swiper-slide">
                    <a class="text-decoration-none link-light" href="{{route('produtos.index', ['tipo' => 'fundacao'])}}">
                        <div>
                            <div class="mb-4" style="justify-self:center">
                                <img src="{{asset('image/brita.png')}}" alt="basicos"height="150px" class="imagem-hover">
                            </div>
                            <div>
                                <h5 class="text-center letters-color fw-bold">PARA FUNDAÇÕES</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
  
    var wwiper = new Swiper(".departamento_Swiper", {
        slidesPerView: 3,
        spaceBetween: 15,
        grid: {
            rows: 1,
            fill: 'row',
        },
        breakpoints:{
            1270:{
                slidesPerView: 4,
                spaceBetween:5,
                grid: {
                rows: 2,
                fill: 'row',
            },
            },
            1024:{
                slidesPerView: 3,
                spaceBetween:5,
                grid: {
                rows: 2,
                fill: 'row',
            }
        }
    }
    })
</script>