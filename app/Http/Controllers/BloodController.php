<?php

namespace App\Http\Controllers;

use App\Models\BloodFact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BloodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BloodFact::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
   
                           $btn = '<div class="text-center">
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-warning text-white editBloodFact"><i class="bi bi-pencil-fill"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-outline-danger text-warning deleteBloodFact"><i class="bi bi-trash2-fill"></i></i></a>
                                   </div>';
    
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('admin/bloodfact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        BloodFact::updateOrCreate(['id' => $request->id],
                ['blood_type' => $request->blood_type]);        
   
        return response()->json(['success'=>'Blood fact saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloodfact = BloodFact::find($id);
        return response()->json($bloodfact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BloodFact::find($id)->delete();
     
        return response()->json(['success'=>'Blood fact deleted successfully.']);
    }
}

