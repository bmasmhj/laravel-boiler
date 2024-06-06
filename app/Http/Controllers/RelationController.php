<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Relation;
use Illuminate\Support\Facades\Auth;


class RelationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $relation = Relation::where('status', false)->orderBy('id','asc')->get();
            return response()->json([
                'status' => 1,
                'data' => $relation
            ]);
        } catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
           $relationValidation = Relation::where('status',false)->where('Description',$request->Description)->first();
           if ($relationValidation !== null) {
                return response()->json([
                    'status' => 0,
                    'message' => 'relation should be unique.'
                ],422);
            }
            
            $storeRelation = new Relation();
            $storeRelation->Description = $request->get('Description');
            $storeRelation->created_by = Auth::id(); 
            $storeRelation->save();
            return response()->json([
                'status' => 1,
                'message' => 'relation added.'
            ]);
        }
        catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Relation $relation)
    {
        try{
            $relationValidation = Relation::where('status',false)->where('Description',$request->Description)->first();
            if ($relationValidation !== null) {
                 return response()->json([
                     'status' => 0,
                     'message' => 'relation should be unique.'
                 ],422);
             }            
            $relation->Description = $request->get('Description');
            $relation->updated_by = Auth::id();
            $relation->save();
            return response()->json([
                'status' => 1,
                'message' => 'Relation Updated'
            ]);
        }
        catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $relation = Relation::where('id', $id)->first();
            $relation->status = true;
            $relation->updated_by = Auth::id();
            $relation->save();
            return response()->json([
                'status' => 1,
                'message' => 'Successfully Deleted'
            ]);
        }
        catch (\Exception $e) {
            throw $e;
        }
    }
}
