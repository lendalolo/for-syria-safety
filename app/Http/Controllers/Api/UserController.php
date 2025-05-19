<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserTeamRequest;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::with('team','reports')->get();
        return response()->json(['user' => $user], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = User::create($request->validated());
        return response()->json(['user' => $user->load('reports','team')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(['teams' => $user->load('team','reports')], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['user' => $user->load('team','reports')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['status' => 'success']);
    }
    public function RegerterInTeam(StoreUserTeamRequest $request)
    {
        $user_id = Auth::user()->id;
        $user =User::findOrFail($user_id);
        $user->update($request->all());
        return response()->json(['user' => $user->load('team','reports')]);
    }

//    public function myTeam()
//    {
//        $user_id = Auth::user()->id;
//        $data = User::with('team','reports')->where('user_id', $user_id)->get();
//        return response()->json(['teams' => $data]);
//    }
}
