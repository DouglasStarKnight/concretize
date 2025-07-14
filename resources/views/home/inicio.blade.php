<x-layout layout slides>
    @if($slides)
    <x-slides :slides="$slides"/>
    @endif

    @include('home.cards', ['produtos' => $produtos])
    @include('home.departamentos')
</x-layout>
<style>

.alpha-color{
    background-color: #fd7e14;
}
.subHeader-color{
    background-color:#000080;
}
.imagem-hover:hover {
  transform: scale(1.2);
   transition: transform 0.3s ease;
}
</style>
