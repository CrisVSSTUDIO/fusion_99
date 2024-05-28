@extends('layouts.app')
@section('content')
<div class="pricing-header p-3 pb-md-4 mx-auto text-center container-fluid">
    <div class="card mx-4 mx-md-5 text-center justify-content-center shadow p-3 mb-5 bg-body-tertiary rounded bg-light" style="align-items:center;   background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(60px);  ">
        <div class="card-body px-4 py-5 px-md-5">
            <h1 class="display-5 fw-bold ls-tight mb-4 "> <span class="text-muted">Página de </span>
                <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">ajuda</span>
        </div>
    </div>
</div>
<div class="container">
    <x-breadcrumb currentURL="{{ request()->route()->uri }}

" />
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded bg-light">
                <div class="card-body">
                    <h4 class="mb-3 text-primary text-center"><i class="fa-solid fa-money-bill-wave"></i> O que é o catalogador de assets?</h4>
                    <p class="text-muted">
                        O catalogador de assets é uma ferramenta que permite organizar, gerenciar e compartilhar os seus assets digitais, como imagens, vídeos, áudios, documentos e outros. Você pode criar coleções, categorias, tags e metadados para facilitar a busca e o uso dos seus assets.
                    </p>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-body-tertiary rounded bg-light">
                <div class="card-body">
                    <h4 class="mb-3 text-primary text-center"><i class="fa-solid fa-money-bill-wave"></i> Como usar a aplicação?</h4>
                    <p class="text-muted">
                        Para usar o catalogador de assets, você precisa se cadastrar e fazer login na plataforma. Depois, você pode fazer upload dos seus assets, editar as suas propriedades, criar coleções e compartilhar os seus links. Você também pode baixar os assets que desejar ou visualizá-los online.
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection