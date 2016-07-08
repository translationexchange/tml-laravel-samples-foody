@extends('layouts.application')

@section('content')

    <style>
        .jumbotron {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("{{ asset('images/heros/' . random_int(1, 19) . '.jpg') }}") center center no-repeat;
        }
    </style>

    <div class="jumbotron text-center">
        <div class="container">
            <h1>
                {!! tr("The Best in International Food") !!}
            </h1>

            <p>
                {!! tr("Food from around the world") !!}
            </p>
        </div>
    </div>

    <div data-spy="affix" data-offset-top="480" class="recipe-nav">
        <div class="container text-centered">
            <div id="nav-categories">
                <ul class="nav nav-tabs">
                    @foreach ($categories as $category)
                        <li>
                            <a href="#{{ $category->key }}">
                                {!! tr($category->name) !!}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            @foreach ($categories as $category)
                @include('recipes.list', array('category' => $category))
            @endforeach
        </div>
    </div>

@endsection
