<section class="slide-in-reverse"> <!-- Background image -->
    <div class="container ">
        @if (isset($wallpaper))
            <div class=" text-center bg-image 
        "
                style="background-image: url({{ asset('storage/' . $wallpaper) }}); height: 512px; background-size: cover;background-repeat: no-repeat; background-color: transparent;">
            </div>
        @else
            <div class="text-center bg-image 
        "
                style="background-image:  url({{ asset('assets/icon/untitled.jpg') }}); height: 512px; background-size: cover;background-repeat: no-repeat; background-color: transparent;">
            </div>
        @endif
        <div class="card mx-4 mx-md-5 text-center justify-content-center shadow p-3 mb-5 bg-body-tertiary rounded shadow p-3 mb-5 "
            style="align-items:center; margin-top: -170px; background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(30px); ">
            <div class="card-body px-4 py-5 px-md-5  ">
                <h1 class="display-1 fw-bold ls-tight mb-4 text-warning"> Fusion99!</h1>
                <br> <span class="text-center mb-4 pb-2 text-primary fw-bold display-4"> Backoffice e Frontoffice em
                    fusão</span>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: -6em">
        <img src="{{ asset('assets\icon\dsd.png') }}" height="256px" width="auto" alt="kira_super">
    </div>
</section>
<!--Section: FAQ-->
<section class="slide-in-reverse">
    <div class="container p-4">
        <div class="row">
            <div class="col mb-4">
                <h3 class="text-center mb-4 pb-2 text-primary fw-bold display-4">
                    <p><i class="bi bi-person-bounding-box"></i></p>O que destaca?
                </h3>
                <p class="text-center 
        ">
                </p>
            </div>
        </div>
        <div class="row gx-lg-5 mt-4 text-center">
            <div class="col-lg-4 col-md-12 mb-8 mb-lg-0 mt-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="d-flex justify-content-center" style="margin-top: -43px">
                        <div class="p-4 bg-primary rounded shadow-5-strong d-inline-block"> <i
                                class="fa-regular a-2x text-white fa-lightbulb"></i> </div>
                    </div>
                    <div class="card-top">
                        <h3 class="fw-bold text-primary mb-3">Inovador</h3>

                        <p class="text-muted">Aplicação de gestão de assets que junta Backoffice com Frontoffice</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-8 mb-lg-0 mt-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="d-flex justify-content-center" style="margin-top: -43px">
                        <div class="p-4 bg-primary rounded shadow-5-strong d-inline-block"> <i
                                class="fa-solid a-2x text-white fa-user-gear"></i> </div>
                    </div>
                    <div class="card-top">
                        <h3 class="fw-bold text-primary mb-3">Intuitivo</h3>

                        <p class="text-muted">Seguindo as melhores práticas do mercado, pode fazer gestão de conteúdo de
                            uma forma fácil</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-8 mb-lg-0 mt-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="d-flex justify-content-center" style="margin-top: -43px">
                        <div class="p-4 bg-primary rounded shadow-5-strong d-inline-block"> <i
                                class="fa-solid a-2x text-white fa-table-cells"></i> </div>
                    </div>
                    <div class="card-top">
                        <h3 class="fw-bold text-primary mb-3">Responsivo
                        </h3>

                        <p class="text-muted">Pode usar a nossa aplicação em qualquer dispositivo, deste portáteis,
                            televisões e telemóveis</p>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-12 mb-8 mb-lg-0 mt-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="d-flex justify-content-center" style="margin-top: -43px">
                        <div class="p-4 bg-primary rounded shadow-5-strong d-inline-block"> <i
                                class="fa-solid a-2x text-white fa-robot"></i></i></div>
                    </div>
                    <div class="card-top">
                        <h3 class="fw-bold text-primary mb-3">ML Assistant</h3>

                        <p class="text-muted">Algoritmos de <I>Machine Learning</I> para fazer previsões e classificação
                            de conteúdo</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="text-center my-5 slide-in-reverse">
    <div class="container">
        <div class="row">
            <div class="col mb-4">
                <h3 class="text-center mb-4 pb-2 text-primary fw-bold display-4">
                    <p><i class="bi bi-lightbulb"></i></p>O que pode fazer?
                </h3>
                <p class="text-center">
                    Alguns exemplos:
                </p>
            </div>
        </div>
        <div class="row gx-lg-5 mt-4 text-center">
            <div class="col-lg-4 col-md-12 mb-8 mb-lg-0 mt-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="d-flex justify-content-center" style="margin-top: -43px">
                        <div class="p-4 bg-primary rounded shadow-5-strong d-inline-block"> <i
                                class="fa-solid fa-list-check" style="color: #ffffff;"></i></i> </div>
                    </div>
                    <div class="card-top">
                        <h3 class="fw-bold text-primary mb-3">Gerir assets virtuais</h3>

                        <p class="text-muted">Pode gerir (quase) qualquer tipo de conteúdo</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-8 mb-lg-0 mt-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="d-flex justify-content-center" style="margin-top: -43px">
                        <div class="p-4 bg-primary rounded shadow-5-strong d-inline-block"> <i
                                class="fa-solid fa-palette" style="color: #ffffff;"></i> </div>
                    </div>
                    <div class="card-top">
                        <h3 class="fw-bold text-primary mb-3">Personalizar categorias</h3>

                        <p class="text-muted">Pode criar e personalizar as categorias da forma como entender</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-8 mb-lg-0 mt-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="d-flex justify-content-center" style="margin-top: -43px">
                        <div class="p-4 bg-primary rounded shadow-5-strong d-inline-block"> <i class="fa-solid fa-cube"
                                style="color: #ffffff;"></i> </div>
                    </div>
                    <div class="card-top">
                        <h3 class="fw-bold text-primary mb-3">Interagir com conteúdo 3D
                        </h3>

                        <p class="text-muted">Pode usar a nossa aplicação para interagir com ambientes 3d em AR/VR*</p>

                    </div>
                    <small class="text-muted">*Realidade aumentada/Realidade Virtual</small>

                </div>
            </div>
        </div>

    </div>
    </div>
