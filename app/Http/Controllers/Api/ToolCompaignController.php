<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreToolCompaignRequest;
use App\Http\Requests\UpdateToolCompaignRequest;
// use Illuminate\Routing\Controller;
use App\Models\ToolCompaign;
use Illuminate\Support\Facades\Auth;

class ToolCompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toolcomapigns = ToolCompaign::with('tool','compaign')->get();
        return response()->json(['toolcomapigns' => $toolcomapigns], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolCompaignRequest $request)
    {
        $toolcomapign = ToolCompaign::create($request->validated());
        return response()->json(['tool' => $toolcomapign]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ToolCompaign $toolcomapign)
    {
        return response()->json(['tool' => $toolcomapign->load('tool','compaign')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolCompaignRequest $request, ToolCompaign $toolcomapign)
    {
        $toolcomapign->update($request->all());
        return response()->json(['tool' => $toolcomapign]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolCompaign $toolcomapign)
    {
        $toolcomapign->delete();
        return response()->json(['status' => 'success']);
    }

}
