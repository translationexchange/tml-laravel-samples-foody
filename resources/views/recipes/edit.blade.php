@extends('layouts.application')

@section('content')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <form action="/recipes{{ $recipe->id == null ? '' : '/' . $recipe->id }}" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-sm-7">

                                <div class="recipe">
                                    <h2>
                                        @if ($recipe->id == null)
                                            {!! tr("New Recipe") !!}
                                        @else
                                            {!! tr("Update Recipe") !!}
                                        @endif
                                    </h2>

                                    <div>
                                        <input type="text" name="recipe[name]" value="{{$recipe->name}}"
                                               placeholder="{{ trl("Recipe Name") }}" class="form-control">
                                    </div>

                                    <div style="padding: 10px 0;">
                                        <textarea name="recipe[description]" placeholder="{{ trl("Description") }}"
                                                  class="form-control">{{$recipe->description}}</textarea>
                                    </div>

                                    <div style="padding-bottom: 10px;">
                                        <input type="text" name="recipe[image]" value="{{$recipe->image}}"
                                               placeholder="{{ trl("Image Url") }}" class="form-control">
                                    </div>

                                    <h5>
                                        {!! tr("Category") !!}
                                    </h5>

                                    <div style="padding-bottom: 10px">
                                        <select name="recipe[category_id]" onChange="verifyCategory(this)"
                                                class="form-control">
                                            <option value="">{!! tr("New Category") !!}</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{ $recipe->category_id == $category->id ? 'selected' : '' }}>
                                                    {{trl($category->name)}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div id="new_category_field"
                                         style="padding-bottom: 10px; {{ $recipe->category_id == '' ? '' : 'display:none' }}">
                                        <input type="text" name="new_category_name" value=""
                                               placeholder="New category name" class="form-control">
                                    </div>

                                    <h5>
                                        {!! tr("Preparation") !!}
                                    </h5>

                                    <p>
                                        <textarea name="recipe[preparation]"
                                                  placeholder="{{ trl("Preparation instructions") }}"
                                                  class="form-control"
                                                  style="height: 80px;">{{$recipe->preparation}}</textarea>
                                    </p>
                                    <hr>
                                    <h5>
                                        {!! tr("Directions") !!}
                                    </h5>
                                    <table id="directions" class="table recipe-table">
                                        @foreach($directions as $index => $direction)
                                            <tr>
                                                <td>
                                                    <textarea name="recipe[directions][{{$index}}][description]"
                                                              placeholder="Directions"
                                                              class="form-control"
                                                              style="height: 120px;">{{$direction->description}}</textarea>
                                                </td>
                                                <td style="width: 80px;">
                                                    <a class="btn btn-default" onclick="addElement(this); return false;"
                                                       href="#" role="button"
                                                       style="display:inline-block; width: 30px; padding: 5px 5px;">+</a>
                                                    <a class="btn btn-default"
                                                       onclick="removeElement(this); return false;"
                                                       href="#" role="button"
                                                       style="display:inline-block;  width: 30px; padding: 5px 5px;">-</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-5 col-lg-offset-1">
                                <div class="panel panel-default">
                                    @if ($recipe->image != '')
                                        <img src="{{ asset('images/recipes/' . $recipe->image) }}"
                                             class="img-responsive">
                                    @endif
                                    <div class="panel-body">
                                        <h5>
                                            {!! tr("Ingredient List") !!}
                                        </h5>
                                        <table id="ingredients" class="table recipe-table">
                                            <tbody>
                                            @foreach($ingredients as $index => $ingredient)
                                                <tr>
                                                    <td class="fields">
                                                        <input type="text"
                                                               name="recipe[ingredients][{{$index}}][quantity]"
                                                               value="{{$ingredient->quantity}}"
                                                               placeholder="{{ trl("Amount") }}" class="form-control"
                                                               style="width: 60px; display: inline-block">
                                                        <input type="text"
                                                               name="recipe[ingredients][{{$index}}][measurements]"
                                                               value="{{$ingredient->measurements}}"
                                                               placeholder="{{ trl("Measurements") }}" class="form-control"
                                                               style="width: 70px; display: inline-block">
                                                        <input type="text" name="recipe[ingredients][{{$index}}][name]"
                                                               value="{{$ingredient->name}}"
                                                               placeholder="{{ trl("Name") }}" class="form-control"
                                                               style="width: 120px; display: inline-block">
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-default" href="#"
                                                           onclick="addElement(this); return false;" role="button"
                                                           style="display:inline-block; width: 30px; padding: 5px 5px;">+</a>
                                                        <a class="btn btn-default" href="#"
                                                           onclick="removeElement(this); return false;" role="button"
                                                           style="display:inline-block;  width: 30px; padding: 5px 5px;">-</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row text-center" style="padding-top:50px">
                            <button class="btn btn-default btn-primary btn-lg"
                                    type="submit">{!! tr("Submit") !!}
                            </button>
                            <a href="/recipes/{{ $recipe->key }}" class="btn btn-default btn-lg">{!! tr("Cancel") !!}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function verifyCategory(list) {
            if (list.value == '')
                $('#new_category_field').show();
            else
                $('#new_category_field').hide();
        }

        function resetValues(node) {
            if (node.nodeType == 1 && ['input', 'textarea'].indexOf(node.nodeName.toLowerCase()) != -1)
                node.value = '';

            var array = Array.from(node.children);
            array.forEach(function (child) {
                if (child.nodeType == 1)
                    resetValues(child);
            });
        }

        function addElement(element) {
            var row = element.parentElement.parentElement;
            var table = row.parentElement;
            var newRow = row.cloneNode(true);
            resetValues(newRow);
            table.insertBefore(newRow, row.nextSibling);
            updateDirectionsIndex();
            updateIngreditentsIndex();
        }

        function removeElement(element) {
            var row = element.parentElement.parentElement;
            var table = row.parentElement;
            table.removeChild(row);
            updateDirectionsIndex();
            updateIngreditentsIndex();
        }

        function updateDirectionsIndex() {
            $("#directions textarea").each(function (index, node) {
                node.name = "recipe[directions][" + index + "][description]";
            });
        }

        function updateIngreditentsIndex() {
            $("#ingredients .fields").each(function (index, node) {
                node.children[0].name = "recipe[ingredients][" + index + "][quantity]";
                node.children[1].name = "recipe[ingredients][" + index + "][measurements]";
                node.children[2].name = "recipe[ingredients][" + index + "][name]";
            });
        }

    </script>

@endsection
