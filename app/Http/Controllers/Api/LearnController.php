<?php

namespace App\Http\Controllers\Api;

use App\Models\Learn;
use App\Http\Requests\StoreLearnRequest;
use App\Http\Requests\UpdateLearnRequest;
use Illuminate\Routing\Controller;

class LearnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //objective
        $learn = Learn::with('objective')->get();
        return response()->json(['learn' => $learn], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLearnRequest $request)
    {
        $learn = Learn::create($request->validated());
        return response()->json(['teamPosition' => $learn->load('objective')], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Learn $learn)
    {
        return response()->json(['learn' => $learn->load('objective')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLearnRequest $request, Learn $learn)
    {
        $learn->update($request->validated());
        return response()->json(['learn' => $learn->load('objective')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Learn $learn)
    {
        $learn->delete();
        return response()->json(['status' => 'success']);
    }
}
