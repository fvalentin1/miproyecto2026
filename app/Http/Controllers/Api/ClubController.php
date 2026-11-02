<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        return Club::paginate(15);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'titles' => 'required|integer|min:0',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'colors' => 'required|string|max:255',
            'stadium' => 'required|string|max:255',
            'founded_year' => 'required|integer|min:1800|max:2026',
        ]);

        $club = Club::create($validated);

        return response()->json($club, 201);
    }

    public function show(Club $club)
    {
        return $club;
    }

    public function update(Request $request, Club $club)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'titles' => 'required|integer|min:0',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'colors' => 'required|string|max:255',
            'stadium' => 'required|string|max:255',
            'founded_year' => 'required|integer|min:1800|max:2026',
        ]);

        $club->update($validated);

        return $club;
    }

    public function destroy(Club $club)
    {
        $club->delete();

        return response()->noContent();
    }
}
