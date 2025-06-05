<div class="row">
    <div class="col-12">
        <h5>Selecione o slide</h5>
        <table class="table">
            <thead>
               <tr>
                    <td>posição</td>
                    <td>imagem</td>
                    <td class="text-end">Selecione</td>

                </tr> 
            </thead>
            <tbody>
                @foreach ($slides as $slide)
                <tr>
                    <td>{{$slide->posicao}}</td>
                    <td><img src="{{ Storage::disk('s3')->url($slide->caminho)}}" alt="Slide" style="height: 30px;"></td>
                    <td>
                        <div class="form-check d-flex justify-content-end">
                            <input class="form-check-input check-slide" type="radio" name="posicao" value="{{$slide->posicao}}">
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-12">
        <label for="imagem"><h5>Nova imagem</h5></label>
        <input class="form-control" type="file" name="caminho" accept="image/*">
    </div>
</div>
