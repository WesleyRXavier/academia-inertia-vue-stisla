@extends('layouts.mainLayout')

{{-- inclui css especificos desta View --}}
@push('css')
    <link href="{{ url('css/register.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
@endpush

{{-- Conteudo desta View --}}
@section('content')
    <div class="container">
        <div class="row ajusteRow justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="boxCadastro card align-items-center ">
                    <img class="logo" src="{{ URL::asset('/img/logotipo.png') }}" alt="Spreading">
                    <h3 class="mt-4">Cadastro de {{ $tipo }}</h3>
                    <form id="formCadastroEscola" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-5">
                            <span class="formWrap">
                                <input id="email" type="text" value="{{ old('email') }}" name="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    placeholder="*Email do Voluntário" required>
                                @error('email')
                                    <span class="invalid-feedback" role="">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>

                        </div>
                        <div class="form-group mb-5">
                            <span class="formWrap">
                                <span toggle="#password" class="senhaEye fa fa-fw fa-eye field-icon toggle-password"></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Senha *" required autocomplete="new-password">  
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id="alert-senha" class="msgFeedback invalid-feedback"> </div>

                                <div id="senhaBarra" class="progress mt-4"><br>

                                    <div id="senhaForca" class="progress-bar" role="progressbar" style="width: 0%;"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                            </span>
                        </div>
                        <div class="form-group mb-5">
                            <span class="formWrap">
                                <span toggle="#passwordConfirm"
                                    class="senhaEye fa fa-fw fa-eye field-icon toggle-password"></span>
                                <input id="passwordConfirm" type="password" class="form-control" name="passwordConfirm"
                                    placeholder="*Confirme a Senha" required>
                                <div class="msgFeedback invalid-feedback">campo obrigatório</div>


                            </span>


                            <input id="tipo" type="hidden" class="form-control" name="tipo" value="{{ $tipo }}" hidden>
                        </div>
                        <div class="row"></div>
                        <button id="next-1" class="btn b-block btn-full btn-laranja" type="submit">Cadastrar</button>
                        <span class=" mt-4 d-block text-center">Ao se cadastrar você estará concordando com <a
                                href="#">Termos e Condições</a></span>

                    </form>
                    <!--form-->



                </div>
                <!--box cadastro-->
            </div>
            <!--col-4-->
        </div>
        <!--row-->
    </div>
    <!--container-->
@endsection





{{-- inclui scripts especificos desta View --}}
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="{{ url('js/register.js') }}"></script>

@endpush
