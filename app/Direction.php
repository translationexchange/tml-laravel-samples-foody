<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'directions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['index', 'description', 'recipe_id'];

    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }

}
