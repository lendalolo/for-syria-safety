<?php

namespace App\Http\Controllers\Api;

use App\Models\Reward;
use App\Http\Requests\StoreRewardRequest;
use App\Http\Requests\UpdateRewardRequest;
use Illuminate\Routing\Controller;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reward = Reward::with('report')->get();
        return response()->json(['reward' => $reward], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRewardRequest $request)
    {
        $reward = Reward::create($request->validated());
        return response()->json(['reward' => $reward->load('report')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reward $reward)
    {
        return response()->json(['teams' => $reward->load('report')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRewardRequest $request, Reward $reward)
    {
        $reward->update($request->validated());
        return response()->json(['reward' => $reward->load('report')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reward $reward)
    {
        $reward->delete();
        return response()->json(['status' => 'success']);
    }
}
