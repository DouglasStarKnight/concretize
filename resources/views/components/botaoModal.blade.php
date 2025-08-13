@props([
  'id_button' => '',
  'modal_id' => (string) 'modal_id',
  'class' => 'btn-primary',
  'style' => '',
  'onclick' => '',
  '_disabled' => false
])

<div type="button" id="{{$id_button}}" class="{{ "btn ".$class }}" data-bs-toggle="modal" data-bs-target="{{ "#".$modal_id }}" style="{{$style}}" onclick="{{$onclick}}" @disabled($_disabled)>
  {{ $slot }}
</div>
<style>
  button:hover {
      background-color: #0056b3; /* nova cor no hover */
      color: white;
      cursor: pointer;
  }

</style>
