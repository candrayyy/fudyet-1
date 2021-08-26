<?php

namespace App\Http\Controllers;

use App\Models\AllergyFact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AllergyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AllergyFact::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<div class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning text-white editAllergyFact"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger text-warning deleteAllergyFact"><i class="bi bi-trash2-fill"></i></i></a>
                                   </div>';
    
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin/allergyfact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AllergyFact::updateOrCreate(['id' => $request->id],
                ['allergy_name' => $request->allergy_name]);        
   
        return response()->json(['success'=>'Allergy name saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = AllergyFact::find($id);
        return response()->json($food);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AllergyFact::find($id)->delete();
     
        return response()->json(['success'=>'Allergy fact deleted successfully.']);
    }
}