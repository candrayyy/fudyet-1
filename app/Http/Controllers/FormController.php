<?php

namespace App\Http\Controllers;

use App\Models\FoodFact;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function index()
    {
        return view('multistepform');
    }

    public function formSubmit(Request $req)
    {
        /*return FoodFact::where('fact_id', $req->blood_type)->get();*/
        $datas = FoodFact::getData()
                ->where('food_facts.fact_id', $req->blood_type)
                ->select(['foods.food_name', 'foods.food_category'])
                ->get();

        return view('formresults', ['datas' => $datas]);
    }
}
