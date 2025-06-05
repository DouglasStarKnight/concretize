<?php

namespace App\Modules\Slides;

use App\Modules\Slides\SlidesModel;
use Illuminate\Support\Facades\Hash;
use App\Modules\Slides\SlidesRepository;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Storage;

class SlidesService
{

    public function __construct(private SlidesModel $SlidesModel, private SlidesRepository $slidesRepository){
    }

    public function slidesCria($data){
        try{
            if ($data['caminho']) {
                $extension = $data['caminho']->extension();
                $hash_name = md5($data['caminho']->getClientOriginalName() . strtotime("now")) . "." . $extension;
                $caminhoarquivo_img = 'slides/' . $hash_name;

                Storage::disk('s3')->put(($caminhoarquivo_img), file_get_contents($data['caminho']));
            }
            $body = [
                'posicao' => $data['posicao'],
                'caminho' => $caminhoarquivo_img
            ];
           $this->slidesRepository->Cria($body);
           return redirect()->route('admin.index')->with(['message' => 'Slide Inserido com sucesso.']);
        }catch(Exception $err){
            return back()->route('admin.index')->withErrors($err->getMessage());
        }

    }
    public function slidesAtualiza($data, $id){
        try{
            $registro = SlidesModel::find($id);

            if($registro->caminho){
                storage::disk('s3')->delete($registro->caminho);
                storage::disk('s3')->put('slides', $data['slides']);
            }else{
                storage::disk('s3')->put('slides', $data['slides']);
            }

            if(isset($data['caminho'])){
                $path = storage::disk('s3')->put('slides', $data['caminho']);
            }
           $slides = SlidesModel::where('posicao', $data['posicao'] )->update(['caminho' => $path]);
        //    return back()->route('admin.index')->with(['message', 'Slide alterado com sucesso.']);
        }catch(Exception $err){
            // return back()->route('admin.index')->withErrors($err->getMessage());
        }

    }
}
