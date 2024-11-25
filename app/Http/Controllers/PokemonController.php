<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PokemonController extends Controller
{
        public function index()
    {
        $pokemon = pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }
    public function create()
    {
        Gate::authorize('create', Pokemon::class);

        $coaches = Coach::all();
        return view('pokemon.create', compact('coaches'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'type'=> 'required',
            'power'=> 'required',
            'coaches'=> 'required'
        ]

        );
        $pokemon = new pokemon();
        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;
        $pokemon->coach_id = $request->coach_id;
        $pokemon->save();

        return redirect('pokemon')->with('success', 'Pokemon created successfully.');
    }

    public function edit($id)
    {
        Gate::authorize('update', pokemon::class);

        $pokemon = pokemon::findOrFail($id);
        $coaches = Coach::all();
        return view('pokemon.edit', compact('pokemon', 'coaches'));
    }

    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->update($request->all());

        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;
        $pokemon->coach_id = $request->coach_id;
        return redirect('pokemon')->with('success', 'Pokemon updated successfully.');
    }

    public function destroy($id)
    {
        Gate::authorize('delete', pokemon::class);

        $pokemon = pokemon::findOrFail($id);
        $pokemon->delete();
        return redirect('pokemon')->with('success', 'Pokemon deleted successfully.');
    }
    }
