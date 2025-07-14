
@props(['slides' => $slides])

<div class="swiper slidesSwiper">
    <div class="swiper-wrapper">
        @foreach($slides as $slide)
            <div class="swiper-slide">
                <img src="{{ Storage::disk('s3')->url($slide->caminho)}}" alt="Slide" class="d-block w-100" style="height: 300px; object-fit: cover;">
            </div>
        @endforeach
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        new Swiper(".slidesSwiper", {
            slidesPerView: 1,
            spaceBetween: 5,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 10000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            scrollbar: {
                el: ".swiper-scrollbar",
            },
        });
    });
</script>
