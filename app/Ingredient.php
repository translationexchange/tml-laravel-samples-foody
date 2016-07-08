<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ingredients';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['quantity', 'name', 'measurement', 'index', 'description', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

}
