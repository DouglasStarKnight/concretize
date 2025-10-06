@if (isset($destaques) || [])
  @foreach ($destaques ?? [] as $destaque)
    <x-produto-card :title="$destaque['nome']" :destaques="collect([$destaque])" />
  @endforeach
@else
  <x-produto-card :produtos="$produtos"/>
@endif
