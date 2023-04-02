<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function index()
    {
        $seasons = Season::all();

        return view('seasons.index', compact('seasons'));
    }

    public function create()
    {
        return view('seasons.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|integer',
            'name' => 'required|string',
        ]);

        Season::create($request->all());

        return redirect()->route('seasons.index')->with('success', 'Season created successfully.');
    }
}