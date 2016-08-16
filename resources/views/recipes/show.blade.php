@extends('layouts.application')

@section('content')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="row">
                        <div class="col-lg-6 col-sm-7">
                            <a href="/{{$locale}}" class="back-btn">{!! tr("Back") !!}</a>

                            <div class="recipe">
                                <h2>
                                    {!! tr($recipe->name) !!}
                                </h2>

                                <p>
                                    {!! tr($recipe->description) !!}
                                </p>

                                <hr>

                                <h5>
                                    {!! tr("Preparation") !!}
                                </h5>

                                <p>
                                    {!! tr($recipe->preparation) !!}
                                </p>
                                <hr>
                                <h5>
                                    {!! tr("Directions") !!}
                                </h5>
                                <ol>
                                    @foreach($recipe->directions as $direction)
                                        <li>
                                            <p>
                                                {!! tr($direction->description) !!}
                                            </p>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                        <div class="col-sm-5 col-lg-offset-1">
                            <div class="panel panel-default">
                                <img src="{{ asset('images/recipes/' . $recipe->image) }}" class="img-responsive">

                                <div class="panel-body">
                                    <h5>
                                        {!! tr("Ingredient List") !!}
                                    </h5>
                                    <table class="table recipe-table">
                                        <tbody>
                                        @foreach($recipe->ingredients as $ingredient)
                                            <tr>
                                                <td>
                                                    @if ($ingredient->measurements == '')
                                                        {!! tr('[bold: {count}] {count | ' . $ingredient->name . '}', [
                                                                'count' => $ingredient->quantity
                                                            ]) !!}
                                                    @else
                                                        {!! tr('[bold: {count || ' . $ingredient->measurements . '}] of ' . $ingredient->name, [
                                                                'count' => $ingredient->quantity
                                                            ]) !!}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row text-right" style="padding:0px 15px;">
                                <a href="/recipes/{{ $recipe->id }}/edit" class="btn btn-default btn-sm">
                                    {!! tr("Update Recipe") !!}
                                </a>
                                <a href="#" onclick="deleteRecipe(); return false;" class="btn btn-default btn-sm">
                                    {!! tr("Delete") !!}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteRecipe() {
            if (!confirm("{{ trl("Are you sure you want to delete this recipe?") }}")) return;
            location = '/{{ $locale }}/recipes/{{ $recipe->id }}/delete';
        }
    </script>

@endsection