</section>
<!--Section: FAQ-->
<section class="slide-in-reverse">
    <div class="container p-4">
        <h3 class="text-center mb-4 pb-2 text-primary fw-bold display-4">
            <p><i class="bi bi-question-octagon"></i></p>FAQ
        </h3>
        <p class="text-center mb-5">
            Encontre as respostas para as perguntas mais frequentes
        </p>

        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="card-top">
                        <h5 class="mb-3 text-primary"><i class="fa-solid fa-money-bill-wave"></i> É mesmo gratuito?
                        </h5>
                        <p class="text-muted">
                            <strong><u>Absolutamente!</u></strong> Esta aplicação é gratuita e de código-aberto estando
                            sobre a licensa MIT
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="card-top">
                        <h5 class="mb-3 text-primary"><i class="fa-solid fa-location-dot"></i> Posso usar a aplicação
                            em qualquer lugar?</h5>
                        <p class="text-muted">
                            <strong><u>Sim!</u></strong> A aplicação foi desenvolvida tendo em mente responsividade para
                            qualquer dispositivo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="card-top">
                        <h5 class="mb-3 text-primary"><i class="fa-regular fa-folder-open"></i> Posso enviar
                            documentos e pastas?
                        </h5>
                        <p class="text-muted">
                            Sim, desde que estejam no formato .pdf (documentos) ou no formato .zip ou .rar (pastas).
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="card-top">
                        <h5 class="mb-3 text-primary"><i class="fa-solid fa-icons"></i> Posso submeter videos e
                            músicas?
                        </h5>
                        <p class="text-muted">
                            Por enquanto não, visto que poderá existir problemas legais devido a direitos de autor
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="card-body ">
                        <h5 class="mb-3 text-primary"><i class="fa-solid fa-cube"></i>

                            Posso gerir contéudo 3d e fazer interação com o mesmo?
                        </h5>
                        <p class="text-muted"><strong><u>Sim!</u></strong> Pode interagir com objetos 3d em modo de
                            realidade aumentada</p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card-body-mine shadow text-center p-3 mb-5 bg-body rounded slide-in">
                    <div class="card-top">
                        <h5 class="mb-3 text-primary"><i class="fa-solid fa-folder-tree"></i> Será possivel ter
                            disponivel mais categorias?</h5>
                        <p class="text-muted">
                            Claro! Aqui o utilizador tem liberdade para criar e personalizar categorias!
                        </p>
                    </div>
                </div>
            </div>
        </div>
</section>
