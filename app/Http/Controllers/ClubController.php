<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clubs = Club::all();

        return view('clubs.index', compact('clubs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'titles' => 'required|integer|min:0',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'colors' => 'required|string|max:255',
            'stadium' => 'required|string|max:255',
            'founded_year' => 'required|integer|min:1800|max:2026',
        ]);

        Club::create($validated);

        return redirect()->route('clubs.index')->with('success', 'Club creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Club $club)
    {
        return view('clubs.show', compact('club'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Club $club)
    {
        return view('clubs.edit', compact('club'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Club $club)
    {
        $validated = $request->validate([
            'name'=> 'required|string|max:255',
            'titles' => 'required|integer|min:0',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'colors' => 'required|string|max:255',
            'stadium' => 'required|string|max:255',
            'founded_year' => 'required|integer|min:1800|max:2026',
        ]);

        $club->update($validated);

        return redirect()->route('clubs.index')->with('success', 'Club actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Club $club)
    {
        $club->delete();

        return redirect()->route('clubs.index')->with('success', 'Club eliminado correctamente');
    }
}
