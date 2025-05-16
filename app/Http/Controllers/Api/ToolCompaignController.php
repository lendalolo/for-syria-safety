<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreToolCompaignRequest;
use App\Http\Requests\UpdateToolCompaignRequest;
use App\Models\ToolCompaign;
use Illuminate\Http\Request;

class ToolCompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = ToolCompaign::with('tool','compaign')->get();
        return response()->json(['tools' => $tools], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolCompaignRequest $request)
    {
        $tool = ToolCompaign::create($request->validated());
        return response()->json(['tool' => $tool]);
    }

    /**
     * Display the specified resource.
     */
    public function show(ToolCompaign $toolCompaign)
    {
        return response()->json(['steps' => $toolCompaign->load('tool','compaign')], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolCompaignRequest $request,ToolCompaign $toolCompaign)
    {
        $toolCompaign->update($request->validated());
        return response()->json(['toolCompaign' => $toolCompaign]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToolCompaign $toolCompaign)
    {
        $toolCompaign->delete();
        return response()->json(['status' => 'success']);
    }
}
