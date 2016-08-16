<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Tml\Cache;

class RecipesController extends Controller
{
    public function index($locale = null)
    {
        $categories = Category::featured();

        return view('recipes.index', [
            "locale" => $locale,
            "categories" => $categories
        ]);
    }

    public function show($locale, $key)
    {
        return view('recipes.show', [
            'locale' => $locale,
            'recipe' => Recipe::findByKey($key)
        ]);
    }

    public function create($locale) {
        $recipe = new Recipe();
        return view('recipes.edit', [
            'locale' => $locale,
            'recipe' => $recipe,
            'categories' => Category::all(),
            'directions' => [new \App\Direction(), new \App\Direction()],
            'ingredients' => [new \App\Ingredient(), new \App\Ingredient(), new \App\Ingredient()],
        ]);
    }

    public function edit($locale = null, $id)
    {
        $recipe = Recipe::findOrFail($id);
        return view('recipes.edit', [
            'locale' => $locale,
            'recipe' => $recipe,
            'categories' => Category::all(),
            'directions' => $recipe->directions,
            'ingredients' => $recipe->ingredients
        ]);
    }

    public function update(Request $request, $locale = null, $id = null)
    {
        if ($id)
            $recipe = Recipe::findOrFail($id);
        else
            $recipe = new Recipe();

        $recipe->name = $request->input('recipe.name');
        $recipe->description = $request->input('recipe.description');
        $recipe->preparation = $request->input('recipe.preparation');
        $recipe->image = $request->input('recipe.image');
        $recipe->key = strtolower(str_replace(' ', '_', $recipe->name));
        $recipe->updateCategory($request);
        $recipe->save();

        $recipe->updateDirections($request);
        $recipe->updateIngredients($request);

        return redirect()->action('RecipesController@show', ['id' => $recipe->key, 'locale' => $locale]);
    }

    public function delete($locale, $id)
    {
        Recipe::destroy($id);
        return redirect()->action('RecipesController@index', ['locale' => $locale]);
    }

}
