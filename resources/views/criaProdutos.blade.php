<x-layout>
    <form action="{{ route('admin.cria') }}" method="POST">
        @csrf
    <label for="material">Qual material deseja adicionar? </label>
    <input name="nome" type="text" placeholder="digite o nome do material">
</br>

    <select name="categoria" id="category">
        <option value="1">básico</option>
        <option value="2">Acabamento</option>
        <option value="3">eletrico</option>
        <option value="4">conexção</option>
    </select>


    <button type="submit">salvar</button>
    </form>
</x-layout>
