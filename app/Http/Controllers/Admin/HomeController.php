<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\BloodFact;
use App\Models\AllergyFact;
use App\Models\Food;
use App\Models\FoodFact;

class HomeController extends Controller
{
    public function index() {
       $foodCount = Food::count('id');
       $bloodTypeCount = BloodFact::count('id');
       $allergyNameCount = AllergyFact::count('id');
       $foodFactCount = FoodFact::count('id');
       return view('admin.dashboard', ['foodCount' => $foodCount, 'bloodTypeCount' => $bloodTypeCount, 'allergyNameCount' => $allergyNameCount, 'foodFactCount' => $foodFactCount]);
    }
}
