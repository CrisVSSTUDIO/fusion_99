<div class="pricing-header p-3 pb-md-4 mt-4 mx-auto text-center container-fluid">
    <div class="card  text-center justify-content-center shadow p-3 rounded "
      >
        <div class="card-body px-4 py-5 px-md-5">
            <h1 class="display-5 fw-bold ls-tight mb-4 ">
                @switch($view)
                    @case('categories.create')
                        <span class="text-muted">Criar</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">categoria</span>
                    @break

                    @case('categories.index')
                        <span class="text-muted">Gerir</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">categorias</span>
                    @break

                    @case('categories.show')
                        <span class="text-muted">Gerir</span> <br><span
                            class="text-center mb-4 pb-2 text-primary fw-bold display-4">categoria</span>
                    @break

                    @case('products.create')
                        <span class="text-muted">Criar</span>

                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">Asset</span>
                    @break

                    @case('products.index')
                        <span class="text-muted">Gerir</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">Assets</span>
                    @break

                    @case('products.show')
                        <span class="text-muted">Gerir</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">Asset</span>
                    @break

                    @case('tags.create')
                        <span class="text-muted">Criar</span>

                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">Tag</span>
                    @break

                    @case('tags.index')
                        <span class="text-muted">Gerir</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">Tags</span>
                    @break

                    @case('tags.show')
                        <span class="text-muted">Criar</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">Tag</span>
                    @break

                    @case('statistics.index')
                        <span class="text-muted">Os seus</span>
                        <br><span class="text-center mb-4 pb-2 text-primary fw-bold display-4">Analytics</span>
                    @break

                    @default
                        <span class="text-muted">!FissionUP</span> <br><span
                            class="text-center mb-4 pb-2 text-primary fw-bold display-4">2030</span>
                @endswitch
        </div>
    </div>
</div>
