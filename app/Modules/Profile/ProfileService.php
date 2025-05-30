<?php

namespace App\Modules\Profile;

use App\Models\User;
use App\Modules\Profile\ProfileModel;
use App\Modules\Inicio\InicioModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Modules\Profile\ProfileRepository;

class ProfileService
{

    public function __construct( private ProfileRepository $profileRepository){
        $this->profileRepository = $profileRepository;
    }

    public function index() {

        return view('profile');
    }

    public function atualiza($data){
        $body = [

        ];
        return $this->profileRepository->atualiza($body);
    }
}
