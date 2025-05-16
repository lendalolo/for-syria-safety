<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreToolsRequest;
use App\Http\Requests\UpdateToolsRequest;
use App\Models\Tools;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tools = Tools::with('toolCompaigns','compaigns')->get();
        return response()->json(['tools' => $tools], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolsRequest $request)
    {
        $tool = Tools::create($request->validated());
        return response()->json(['tool' => $tool]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tools  $tool)
    {
        return response()->json(['$tool' => $tool->load('toolCompaigns','compaigns')], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolsRequest $request, Tools $tool)
    {
        $tool->update($request->validated());
        return response()->json(['tool' => $tool]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tools $tool)
    {
        $tool->delete();
        return response()->json(['status' => 'success']);
    }
}
