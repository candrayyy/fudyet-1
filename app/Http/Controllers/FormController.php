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
        /*DB::enableQueryLog(); */
        $datas = FoodFact::getDataFoodFact()
                ->where('food_facts.fact_id', $req->blood_type)
                ->orWhere(function($query) use($req) {
                     $query->where('food_facts.fact_id', [$req->dairy_free])
                           ->orWhere('food_facts.fact_id', [$req->seafood_free]);
                })
                ->select(['foods.food_name', 'foods.food_category'])
                ->get();

        /*if (($req->seafood_free == false) and ($req->dairy_free == false)) {
              $datas = $datasS->get();
        } else if ($req->dairy_free) {
            $datas = $datasS->whereNotIn('food_facts.fact_id', [$req->dairy_free])->get();
        } else if ($req->seafood_free) {
            $datas = $datasS->whereNotIn('food_facts.fact_id', [$req->seafood_free])->get();
        } else if ($req->dairy_free and $req->seafood_free) {
            $datas = $datasS->whereNotIn('food_facts.fact_id', [$req->dairy_free])
                            ->whereNotIn('food_facts.fact_id', [$req->seafood_free])
                            ->get();
        }*/

        /*DB::getQueryLog(); */
        /*dd($datas);*/
     
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
