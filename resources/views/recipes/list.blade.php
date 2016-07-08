@if (count($category->recipes) > 0)
    <a id="{{ $category->key }}" class="anchor">&nbsp;</a>

    <div class="page-header">
        <h3>
            <a href="">{{$category->name}}</a>
        </h3>
    </div>

    <div class="row">
        <div class="col-lg-10 col-lg-offset-1">
            <div class="row">
                @foreach ($category->recipes as $recipe)
                    <div class="col-lg-4 col-md-6">
                        <a href="/recipes/{{ $recipe->key }}" class="panel panel-default recipe-thumbnail">
                            <img src="{{ asset('images/recipes/' . $recipe->image) }}" class="img-responsive">

                            <div class="panel-body">
                                <h4>
                                    {{ $recipe->name }}
                                </h4>

                                <p>
                                    {{ $recipe->description }}
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif
