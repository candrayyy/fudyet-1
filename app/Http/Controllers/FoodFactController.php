<?php

namespace App\Http\Controllers;

use App\Models\FoodFact;
use App\Models\Food;
use App\Models\Fact;
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
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-info text-white editFoodFact">Edit</a>
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger deleteFoodFact">Delete</a>
                                   </div>';
    
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        
        $getFood = Food::get();
        $getFact = Fact::get();
        $getFoodFact = FoodFact::get();
        return view('admin/foodfact', ['foods' => $getFood, 'facts' => $getFact, 'food_facts' => $getFoodFact]);
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
                ['food_id' => $request->food_id, 'fact_id' => $request->fact_id]);        
   
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
        $fact = FoodFact::find($id);
        return response()->json($fact);
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