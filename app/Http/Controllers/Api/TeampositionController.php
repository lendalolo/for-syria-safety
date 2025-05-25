<?php

namespace App\Http\Controllers\Api;


use App\Models\Teamposition;
use App\Http\Requests\StoreTeampositionRequest;
use App\Http\Requests\UpdateTeampositionRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class TeampositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locale = App::getLocale();

        $teamPositions = Teamposition::with('teams')->get()
            ->map(function ($item) use ($locale) {
                $nameJson = json_decode($item->getAttributes()['name'], true);
                $item->name = $nameJson[$locale] ?? null;
                return $item;
            });

        return response()->json(['teamPositions' => $teamPositions], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeampositionRequest $request)
    {
        $teamPosition = Teamposition::create($request->validated());
        return response()->json(['teamPosition' => $teamPosition->load('teams')], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {

        $locale = App::getLocale();

        $teamposition = Teamposition::with('teams')->findOrFail($id); // get one record with relation

        $nameJson = json_decode($teamposition->getAttributes()['name'], true);
        $teamposition->name = $nameJson[$locale] ?? null;

        return response()->json(['teamposition' => $teamposition], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeampositionRequest $request, Teamposition $teamposition)
    {
        $teamposition->update($request->validated());
        return response()->json(['teamposition' => $teamposition->load('teams')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teamposition $teamposition)
    {
        $teamposition->delete();
        return response()->json(['status' => 'success']);
    }
}
