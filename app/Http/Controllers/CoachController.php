<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::all();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('coaches.create');
    }

    public function store(Request $request)
    {
        Coach::create($request->all());
        return redirect('coaches')->with('success', 'Coach created successfully.');
    }

    public function edit($id)
    {
        $coach = Coach::findOrFail($id);
        return view('coaches.edit', compact('coach'));
    }

    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);
        $coach->name = $request->name;
        return redirect('coaches')->with('success', 'Coach updated successfully.');
    }

    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();
        return redirect('coaches')->with('success', 'Coach deleted successfully.');
    }
}
