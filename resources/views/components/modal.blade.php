@props([
    'modal_id' => '',
    'footer' => '',
    'modalFooter' => true,
    'title' => 'modal Title'
])

  <!-- Modal -->
  <div class="modal fade" id="{{$modal_id}}" data-bs-backdrop="static" aria-labelledby="{{$modal_id}}" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning bg-gradient">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">{{$title}}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{$slot}}
        </div>
        @if($modalFooter)
            <div class="modal-footer">
                {{$footer}}
            </div>
        @endif
      </div>
    </div>
  </div>
