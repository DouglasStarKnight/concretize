<?php

namespace App\Modules\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Profile\dto\UpdateProfile;
use App\Modules\Profile\ProfileService;


class ProfileController extends Controller
{
    public function __construct(private ProfileService $profileService) {
        $this->profileService = $profileService;
        // $this->adminModel = $adminModel;
    }

    public function index(){
        return $this->profileService->index();
    }

    public function cria(){
        return $this->profileService->cria();
    }


    public function atualiza(Request $req,int $id){
        // $data = $req->validated();
        return $this->profileService->atualiza($req, $id);
    }

}
