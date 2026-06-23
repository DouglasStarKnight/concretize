<div class="swiper slidesSwiper rounded-4 overflow-hidden shadow-sm mt-3">
    <div class="swiper-wrapper">
        @foreach($slides as $slide)
            <div class="swiper-slide position-relative">
                <div class="overlay-gradient"></div>
                <img src="{{ Storage::disk('s3')->url($slide->caminho)}}" alt="Slide" class="img-fluid w-100" style="height: 400px; object-fit: cover;">
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination"></div>
</div>

<style>
/* Gradiente para as imagens de slide ficarem mais premium */
.overlay-gradient {
    position: absolute;
    bottom: 0; left: 0; right: 0; top: 0;
    background: linear-gradient(to top, rgba(0,0,0,0.4) 0%, transparent 40%);
    pointer-events: none;
}
</style>