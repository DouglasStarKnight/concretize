<x-layout>
    <div class="d-flex">
        <button class="bg-primary bg-gradient" style="width: 300px; height: 100px;" data-bs-toggle="modal" data-bs-target="#novoProduto">
            Inserir produto
        </button>
<x-modal  modal_id="novoProduto">
    <form action="{{ route('admin.cria') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('forms')
    </form>

</x-modal>

    </div>

</x-layout>
<style>
.criaProdutos {
    /* height: 300px; */
}
input {
    /* width: 100px; */
    height: 40px;
    border-radius: 5px;
}
select {
   border-radius: 5px
}
button {
   border-radius: 5px;

}
</style>
<script>
    function previewImagem(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
