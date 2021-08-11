<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Fact;
use App\Models\Food;
use App\Models\FoodFact;

class HomeController extends Controller
{
    public function index() {
       $foodCount = Food::count('id');
       $factCount = Fact::count('id');
       $foodFactCount = FoodFact::count('id');
       return view('admin.dashboard', ['foodCount' => $foodCount, 'factCount' => $factCount, 'foodFactCount' => $foodFactCount]);
    }
}
