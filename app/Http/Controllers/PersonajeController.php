<?php

namespace App\Http\Controllers;

use App\Models\Personaje;
use App\Models\Raza;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PersonajeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('personajes.index', [
            'personajes' => Personaje::all(),
        ]);
    }

    /**
     * Display only the authenticated user's characters.
     */
    public function myCharacters(): View
    {
        return view('personajes.index', [
            'personajes' => auth()->user()->personajes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view(
            'personajes.create',
            ['razas' => Raza::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'raza_id' => 'required|exists:razas,id',
            'clase' => 'required|string|max:255',
            'habilidades' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            $validated['imagen'] = $request->file('imagen')->store('public/personajes');
        }

        $validated['user_id'] = auth()->user()->id;

        Personaje::create($validated);

        return redirect()->route('personajes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Personaje $personaje)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Personaje $personaje): View
    {
        return view('personajes.edit', [
            'personaje' => $personaje,
            'razas' => Raza::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Personaje $personaje)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'raza_id' => 'required|exists:razas,id',
            'clase' => 'required|string|max:255',
            'habilidades' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($personaje->imagen) {
                Storage::delete($personaje->imagen);
            }
            $validated['imagen'] = $request->file('imagen')->store('public/personajes');
        }

        $personaje->update($validated);

        return redirect()->route('personajes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Personaje $personaje)
    {
        if ($personaje->imagen) {
            Storage::delete($personaje->imagen);
        }

        $personaje->delete();

        return redirect()->route('personajes.index');
    }
}
