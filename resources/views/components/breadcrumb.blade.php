@props(['currentURL', 'icon'=>null, 'toolbar' => null, 'class' => null])
<div class="row">
    <div class="col">
        <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4 shadow border ">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item  active" aria-current="page"><span class="text-primary">{{$currentURL}}</span></li>
            </ol>
        </nav>
    </div>
</div>