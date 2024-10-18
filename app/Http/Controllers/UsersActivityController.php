<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Activity;
use \App\Models\UsersActivity;

class UsersActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activities = Activity::all();
        return view('users-activities.create', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|string|max:255'
        ]);

        UsersActivity::create([
            'activity_id' => $request->activity_id,
            'user_id' => \Auth::user()->id,
        ]);

        return redirect()->route('users-activities.create')->with('success', 'Activity added successfully in todays list!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
