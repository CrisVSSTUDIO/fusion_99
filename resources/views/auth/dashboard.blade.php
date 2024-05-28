@extends('layouts.app')
@section('content')
<section>
    <div class="container ">
        <div class="pricing-header p-3 pb-md-4 mx-auto text-center container-fluid">
            <div class="card mx-4 mx-md-5 text-center justify-content-center shadow p-3 mb-5 bg-body-tertiary rounded " style="align-items:center;   background: hsla(0, 0%, 100%, 0.7); backdrop-filter: blur(60px);  ">
                <div class="card-body px-4 py-5 px-md-5">
                    <h1 class="display-5 fw-bold ls-tight mb-4 "> <span class="text-muted">{{ $greeting }},</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
        <x-breadcrumb currentURL="{{ request()->route()->uri}}"/>

        <x-alert-success />

        <x-alert-error />
        <div class="row">
            <div class="col-lg-4">
                <div class="card mb-4 shadow border">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/' . Auth::user()->upload) }}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                        <h5 class="my-3"> {{ Auth::user()->name }}</h5>
                
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card mb-4 shadow border">
                    <div class="card-body">
                        <form action="{{ route('dashboard.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-outline mb-4">
                                <label for="formGroupExampleInput">Username</label>
                                <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Nome" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="formGroupExampleInput2">Email</label>
                                <input type="email" class="form-control" id="formGroupExampleInput2" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-outline mb-4">
                                <label for="formGroupExampleInput2">Nova Password</label>
                                <input type="password" class="form-control" id="formGroupExampleInput2" name="password" placeholder="Nova Password">

                            </div>
                            <div class="form-outline mb-4">
                                <label for="formGroupExampleInput2">Confirmar nova Password</label>
                                <input type="password" class="form-control" id="formGroupExampleInput2" name="password_confirmation" placeholder="Nova Password">

                            </div>
                            <div class="form-outline mb-4">

                                <label for="formFile" class="form-label">Escolha um arquivo</label>
                                <input class="form-control" type="file" id="upload" name="upload">

                            </div>
                            <div class="container d-flex justify-content-end align-item-center">
                                <button type="submit" class="btn btn-primary rounded-pill px-3 m-1 " value="Submit" name="submit">Guardar</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>

</section>
<script>
    if (localStorage.name) { //if it has a filename
        document.getElementById("storageFile").style.display = 'block'
        document.getElementById("lastDownload").innerHTML = localStorage.name;
    }
</script>
@endsection