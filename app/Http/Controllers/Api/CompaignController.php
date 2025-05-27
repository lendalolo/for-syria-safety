<?php

namespace App\Http\Controllers\Api;


use App\Models\Compaign;
use App\Http\Requests\StoreCompaignRequest;
use App\Http\Requests\UpdateCompaignRequest;
use Illuminate\Routing\Controller;

class CompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $compaigns = Compaign::with(['team.users','location','media','toolCompaigns','organizationCompaign','steps'])->get();
        return response()->json(['compaigns' => $compaigns], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompaignRequest $request)
    {
        // $compaign = Compaign::create($request->validated());
        $compaign = Compaign::create([
            "start_date"=> $request->start_date,
            "end_date"=> $request->end_date,
            "video"=> $request->video,
            "article"=>$request->article,
          "location_id"=>$request->location_id,
          "team_id"=>$request->team_id,
          "name"=>$request->name,
          "description"=>$request->description,
        ]);
        $steps = json_decode($request->steps,true);
        // if(json_last_error()!==JSON_ERROR_NONE){
        //     return response()->json(['error'=>'Invalid Json'],400);
        // }
        if(is_array($steps)){
            foreach($steps as $stepData){
                // $step = Step::create([
                //     "name"=>$step->name,
                //     "description"=>$step->description,
                //     "compaign_id"=>$compaign->id
                // ]);
                $compaign->steps()->create([
                    "name"=>$stepData['name']??"",
                    "description"=>$stepData['description']??"",
                ]);
            //  dd($compaign);

            }
        }
        if ($request->media) {
            $compaign->addMediaFromRequest('media')->toMediaCollection('compaigns');
        }
        // dd($request->steps);
        // dd($compaign->load('steps','location','media','team.users'));
        // dd($request->steps);
        // dd('$compaign->steps()');
        return response()->json(['compaign' => $compaign->load('location','media','steps')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Compaign $compaign)
    {
        return response()->json(['compaign' => $compaign->load('team','location','media','toolCompaigns','organizationCompaign','steps')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompaignRequest $request, Compaign $compaign)
    {
        $compaign->update($request->validated());
        if ($request->media) {
                $compaign->clearMediaCollection('compaigns');
                $compaign->addMediaFromRequest('media')->toMediaCollection('compaigns');
        }
        return response()->json(['compaign' => $compaign->load('team','location','media','steps')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Compaign $compaign)
    {
        $compaign->delete();
        return response()->json(['status' => 'success']);
    }
}