@props(['categories' => null])


<!-- Navbar -->


<header class=" navbar navbar-expand-lg fixed-top shadow bg-primary text-white  ">
    <!-- Container wrapper -->
    <div class="container">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="/"> <img src="{{ asset('assets\icon\logo.png') }}" alt="assetshizz" width="auto" height="44">
        </a>

        <!-- Toggle button -->
        <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                @if (!empty($categories))
                @if (count($categories) >= 4)
                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Todas as categorias </a>
                    <!-- Dropdown menu -->
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item " href="{{ route('categorized', $category->slug) }}" aria-label="{{ $category->category_name }}">{{ $category->category_name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @else
                <!-- Link -->
                @foreach ($categories as $category)
                <li class="nav-item ">
                    <a class="nav-link text-white" href="{{ route('categorized', $category->slug) }}" aria-label="{{ $category->category_name }}">{{ $category->category_name }}</a>
                </li>
                @endforeach
                @endif
                @endif
            </ul>


            <!-- Search -->
            <ul class="navbar-nav d-flex flex-row me-1 ">

                <form action="{{ route('search') }}" class="d-flex input-group w-auto" method="POST" enctype="multipart/form-data">
                    @csrf
                    <select name="tipo" class="form-select rounded-start">
                        <option value="produtos">Produtos</option>
                        <option value="categorias">Categorias</option>
                        <option value="tags">Tags</option>
                        <option value="productags">Tags de produtos</option>
                    </select>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Pesquisar">
                    <button type="submit" class="btn btn-warning"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </ul>
            <!-- Icons -->
            @guest
            <ul class="navbar-nav me-1 ">

                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <div class="dropdown m-2 position-static ">
                    <a class="nav-link dropdown-toggle text-white " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (Auth::user()->upload)
                        <img src="{{ asset('storage/' . Auth::user()->upload) }}" alt="{{ Auth::user()->name }}" class="rounded-circle" width="32" height="32">
                        @endif
                    </a>
                    <!-- Dropdown menu -->
                    <div class="dropdown-menu w-100 mt-0 shadow-sm" aria-labelledby="navbarDropdown" style="
                          border-top-left-radius: 0;
                          border-top-right-radius: 0;
                          overflow-y: auto;
  max-height: 24rem;">
                        <div class="container">
                            <div class="row my-4">
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="list-group list-group-flush">
                                        <span class="list-group-item list-group-item-action text-primary fw-bold">Dashboard</span>
                                        <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action"> <i class="fa-regular fa-id-badge"></i> Perfil</a>
                                      

                                        <a class="list-group-item list-group-item-action" href="{{ route('analytics') }}"> <i class="bi bi-bar-chart"></i>
                                            Analytics</a>
                                        <a class="list-group-item list-group-item-action" href="{{ route('trashed') }}"> <i class="fa-regular fa-trash-can"></i>
                                            Items no lixo</a>
                                        @if(Auth::user()->is_super_admin==1)
                                        <a class="list-group-item list-group-item-action" href="{{ route('super') }}"> <i class="bi bi-person-fill-gear"></i>
                                            Administrator</a>
                                        @endif
                                        <a class="list-group-item list-group-item-action " href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                            <i class="bi bi-door-open"></i> {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-lg-0">
                                    <div class="list-group list-group-flush">
                                        <span class="list-group-item list-group-item-action text-primary fw-bold">Categorias</span>
                                        <a class="list-group-item list-group-item-action" href="{{ route('categories.create') }}"> <i class="bi bi-plus-circle"></i> Criar nova categoria</a>
                                        @if (count($categories) != 0)
                                        <a class="list-group-item list-group-item-action" href="{{ route('categories.index') }}"> <i class="bi bi-kanban"></i>
                                            Gerir categorias</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                                    <div class="list-group list-group-flush">
                                        <span class="list-group-item list-group-item-action text-primary fw-bold">Assets</span>
                                        @if (count($categories) != 0)
                                        <a class="list-group-item list-group-item-action" href="{{ route('products.create') }}"><i class="bi bi-plus-circle"></i> Criar novo asset </a>
                                        @endif

                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3">
                                    <div class="list-group list-group-flush">
                                        <span class="list-group-item list-group-item-action text-primary fw-bold">Tags</span>
                                        <a class="list-group-item list-group-item-action" href="{{ route('tags.create') }}"><i class="bi bi-plus-circle"></i> Criar
                                            nova tag </a>
                                        <a class="list-group-item list-group-item-action" href="{{ route('tags.index') }}"><i class="bi bi-kanban"></i> Gerir tags
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </ul>
            @endguest
        </div>
    </div>
    <!-- Container wrapper -->
</header>