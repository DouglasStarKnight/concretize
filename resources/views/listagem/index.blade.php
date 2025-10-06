<x-layout layout>
  @include('listagem.cards', ['produtos' => $produtos])
</x-layout>
<style>
  .alpha-color {
    background-color: #fd7e14;
  }

  .subHeader-color {
    background-color: #000080;
  }
</style>