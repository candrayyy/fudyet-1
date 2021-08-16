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
        $datas = FoodFact::getData()
                ->where('food_facts.fact_id', $req->blood_type)
                ->select(['foods.food_name', 'foods.food_category'])
                ->get();

        $attrs = [];
        foreach ($datas as $data) {
            $attrs[$data->food_category][] =  $data->food_name;
        }

        foreach ($attrs as $attr => $value) {
            $dataCategories[] = $value;
        }


        return view('formresults', [ 'attrs' => $attrs, 'dataCategories' => $dataCategories]);
    }
}
