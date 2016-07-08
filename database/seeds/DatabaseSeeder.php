<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $data = json_decode(file_get_contents(database_path('data/recipes.json')), true);

        \App\Category::truncate();

        foreach ($data['categories'] as $category) {
            $cat = App\Category::findOrCreate($category['id']);
            $cat->update(['name' => $category['name']]);
        }

        \App\Recipe::truncate();

        foreach ($data['recipes'] as $recipe) {
            $rec = App\Recipe::findOrCreate($recipe['id']);
            $rec->update([
                'name' => $recipe['name'],
                'description' => $recipe['description'],
                'image' => $recipe['image'],
                'preparation' => $recipe['preparation']
            ]);

            $cat = App\Category::findByKey($recipe['category']);
            if ($cat) {
                $rec->update(['category_id' => $cat->id]);
            }

            $rec->directions()->delete();

            foreach ($recipe['directions'] as $direction) {
                App\Direction::create([
                    'recipe_id' => $rec->id,
                    'description' => $direction
                ]);
            }

            $rec->ingredients()->delete();

            foreach ($recipe['ingredients'] as $ingredient) {
                App\Ingredient::create(array_merge($ingredient, ['recipe_id' => $rec->id]));
            }
        }

        Model::reguard();
    }
}
