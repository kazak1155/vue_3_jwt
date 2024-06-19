<?php

namespace App\Http\Controllers\Fruit;

use App\Http\Controllers\Controller;
use App\Http\Resources\Fruit\FruitResourse;
use App\Models\Fruit;
use Illuminate\Http\Request;

class ShowFruit extends Controller
{
    public function showAll() {
        $fruits = Fruit::all();
        return FruitResourse::collection($fruits);
    }
}
