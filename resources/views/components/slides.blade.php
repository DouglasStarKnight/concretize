
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        {{-- @dd($slides) --}}
        @foreach($slides as $index => $slide)
                <div id="slide1" class="carousel-item {{$index === 0 ? 'active' : ''}}">
                    <img src="{{ Storage::disk('s3')->url($slide->caminho)}}" alt="Slide 1" class="d-block w-100" style="height: 300px;">
                </div>
            @endforeach
      </div>
    </div> 
    <div class="swiper-scrollbar"></div>
</div>