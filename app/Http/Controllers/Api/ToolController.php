<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreToolRequest;
use App\Http\Requests\UpdateToolRequest;
use App\Models\Tool;
use App\Models\Teamposition;
use Illuminate\Support\Facades\Auth;

class ToolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tool = Tool::with('toolCompaigns','comppaigns','donations','users')->get();
        return response()->json(['tool' => $tool], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolRequest $request)
    {
        $tool = Tool::create($request->validated());
        return response()->json(['tool' => $tool]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tool $tool)
    {
        return response()->json(['tool' => $tool->load('toolCompaigns','comppaigns','donations','users')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateToolRequest $request, Tool $tool)
    {
        $tool->update($request->all());
        return response()->json(['tool' => $tool]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tool $tool)
    {
        $tool->delete();
        return response()->json(['status' => 'success']);
    }

}
