<x-layout>
    <style>
        :root {
            --primary-orange: #fd7e14;
        }

        /* Container centralizado e responsivo */
        .profile-container {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        /* Estilo do Card */
        .profile-card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.05);
            border-top: 5px solid var(--primary-orange);
            width: 100%;
            max-width: 600px; /* Substitui o problemático w-50 */
            padding: 2rem;
        }

        /* Imagem de Perfil */
        .profile-avatar-wrapper {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile-avatar {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover; /* Evita que a foto fique esticada */
            border: 4px solid #fff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .profile-avatar:hover {
            transform: scale(1.05);
        }

        /* Inputs e Labels */
        .form-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: #6c757d;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.3rem;
        }

        .form-control {
            border-radius: 8px;
            padding: 0.65rem 1rem;
            border: 1px solid #dee2e6;
            background-color: #f8f9fa;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 0.25rem rgba(253, 126, 20, 0.15);
        }

        /* Botão e Links */
        .back-btn {
            color: #333;
            transition: color 0.2s;
        }

        .back-btn:hover {
            color: var(--primary-orange);
        }

        .btn-save {
            background-color: var(--primary-orange);
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 8px;
            font-weight: bold;
            letter-spacing: 1px;
            transition: all 0.2s ease;
        }

        .btn-save:hover {
            background-color: #e66d00;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(253, 126, 20, 0.2);
        }
    </style>

    <div class="profile-container">
        <div class="profile-card">

            {{-- Header do Perfil --}}
            <div class="d-flex align-items-center mb-4 pb-3 border-bottom">
                <a href="{{ route('inicio.index') }}" class="back-btn text-decoration-none me-3">
                    <i class="ph ph-arrow-circle-left" style="font-size:35px;"></i>
                </a>
                <h4 class="mb-0 fw-bold text-dark flex-grow-1 text-center pe-5">MEU PERFIL</h4>
            </div>
@dd($user)
            {{-- Como você tem um array de usuários (provavelmente de 1 posição), mantive o loop mas unifiquei imagem e form --}}
            @foreach ($user['data'] as $us)
                <form action="{{ route('profile.edita', ['id' => $us->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Foto de Perfil Centralizada --}}
                    <div class="profile-avatar-wrapper">
                        @if($us->image)
                            <img src="{{ Storage::disk('s3')->url($us->image) }}" class="profile-avatar" alt="Foto de {{ $us->nome }}">
                        @else
                            {{-- Fallback caso o usuário não tenha foto ainda --}}
                            <div class="profile-avatar d-inline-flex align-items-center justify-content-center bg-secondary text-white" style="font-size: 3rem;">
                                <i class="ph ph-user"></i>
                            </div>
                        @endif
                    </div>

                    <h6 class="fw-bold text-dark mb-3"><i class="ph ph-identification-card me-2"></i>Informações Pessoais</h6>

                    <div class="row g-3">
                        <div class="col-md-12">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" id="nome" class="form-control" name="nome" value="{{ $us->nome }}" placeholder="Digite seu nome">
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ $us->email ?? '' }}" placeholder="Informe seu e-mail">
                        </div>

                        <div class="col-md-6">
                            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
                            <input type="text" id="data_nascimento" class="form-control" name="data_nascimento"
                                value="{{ isset($us->data_nascimento) ? date('d/m/Y', strtotime($us->data_nascimento)) : '' }}"
                                placeholder="DD/MM/AAAA">
                        </div>

                        <div class="col-md-12 mt-4 border-top pt-3">
                            <label for="input_image" class="form-label">Atualizar Foto de Perfil</label>
                            <input id="input_image" class="form-control" type="file" name="image" accept="image/*">
                        </div>

                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn-save shadow-sm">
                                <i class="ph ph-floppy-disk me-1"></i> SALVAR ALTERAÇÕES
                            </button>
                        </div>
                    </div>
                </form>
            @endforeach

        </div>
    </div>
</x-layout>
