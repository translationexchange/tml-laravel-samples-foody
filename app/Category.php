<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['key', 'name', 'locale'];

    public static function featured() {
        $categories = Category::all();
        return $categories;
    }

    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }
}
