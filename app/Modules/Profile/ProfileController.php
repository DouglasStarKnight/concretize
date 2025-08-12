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

    public function index($id = null){
        // dd(auth()->id());
        $user_id = auth()->id() ?? null; 
        return $this->profileService->index($user_id);
    }

    public function edita(UpdateProfile $req, int $id){
        $data = $req->validated();
        // dd($data);
        return $this->profileService->atualiza($data, $id);
    }

}
