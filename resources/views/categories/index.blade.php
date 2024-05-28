@extends('layouts.app')
@section('content')
<x-pricing view="categories.index" />


@if (isset($categories))
<section class="categories">


    <div class="container">
        <x-breadcrumb currentURL="{{ request()->route()->uri }}" />
        <x-alert-success />
        <x-alert-error />
        <div class="row row-cols-1 row-cols-md-3 g-4 mb-2">
            @forelse ($categories as $category)
            <div class="col">
                <x-card title="{{ $category->category_name ?? 'Sem nome' }}">

                    <h3>{{ $category->category_name ?? 'Sem nome' }}</h3>
                    <span>{{ $category->category_description ?? 'Sem descrição' }}</span>

                    <div class="card-footer">
                    <a class="btn btn-primary  rounded-pill px-3  mt-2" href="{{ route('categories.show', $category) }}" role="button">Visualizar
                                {{ $category->category_name ?? '-' }}</a>
                    </div>
                </x-card>
            </div>
            @empty
            <x-nodata />
            @endforelse
        </div>
        <div class="container d-flex justify-content-center">{{ $categories->links() }}</div>

    </div>
</section>
@elseif (isset($categoriesearch))
<section class="categories-search">

    <div class="alert " role="alert" id="alert_info">
        <b> Temos <u class="text-info"><?php echo htmlspecialchars($rowcount ?? ''); ?></u>
            {{ $rowcount > 1 ? 'categorias' : 'categoria' }}</b>
    </div>
    <div class="main-container " id="main-container">

        @forelse ($categoriesearch as $category)
        <div class="card-body-mine shadow p-3 mb-5 bg-body rounded slide-in">

            <hr>
            <div class="card-body-info">

                <h3 class="card-title mt-2">{{ $category->category_name ?? 'Sem informação' }}</h3>
                <span class="card-description mt-2">{{ $category->category_description ?? 'Sem informação' }}</span>

                <div class="button-area">
                    <a class="btn btn-primary  rounded-pill px-3  mt-2" href="{{ route('categories.show', $category) }}" role="button">Visualizar
                        {{ $category->category_name ?? 'Asset' }}</a>
                </div>
            </div>
        </div>
        @empty

        <x-nodata />
        @endforelse

</section>
@endif
@endsection