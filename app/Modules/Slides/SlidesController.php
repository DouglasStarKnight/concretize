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

    public function slidesEdita(CreateSlides $req, int $id = null) {
        $data = $req->validated();
        // dd($data);
        return $this->slidesService->slidesAtualiza($data, $id);
    }

}

