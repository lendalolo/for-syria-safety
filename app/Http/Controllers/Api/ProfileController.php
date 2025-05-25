<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Report;
use App\Models\User;
use App\Http\Requests\UpdateProfileRequest;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $points = 0;
        $verified_reports=0;
        $reports = Report::with('reward')->where('user_id',auth()->id())->get();
        $total_reports = Report::with('reward')->where('user_id',auth()->id())->get()->count();
        $user = User::with('media','team','donations')->where('id', auth()->id())->first();
        foreach($reports as $report){
                if($report->reward)
                $points = $points + $report->reward->point;
                if($report->statue === "verified")
                $verified_reports++;
        }
            return response()->json([
            'profile' => $user,
            'reports'=>$reports,
            'points'=>$points,
            'total_reports'=>$total_reports,
            'verified_reports'=>$verified_reports
            ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = User::findOrFail(auth()->id());
        $user->update([
             "name"=>$request->name,
             "email"=>$request->email,
        ]);

            if ($request->media) {
                    $user->clearMediaCollection('users');
                    $user->addMediaFromRequest('media')->toMediaCollection('users');
             }
                return response()->json([
                'profile' => $user->load('media'),
                'message' => 'successfully update!'
                ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
          $user = User::where('id', auth()->id())->delete();
                   return response()->json([
                        'profile' => $user,
                      'message' => 'successfully deleted!'
                   ]);
    }
}
