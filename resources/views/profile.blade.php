<x-layout>
    <style>
        /* Cartão do Perfil */
        .profile-card {
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border: 1px solid #eef2f5;
            overflow: hidden;
            margin-top: 2rem;
        }

        /* Capa de Fundo */
        .profile-cover {
            height: 160px;
            background: linear-gradient(135deg, #000066 0%, #000033 100%);
        }

        /* Botão de Voltar */
        .back-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.2);
            color: #ffffff !important;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .back-link:hover {
            background-color: rgba(255, 255, 255, 0.3);
            transform: translateX(-3px);
        }

        /* Avatar do Perfil */
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 4px solid #ffffff;
            background-color: #e9ecef;
            object-fit: cover;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            margin: -60px auto 0 auto;
            display: block;
            transition: all 0.3s ease;
        }
        
        .profile-avatar.d-inline-flex {
            display: inline-flex !important;
        }

        /* Campos de Formulário Customizados */
        .form-label {
            font-weight: 600;
            font-size: 0.85rem;
            color: #495057;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-control {
            border-radius: 10px;
            border: 1.5px solid #dee2e6;
            padding: 10px 14px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: #ff6500;
            box-shadow: 0 0 0 3px rgba(255, 101, 0, 0.15);
        }

        /* Cores do Tema Concretize */
        .text-brand {
            color: #ff6500 !important;
        }

        .btn-outline-brand {
            color: #ff6500;
            border: 1.5px solid #ff6500;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 20px;
            transition: all 0.2s ease;
            background: transparent;
            text-decoration: none;
        }

        .btn-outline-brand:hover {
            background-color: #ff6500;
            color: #ffffff;
            border-color: #ff6500;
        }

        .btn-accent {
            background-color: #ff6500;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 24px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(255, 101, 0, 0.2);
        }

        .btn-accent:hover {
            background-color: #e05900;
            color: #ffffff;
            box-shadow: 0 6px 16px rgba(255, 101, 0, 0.3);
            transform: translateY(-1px);
        }
    </style>

    <div class="py-4 d-flex justify-content-center">
        <div class="profile-card w-100" style="max-width: 720px;">

            {{-- Capa + voltar --}}
            <div class="profile-cover position-relative">
                <a href="{{ route('inicio.index') }}"
                   class="back-link"
                   style="position:absolute; top:16px; left:16px;"
                   aria-label="Voltar">
                    <i class="ph ph-arrow-left" style="font-size: 20px;"></i>
                </a>
            </div>

            {{-- Conteúdo do perfil --}}
            @foreach ($user['data'] as $us)
                <form action="{{ route('profile.edita', ['id' => $us->id]) }}"
                      method="POST" enctype="multipart/form-data" class="px-4 px-md-5 pb-4 pb-md-5">
                    @csrf

                    <div class="text-center">
                        @if($us->image)
                            <img src="{{ Storage::disk('s3')->url($us->image) }}"
                                 class="profile-avatar" alt="Foto de {{ $us->nome }}">
                        @else
                            <div class="profile-avatar d-inline-flex align-items-center justify-content-center"
                                 style="font-size: 3rem; color: var(--text-muted);">
                                <i class="ph ph-user"></i>
                            </div>
                        @endif

                        <h4 class="fw-bold mt-3 mb-0">{{ $us->nome }}</h4>
                        <p class="text-muted small mb-0">{{ $us->email ?? '' }}</p>
                    </div>

                    <hr class="my-4" style="opacity:.08;">

                    <h6 class="fw-bold text-brand mb-3">
                        <i class="ph ph-identification-card me-1"></i> Informações pessoais
                    </h6>

                    <div class="row g-3">
                        <div class="col-12">
                            <label for="nome" class="form-label">Nome completo</label>
                            <input type="text" id="nome" class="form-control" name="nome"
                                   value="{{ $us->nome }}" placeholder="Digite seu nome">
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" id="email" class="form-control" name="email"
                                   value="{{ $us->email ?? '' }}" placeholder="Informe seu e-mail">
                        </div>

                        <div class="col-md-6">
                            <label for="data_nascimento" class="form-label">Data de nascimento</label>
                            <input type="text" id="data_nascimento" class="form-control" name="data_nascimento"
                                   value="{{ isset($us->data_nascimento) ? date('d/m/Y', strtotime($us->data_nascimento)) : '' }}"
                                   placeholder="DD/MM/AAAA">
                        </div>

                        <div class="col-12 mt-4 pt-3 border-top">
                            <label for="input_image" class="form-label">Atualizar foto de perfil</label>
                            <input id="input_image" class="form-control" type="file" name="image" accept="image/*">
                            <small class="text-muted">Formatos aceitos: JPG, PNG. Máx. 5MB.</small>
                        </div>

                        <div class="col-12 d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('inicio.index') }}" class="btn btn-outline-brand">Cancelar</a>
                            <button type="submit" class="btn btn-accent">
                                <i class="ph ph-floppy-disk me-1"></i> Salvar alterações
                            </button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</x-layout>
