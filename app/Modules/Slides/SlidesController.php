<?php

namespace App\Modules\Slides;

use Illuminate\Http\Request;
use App\Modules\Slides\SlidesService;
use App\Http\Controllers\Controller;
use App\Modules\Slides\dto\CreateSlides;
use App\Modules\Categoria\CategoriaModel;
use App\Modules\Slides\SlidesModel;
use Illuminate\Support\Facades\Storage;

class SlidesController extends Controller
{
    public function __construct(private SlidesService $slidesService, private SlidesModel $slidesModel, private CategoriaModel $categoriaModel) {
        // $this->slidesService = $slidesService;
        $this->slidesModel = $slidesModel;
    }

    public function index() {
        return $this->slidesService->index();
    }

    public function slidesCria(CreateSlides $req) {

        $data = $req->validated();
            return $this->slidesService->slidesCria($req);
    }

    public function slidesEdita(CreateSlides $req, $id = null) {
        // dd($id, $req);
        $data = $req->validated();
            return $this->slidesService->slidesAtualiza($req, $id);
    }

}

