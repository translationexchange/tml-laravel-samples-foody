<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Tml\Cache;

class RecipesController extends Controller
{
    public function index()
    {
        $categories = Category::featured();

        return view('recipes.index', [
            "categories" => $categories
        ]);
    }

    public function show($key)
    {
        return view('recipes.show', ['recipe' => Recipe::findByKey($key)]);
    }

    public function edit($id)
    {
        return view('recipes.edit', ['recipe' => Recipe::findOrFail($id), 'categories' => Category::all()]);
    }

    public function update(Request $request, $id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->name = $request->input('recipe.name');
        $recipe->description = $request->input('recipe.description');
        $recipe->preparation = $request->input('recipe.preparation');
        $recipe->image = $request->input('recipe.image');
        $recipe->key = strtolower(str_replace(' ', '_', $recipe->name));
        $recipe->updateCategory($request);
        $recipe->save();

        $recipe->updateDirections($request);
        $recipe->updateIngredients($request);

        return redirect()->action('RecipesController@show', ['id' => $recipe->key]);
    }

    public function delete($id)
    {
        Recipe::destroy($id);
        return redirect()->action('RecipesController@index');
    }



}
