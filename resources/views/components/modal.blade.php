@props([
    'modal_id' => '',
    'footer' => '',
    'modalFooter' => true,
    'title' => 'Modal Title'
])

<div class="modal fade"
     id="{{ $modal_id }}"
     data-bs-backdrop="static"
     data-bs-keyboard="false"
     tabindex="-1"
     aria-labelledby="label-{{ $modal_id }}">

    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow-lg">

            {{-- Header: Melhorado o contraste e visual --}}
            <div class="modal-header bg-warning bg-gradient py-3">
                <h5 class="modal-title fw-bold text-dark" id="label-{{ $modal_id }}">
                    {{ $title }}
                </h5>
                <button type="button"
                        class="btn-close shadow-none"
                        data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>

            {{-- Body: Adicionado um padding mais suave --}}
            <div class="modal-body p-4">
                {{ $slot }}
            </div>

            {{-- Footer: Opcional --}}
            @if($modalFooter)
                <div class="modal-footer bg-light border-top-0 py-2">
                    @if(empty($footer))
                        <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Fechar</button>
                    @else
                        {{ $footer }}
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* UI: Bordas arredondadas e suavidade */
    .modal-content {
        border-radius: 15px;
        overflow: hidden;
    }
    /* UX: Evita que o botão de fechar fique com aquela borda azul de foco feia */
    .btn-close:focus {
        box-shadow: none;
    }
</style>
