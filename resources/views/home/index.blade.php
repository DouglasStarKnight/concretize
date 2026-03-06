<x-layout>
  <style>
    :root {
      --primary-blue: #000080;
      --accent-orange: #ff6500;
      --bg-light: #f4f7f6;
      --text-dark: #2d3436;
    }

    body {
      background-color: var(--bg-light);
      color: var(--text-dark);
      font-family: 'Inter', sans-serif;
    }

    /* Navbar Moderna */
    .navbar-main {
      background-color: var(--primary-blue);
      padding: 1rem 2rem;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .search-input {
      border-radius: 25px 0 0 25px;
      border: none;
      padding-left: 20px;
    }

    .search-btn {
      border-radius: 0 25px 25px 0;
      background-color: var(--accent-orange);
      border: none;
      color: white;
      transition: 0.3s;
    }

    .search-btn:hover {
      background-color: #e65a00;
      transform: scale(1.05);
    }

    /* Slides & Banners */
    .slides-container {
      border-radius: 20px;
      overflow: hidden;
      margin-top: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .slide-img {
      height: 450px;
      object-fit: cover;
      width: 100%;
    }

    /* Departamentos */
    .dep-card {
      background: white;
      border-radius: 50%;
      width: 120px;
      height: 120px;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      margin: 0 auto 15px;
      border: 2px solid transparent;
    }

    .dep-card:hover {
      transform: translateY(-10px);
      border-color: var(--accent-orange);
      box-shadow: 0 15px 30px rgba(255, 101, 0, 0.2);
    }

    .dep-card img {
      height: 70px;
      transition: 0.3s;
    }

    .dep-text {
      font-weight: 700;
      font-size: 0.85rem;
      color: var(--primary-blue);
      text-transform: uppercase;
    }

    /* Utilitários de Hover */
    .img-hover-effect {
      transition: transform 0.3s ease;
    }

    .img-hover-effect:hover {
      transform: scale(1.1);
    }

    /* Responsividade Mobile */
    @media (max-width: 768px) {
      .slide-img {
        height: 250px;
      }

      .navbar-main {
        padding: 0.5rem;
      }

      .dep-card {
        width: 90px;
        height: 90px;
      }

      .dep-card img {
        height: 50px;
      }
    }
  </style>
  <div class="container py-4">
    @if ($slides && count($slides) > 0)
      <section class="slides-container shadow">
        <div class="swiper mainSwiper">
          <div class="swiper-wrapper">
            @foreach ($slides as $slide)
              <div class="swiper-slide">
                <img src="{{ Storage::disk('s3')->url($slide->caminho) }}" class="slide-img" alt="Banner Promoção">
              </div>
            @endforeach
          </div>
          <div class="swiper-pagination"></div>
          <div class="swiper-button-next text-white"></div>
          <div class="swiper-button-prev text-white"></div>
        </div>
      </section>
    @endif

    <section class="mt-5 bg-white p-4 rounded-4 shadow-sm">
      <div class="d-flex align-items-center gap-3 mb-5">
        <i class="ph ph-stack text-warning" style="font-size: 2rem;"></i>
        <h3 class="m-0 fw-bold" style="color: var(--primary-blue);">DEPARTAMENTOS</h3>
      </div>

      <div class="swiper deptSwiper py-4">
        <div class="swiper-wrapper">
          @php
            $categorias = [
                ['basico', 'Básicos', 'cimento.png'],
                ['acabamento', 'Acabamentos', 'pisos.png'],
                ['hidraulica', 'Hidráulica', 'tubos.png'],
                ['eletrica', 'Elétrica', 'fios.png'],
                ['estruturas', 'Estruturas', 'vergalao.png'],
                ['ferramentas', 'Ferramentas', 'ferramenta.png'],
                ['equipamentos', 'Equipamentos', 'epi.png'],
                ['fundacao', 'Fundações', 'brita.png'],
            ];
          @endphp
          @foreach ($categorias as $cat)
            <div class="swiper-slide text-center">
              <a href="{{ route('produtos.index', ['tipo' => $cat[0]]) }}" class="text-decoration-none">
                <div class="dep-card shadow-sm">
                  <img src="{{ asset('image/' . $cat[2]) }}" alt="{{ $cat[1] }}">
                </div>
                <span class="dep-text">{{ $cat[1] }}</span>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="mt-5">
      <div class="d-flex align-items-center gap-2 mb-4">
        <i class="ph ph-sparkle text-warning" style="font-size: 1.8rem;"></i>
        <h4 class="m-0 fw-bold" style="color: var(--primary-blue);">ESPECIAIS PARA VOCÊ</h4>
      </div>
      <div class="row g-4">
        @if (isset($destaques) && count($destaques) > 0)
          @foreach ($destaques as $destaque)
            <div class="col-12 mb-4">
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
    document.addEventListener("DOMContentLoaded", function() {
      // Slider Principal
      new Swiper(".mainSwiper", {
        loop: true,
        autoplay: {
          delay: 6000
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev"
        },
      });

      // Slider Departamentos
      new Swiper(".deptSwiper", {
        slidesPerView: 2.5,
        spaceBetween: 15,
        breakpoints: {
          640: {
            slidesPerView: 3.5
          },
          1024: {
            slidesPerView: 6.5
          },
        }
      });
    });
  </script>
</x-layout>
