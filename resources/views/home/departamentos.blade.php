<style>
    /* Estilização Base do Card */
    .surface-card {
        background-color: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        border: 1px solid #f4f5f7;
    }
    
    /* Barra de título (mesmo padrão do card de produtos) */
    .section-bar {
        background-color: #212529; 
        border-radius: 50rem;
        width: 6px;
        height: 35px;
        display: block;
    }

    /* Contêiner de cada Departamento */
    .dep-item {
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
        padding: 10px 0; /* Respiro para a sombra do hover não cortar */
    }
    
    /* Círculo do Ícone */
    .dep-icon-container {
        width: 90px;
        height: 90px;
        background-color: #f8f9fa;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1.2rem;
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        margin: 0 auto;
    }
    
    .dep-icon-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Zoom mais elástico */
    }

    /* Efeitos de Hover */
    .dep-item:hover .dep-icon-container {
        background-color: #ffffff;
        border-color: #dee2e6;
        box-shadow: 0 8px 18px rgba(0,0,0,0.08);
        transform: translateY(-5px);
    }
    
    .dep-item:hover .dep-icon-container img {
        transform: scale(1.15);
    }

    /* Texto do Departamento */
    .dep-text {
        font-size: 0.8rem;
        font-weight: 700;
        color: #6c757d;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        transition: color 0.2s ease;
    }
    
    .dep-item:hover .dep-text {
        color: #212529; /* Escurece o texto no hover */
    }

    /* Botões de Navegação Customizados */
    .swiper-navigation-custom {
        display: flex;
        gap: 8px;
    }
    
    .dep-prev, .dep-next {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: #495057;
        transition: all 0.2s ease;
        font-size: 1.2rem;
    }
    
    .dep-prev:hover:not(.swiper-button-disabled),
    .dep-next:hover:not(.swiper-button-disabled) {
        background-color: #212529;
        color: #ffffff;
        border-color: #212529;
        transform: scale(1.05);
    }
    
    /* Estado desativado da seta (quando chega no fim da lista) */
    .dep-prev.swiper-button-disabled, 
    .dep-next.swiper-button-disabled {
        opacity: 0.4;
        cursor: default;
    }
</style>

<div id="departamento" class="surface-card p-4 p-md-5 my-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="d-flex align-items-center gap-3">
            <span class="section-bar"></span>
            <div>
                <h4 class="m-0 fw-bold text-dark">Departamentos</h4>
                <small class="text-muted">Tudo o que sua obra precisa em um só lugar</small>
            </div>
        </div>
        
        <!-- Controles só aparecem em telas maiores -->
        <div class="swiper-navigation-custom d-none d-sm-flex">
            <span class="dep-prev" aria-label="Anterior"><i class="ph ph-caret-left"></i></span>
            <span class="dep-next" aria-label="Próximo"><i class="ph ph-caret-right"></i></span>
        </div>
    </div>

    <div class="swiper departamento_Swiper py-2">
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
            <div class="swiper-slide">
                <a href="{{ route('produtos.index', ['tipo' => $dep[0]]) }}" class="text-decoration-none d-block dep-item">
                    <div class="dep-icon-container">
                        <img src="{{ asset('image/'.$dep[2]) }}" alt="{{ $dep[1] }}" loading="lazy">
                    </div>
                    <span class="dep-text text-center">{{ $dep[1] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".departamento_Swiper", {
            slidesPerView: 2.5,
            spaceBetween: 16,
            grabCursor: true, // Mostra ícone de mão para arrastar no desktop
            freeMode: true,   // UX melhorada: Rolagem suave, sem travar de card em card (estilo mobile nativo)
            navigation: { 
                nextEl: ".dep-next", 
                prevEl: ".dep-prev" 
            },
            breakpoints: {
                480:  { slidesPerView: 3.5 },
                768:  { slidesPerView: 4.5 },
                1024: { slidesPerView: 6.5 },
                1200: { slidesPerView: 7.5 }, // Adicionado para telas muito largas
            }
        });
    });
</script>