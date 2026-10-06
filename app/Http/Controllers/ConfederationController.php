<?php

namespace App\Http\Controllers;

use App\Models\Confederation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfederationController extends Controller
{
    private function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'acronym' => 'required|string|max:10',
            'continent' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:2048',
        ];
    }

    public function index()
    {
        $confederations = Confederation::all();

        return view('confederations.index', compact('confederations'));
    }

    public function create()
    {
        return view('confederations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        }

        Confederation::create($validated);

        return redirect()->route('confederations.index')->with('success', 'Confederación creada correctamente');
    }

    public function show(Confederation $confederation)
    {
        return view('confederations.show', compact('confederation'));
    }

    public function edit(Confederation $confederation)
    {
        return view('confederations.edit', compact('confederation'));
    }

    public function update(Request $request, Confederation $confederation)
    {
        $validated = $request->validate($this->rules());

        if ($request->hasFile('logo')) {
            if ($confederation->logo) {
                Storage::disk('public')->delete($confederation->logo);
            }
            $validated['logo'] = $request->file('logo')->store('logos', 'public');
        } else {
            unset($validated['logo']); // conserva el logo actual
        }

        $confederation->update($validated);

        return redirect()->route('confederations.index')->with('success', 'Confederación actualizada correctamente');
    }

    public function destroy(Confederation $confederation)
    {
        if ($confederation->logo) {
            Storage::disk('public')->delete($confederation->logo);
        }

        $confederation->delete();

        return redirect()->route('confederations.index')->with('success', 'Confederación eliminada correctamente');
    }
}
