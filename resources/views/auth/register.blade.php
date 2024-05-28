@extends('layouts.app')

@section('content')

<section>
    <div class="mask d-flex align-items-center gradient-custom-3">
        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-xl-6 ">
                    <div class="container text-center ">
                        <h1 class="display-5 fw-bold text-primary">Registar</h1>
                        <p class="lead text-muted p-2">Crie uma conta gratuita para aceder ao catalogador</p>
                    </div>
                    <img src="{{ asset('assets\icon\kira_2d.svg') }}" class="img-fluid mb-2 shadow   rounded" alt="Kira" loading="lazy">
                </div>
                <div class="col-xl-6">
                    <div class="card shadow border-0  rounded m-3">
                        <div class="card-body ">
                            <h4 class="text-uppercase text-center ">{{ __('Register') }}</h4>

                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-outline p-2">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label class="form-label" for="form3Example1cg">{{ __('Name') }}</label>
                                </div>

                                <div class="form-outline p-2">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label class="form-label" for="form3Example3cg">{{ __('Email Address') }}</label>
                                </div>

                                <div class="form-outline p-2">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <label class="form-label" for="form3Example4cg">{{ __('Password') }}</label>
                                </div>

                                <div class="form-outline p-2">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> <label class="form-label" for="form3Example4cdg">{{ __('Confirm Password') }}</label>
                                </div>

                                <div class="form-outline p-2">
                                    <input class="form-check-input " type="checkbox" value="" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                        Concordo com todos os <a href="#!" data-bs-toggle="modal" data-bs-target="#termsModal" class="text-body"><u>termos de uso</u></a>
                                    </label>
                                </div>

                                <div class="d-flex mt-4 justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                                        {{ __('Register') }}
                                    </button>
                                </div>

                                <p class="text-center text-muted p-2 mb-0 mt-5">¿Já tem conta? <a href="{{ route('login') }}" class="fw-bold text-muted"><u>Inicie sessão</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Scrollable modal -->
    <!-- Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Termos e Condições</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Os seguintes termos e condições regem o uso do site de catalogador de assets (o "AssetShizz"), que é uma aplicação web que permite aos utilizadores gerir e partilhar os seus assets digitais. Ao aceder ao AssetShizz, o utilizador concorda em cumprir estes termos e condições, bem como a política de privacidade do AssetShizz. Caso não concorde com algum destes termos, não deverá utilizar o AssetShizz.

                   <p> Para aceder a todas as funcionalidades da aplicação, o utilizador deverá criar uma conta no AssetShizz, fornecendo um endereço de email válido e uma palavra-passe. O utilizador é responsável por manter a confidencialidade da sua palavra-passe e por não a partilhar com terceiros. O utilizador é também responsável por todas as atividades que ocorram na sua conta, e deverá notificar imediatamente o AssetShizz em caso de suspeita de uso não autorizado da mesma.</p>

                    <p>O utilizador é o único proprietário dos assets que carregar no AssetShizz, e concede ao AssetShizz uma licença não exclusiva, gratuita, mundial e perpétua para armazenar, exibir, reproduzir e distribuir os seus assets, de acordo com as opções de partilha que selecionar. O utilizador declara que tem todos os direitos e autorizações necessários para carregar os seus assets no AssetShizz, e que não está a violar nenhuma lei ou direito de terceiros ao fazê-lo. O utilizador é o único responsável pelo conteúdo dos seus assets, e isenta o AssetShizz de qualquer responsabilidade por danos ou reclamações que possam resultar do uso dos mesmos.</p>

                    <p>O AssetShizz reserva-se o direito de remover ou desativar o acesso a qualquer asset que considere violar estes termos e condições, a política de privacidade do AssetShizz, ou qualquer lei ou direito de terceiros. O AssetShizz reserva-se também o direito de suspender ou cancelar a conta de qualquer utilizador que viole estes termos e condições, a política de privacidade do AssetShizz, ou qualquer lei ou direito de terceiros.</p>

                   <p> O AssetShizz fornece o serviço "tal como está" e "conforme disponível", sem garantias de qualquer tipo, expressas ou implícitas. O AssetShizz não garante que o serviço seja ininterrupto, seguro, livre de erros ou vírus, ou que satisfaça as expectativas do utilizador. O AssetShizz não se responsabiliza por quaisquer perdas ou danos que possam resultar do uso do serviço, incluindo mas não limitado a perda de dados, lucros ou reputação.</p>

                   <p> O AssetShizz pode alterar estes termos e condições a qualquer momento, mediante aviso prévio aos utilizadores. A continuação do uso do serviço após a alteração dos termos e condições implica a aceitação dos mesmos. Caso algum destes termos seja considerado inválido ou inaplicável por um tribunal competente, os restantes termos permanecerão em vigor.</p>

                  <p>  Estes termos e condições são regidos pela lei portuguesa e estão sujeitos à jurisdição dos tribunais portugueses.</p> </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection