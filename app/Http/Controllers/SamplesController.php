<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use App\User;
use Illuminate\Http\Request;
use Tml\Cache;

class SamplesController extends Controller
{
    public function index()
    {
        $michael = ["name" => "Michael", "gender" => "male"];
        $anna = ["name" => "Anna", "gender" => "female"];
        $peter = ["name" => "Peter", "gender" => "male"];
        $tom = ["name" => "Tom", "gender" => "male"];
        $amy = ["name" => "Amy", "gender" => "female"];

        $users = [$anna, $michael, $peter, $amy, $tom];

        return view('samples.index', [
            'michael' => $michael,
            'anna' => $anna,
            'users' => $users
        ]);
    }

}
