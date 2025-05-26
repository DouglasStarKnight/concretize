@props([
  'id_button' => '',
  'modal_id' => (string) 'modal_id',
  'class' => 'btn-primary',
  'style' => '',
  'onclick' => '',
  '_disabled' => false
])

<button type="button" id="{{$id_button}}" class="{{ "btn ".$class }}" data-bs-toggle="modal" data-bs-target="{{ "#".$modal_id }}" style="{{$style}}" onclick="{{$onclick}}" @disabled($_disabled)>
  {{ $slot }}
</button>
