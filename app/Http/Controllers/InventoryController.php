<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventory = Inventory::all();

        return response([
            'data' => $inventory
        ]);
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
    public function store(StoreInventoryRequest $request)
    {
//        $inventory = $request->validate([
//            'name' => 'required|max:26',
//            'description' => 'required',
//            'price' => 'required|numeric',
//        ]);
        $inventory = Inventory::create($request->validated());
        return response([
            'message' => 'Inventory Created Successfully',
            'data' => $inventory
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Inventory $inventory)
    {
        return response([
            'message' => 'Inventory retrieved successfully',
            'data' => $inventory
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inventory $inventory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInventoryRequest $request, $id)
    {
        $inventory = Inventory::find($id);

        $inventory->update($request->validated());
        return response([
            'data' => $inventory
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return response([
           'message' => 'Inventory deleted successfully',
            'data' => $inventory
        ], 200);
    }
}
