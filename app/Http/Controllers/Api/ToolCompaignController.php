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
        $tool_compaigns = ToolCompaign::with('tools','compaigns')->get();
        return response()->json(['tool_compaigns' => $tool_compaigns], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolCompaignRequest $request)
    {
        $tool_compaign = ToolCompaign::create($request->validated());
        return response()->json(['tool_compaign' => $tool_compaign]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ToolCompaign $tool_compaign)
    {
        return response()->json(['tool_compaign' => $tool_compaign->load('tools','compaigns')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolCompaignRequest $request, ToolCompaign $tool_compaign)
    {
        $tool_compaign->update($request->all());
        return response()->json(['tool_compaign' => $tool_compaign]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolCompaign $tool_compaign)
    {
        $tool_compaign->delete();
        return response()->json(['status' => 'success']);
    }

}