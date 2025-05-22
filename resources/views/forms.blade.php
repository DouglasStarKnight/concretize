<div class="criaProdutos d-flex justify-content-center">
    <div class="border" style="width: 90%;height:auto;">
        <div class="row">
            {{-- <form action="{{ route('admin.cria') }}" method="POST" enctype="multipart/form-data">
                @csrf --}}
                <div class="row m-2">
                    <div class="col-12 text-center">
                       <h2>Insira as informações do Produto</h2>
                    </div>
                </div>
                <div class="row">
                 <div class="col-6">
                          <div class="row m-1">
                                <div class="col-12">
                                   <label class="col-12" for="nome"><h5>Qual produto deseja adicionar?</h5></label>
                                   <input class="col-12" style="width: 200px" name="nome" type="text" placeholder="Digite o nome do material">
                                </div>
                          </div>
                          <div class="row m-1">
                             <div class="col-12">
                                <label class="col-12" for="valor"><h5>Valor do produto?</h5></label>
                                <input class="col-12" style="width: 200px" name="valor" type="text" placeholder="Digite o valor do produto">
                             </div>
                       </div>
                       <div class="row m-1">
                          <div class="col-12 mb-1">
                             <h5>Categoria do Produto</h5>
                             <select name="categoria" id="category">
                                <option value="1">básico</option>
                                <option value="2">Acabamento</option>
                                <option value="3">eletrico</option>
                                <option value="4">conexção</option>
                             </select>
                          </div>
                       </div>
                       <div class="row m-1">
                          <div class="col-12">
                             <button type="submit"> salvar</button>
                          </div>
                       </div>
                    </div>
                    <div class="col-6">
                        <div class="row m-1">
                            <div class="col-12">
                                <label for="imagem"><h5>Imagem do Produto</h5></label>
                                <input type="file" name="image" accept="image/*">
                            </div>
                            <div class="col-12 mt-2">
                                <img id="preview" src="" alt="Prévia da imagem" style="max-width: 200px; display: none; border: 1px solid #ccc; padding: 5px; border-radius: 8px;">
                            </div>
                        </div>
                    </div>
                 </div>
                 <div class="row">
                    <div class="col-12 mb-1">
                        <h5>Selecione a página</h5>
                        <select name="categoria" id="category">
                            <option value="1">inicio</option>
                            <option value="2">básico</option>
                           <option value="3">Acabamento</option>
                           <option value="4">eletrico</option>
                           <option value="5">conexção</option>
                        </select>
                     </div>
                 </div>
        </div>
    </div>
</div>
