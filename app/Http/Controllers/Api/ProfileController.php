<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        $user = User::with('media','team','reports','donations')->where('id', auth()->id())->first();
            return response()->json([
            'profile' => $user
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      $user =  User::where('id', auth()->id())->update([
        'name' => $request->name,
        'email' => $request->email,
        ]);

      if ($request->media) {
            $user->addMediaFromRequest('media')->toMediaCollection('users');
        }

        return response()->json([
        'profile' => $user,
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