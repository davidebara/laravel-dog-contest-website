<?php

namespace App\Http\Controllers;
use App\Models\Owner; // Import the Owner class
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owner = Owner::where('userid', Auth::id())->first();
        return view('owners.index', compact('owner'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $existingOwner = Owner::where('userid', Auth::id())->first();

        if ($existingOwner) {
            // Redirect to a different page if a profile already exists
            return redirect()->route('owner-profile.index');
        }

        return view('owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
        ]);

        $owner = new Owner; // Create a new instance of the Owner class

        $owner->userid = Auth::id();
        $owner->first_name = $request->first_name;
        $owner->last_name = $request->last_name;
        $owner->country = $request->country;
        $owner->save();

        return redirect()->route('owner-profile.index')->with('success', 'Owner created successfully');
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
        $owner = Owner::find($id);

        if (!$owner) {
            return redirect()->route('owners.index')->with('error', 'Owner not found');
        }

        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'country' => 'required',
        ]);

        $owner = Owner::find($id);

        if (!$owner) {
            return redirect()->route('owners.index')->with('error', 'Owner not found');
        }

        $owner->first_name = $request->first_name;
        $owner->last_name = $request->last_name;
        $owner->country = $request->country;
        $owner->save();

        return redirect()->route('owner-profile.index')->with('success', 'Owner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
