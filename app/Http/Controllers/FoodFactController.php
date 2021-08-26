<?php

namespace App\Http\Controllers;

use App\Models\FoodFact;
use App\Models\Food;
use App\Models\BloodFact;
use App\Models\AllergyFact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FoodFactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FoodFact::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<div class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning text-white editFoodFact"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger text-warning deleteFoodFact"><i class="bi bi-trash2-fill"></i></i></a>
                                   </div>';
    
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $getFood = Food::get();
        $getBloodType = BloodFact::get();
        $getAllergyName = AllergyFact::get();
        $getFoodFact = FoodFact::get();
        return view('admin/foodfact', ['foods' => $getFood, 'bloods_fact' => $getBloodType, 'allergies_fact' => $getAllergyName, 'food_facts' => $getFoodFact]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FoodFact::updateOrCreate(['id' => $request->id],
                ['food_id' => $request->food_id, 'blood_type_id' => $request->blood_type_id, 'allergy_name_id' => $request->allergy_name_id]);        
   
        return response()->json(['success'=>'Food fact saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foodFact = FoodFact::find($id);
        return response()->json($foodFact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FoodFact::find($id)->delete();
     
        return response()->json(['success'=>'Food fact deleted successfully.']);
    }
}