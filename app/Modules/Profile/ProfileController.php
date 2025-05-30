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

    public function index()
    {
        return $this->profileService->index();
    }

    public function atualiza(UpdateProfile $req){
        $data = $req->validated();
        return $this->profileService->atualiza($data);
    }

}
