@extends('layouts.master')

@section('meta_title')Buscador @endsection

@section('content')
<!-- Heading -->
<section id="heading">
    <div class="container-fluid">

        <ul class="breadcrumbs">
            <li><a href="/">NMO</a></li>
            <li class="active">
                Busqueda: {{ $search }}
            </li>
        </ul>

        <div class="section-title">
            <h2>@if($articles->count() == 0)
                No encontramos resultados para <strong>{{ $search }}</strong>
                @else
                Resultados de busqueda para: {{ $search }}
                @endif
            </h2>
                        @foreach($articles as $article)
            <h4><a href="{{ $article->url }}">
                    {{ $article->title }}
                </a></h4>
            @endforeach
        </div>
        
    </div>
</section>
@endsection