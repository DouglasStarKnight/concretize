<x-layout>
  <div class="py-4">
    @if ($slides && count($slides) > 0)
      <section class="slides-container">
        <div class="swiper mainSwiper">
          <div class="swiper-wrapper">
            @foreach ($slides as $slide)
              <div class="swiper-slide">
                <img src="{{ Storage::disk('s3')->url($slide->caminho) }}"
                     class="slide-img" alt="Banner promocional Concretize">
              </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
        </div>
      </section>
    @endif

    @include('home.departamentos')

    <section class="mt-5">
    <div class="d-flex align-items-center gap-3 mb-4">
        <span class="section-bar bg-dark rounded-pill" style="width: 6px; height: 35px;"></span>
        <div>
            <h4 class="m-0 fw-bold text-dark">Especiais para você</h4>
            <small class="text-muted">Seleção da semana com os melhores preços</small>
        </div>
    </div>

    <div class="row g-4">
        @if (isset($destaques) && count($destaques) > 0)
            @foreach ($destaques as $destaque)
                <div class="col-12">
                    <x-produto-card :title="$destaque['nome']" :destaques="collect([$destaque])" />
                </div>
            @endforeach
        @else
            <div class="col-12">
                <x-produto-card title="Nossos Produtos" :produtos="$produtos" />
            </div>
        @endif
    </div>
</section>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Slider principal
      new Swiper(".mainSwiper", {
        loop: true,
        autoplay: { delay: 6000, disableOnInteraction: false },
        pagination: { el: ".swiper-pagination", clickable: true },
        navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
      });

      // Slider de departamentos já é inicializado no include correspondente
    });
  </script>
</x-layout>
