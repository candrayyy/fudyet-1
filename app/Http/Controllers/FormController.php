<?php

namespace App\Http\Controllers;

use App\Models\FoodFact;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    //
    public function index()
    {
        return view('multistepform');
    }

    public function formSubmit(Request $req)
    {

        /* { other join way }
        /*DB::table('foods')
                ->join('food_facts', 'foods.id', '=', 'food_facts.food_id')
                ->join('facts', 'food_facts.fact_id', '=', 'facts.id')*/

        /* { get foods by blood type } */
        $getByBlood = FoodFact::getDataFoodFact()
                    ->select('*')
                    ->where('food_facts.blood_type_id', $req->blood_type);

        $datas = $getByBlood->get();

        /* { selecting based on allergies } */
        if ($req->dairy_free) {

            $datas = $getByBlood
                    ->where('food_facts.allergy_name_id', '<>', $req->dairy_free) 
                    ->get();
        }

        if ($req->seafood_free) {

            $datas = $getByBlood
                    ->where('food_facts.allergy_name_id', '<>', $req->seafood_free)
                    ->get();
        }

        /* { mapping data for view } */
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
