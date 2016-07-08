<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recipes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'name', 'description', 'locale', 'image', 'preparation', 'category_id'];

    public static function findByKey($key) {
        return Recipe::where('key', $key)->first();
    }

    public static function findOrCreate($key) {
        $rec = Recipe::findByKey($key);
        return $rec == null ? Recipe::create(['key' => $key]) : $rec;
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function directions()
    {
        return $this->hasMany('App\Direction');
    }

    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }

    public function imageUrl() {

    }

    public function updateCategory($request)
    {
        if ($request->input('recipe.category_id') == '') {
            if ($request->input('new_category_name') != '') {
                $name = $request->input('new_category_name');
                $key = strtolower($name);
                $category = Category::where("key", $key)->first();
                if (!$category)
                    $category = Category::create(["name" => $name, "key" => $key]);
                $this->category_id = $category->id;
            }
        } else {
            $category = Category::where("id", $request->input('recipe.category_id'))->first();
            $this->category_id = $category->id;
        }
    }

    public function updateDirections($request)
    {
        $this->directions()->delete();

        $directions = $request->input('recipe.directions');
        foreach($directions as $key => $direction) {
            Direction::create(array_merge($direction, ['recipe_id' => $this->id]));
        }
    }

    public function updateIngredients($request)
    {
        $this->ingredients()->delete();

//        echo json_encode($request->input('recipe.ingredients'));

        $ingredients = $request->input('recipe.ingredients');
        foreach($ingredients as $ingredient) {
            Ingredient::create(array_merge($ingredient, ['recipe_id' => $this->id]));
        }
    }

}
