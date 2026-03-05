<div id="departamento" class="bg-white p-4 rounded-4 shadow-sm my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-2">
            <div style="width: 5px; height: 25px; background: #ff6500; border-radius: 10px;"></div>
            <h4 class="m-0 fw-bold" style="color: #000080;">DEPARTAMENTOS</h4>
        </div>
        <div class="swiper-navigation-custom">
            <span class="dep-prev"><i class="ph ph-caret-left"></i></span>
            <span class="dep-next"><i class="ph ph-caret-right"></i></span>
        </div>
    </div>

    <div class="swiper departamento_Swiper pb-4">
        <div class="swiper-wrapper">
            @php
                $deps = [
                    ['basico', 'BÁSICOS', 'cimento.png'],
                    ['acabamento', 'ACABAMENTOS', 'pisos.png'],
                    ['hidraulica', 'HIDRÁULICA', 'tubos.png'],
                    ['eletrica', 'ELÉTRICA', 'fios.png'],
                    ['estruturas', 'ESTRUTURAS', 'vergalao.png'],
                    ['ferramentas', 'FERRAMENTAS', 'ferramenta.png'],
                    ['equipamentos', 'EQUIPAMENTOS', 'epi.png'],
                    ['fundacao', 'PARA FUNDAÇÕES', 'brita.png'],
                ];
            @endphp
            @foreach($deps as $dep)
            <div class="swiper-slide text-center">
                <a href="{{route('produtos.index', ['tipo' => $dep[0]])}}" class="text-decoration-none group">
                    <div class="dep-icon-container mb-3 mx-auto shadow-sm border border-light">
                        <img src="{{asset('image/'.$dep[2])}}" alt="{{$dep[1]}}" class="img-fluid p-3">
                    </div>
                    <h6 class="fw-bold text-dark mb-0" style="font-size: 0.85rem;">{{$dep[1]}}</h6>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<style>
.dep-icon-container {
    width: 100px; height: 100px;
    background: #f8f9fa;
    border-radius: 50%;
    transition: all 0.3s ease;
    display: flex; align-items: center; justify-content: center;
}
.dep-icon-container:hover {
    background: #fff1e6;
    transform: translateY(-5px);
    border-color: #ff6500 !important;
}
</style>
<script>
    new Swiper(".departamento_Swiper", {
    slidesPerView: 2.5,
    spaceBetween: 20,
    navigation: {
        nextEl: ".dep-next",
        prevEl: ".dep-prev",
    },
    breakpoints: {
        576: { slidesPerView: 3.5 },
        768: { slidesPerView: 4.5 },
        1024: { slidesPerView: 6.5 },
    }
});
</script>