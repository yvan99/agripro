<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Season;
use App\Models\Water;
use Illuminate\Http\Request;

class WaterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $waters = Water::where('farmer_id', auth()->user()->id)->get();
        $seasons = Season::all();
        $crops = Crop::where('farmer_id', auth()->user()->id)->get();
        return view('water.index', compact('waters', 'seasons', 'crops'));
    }
    public function waterAdmin()
    {
        $waters = Water::all();
        $crops = Crop::all();

        $waterData = Water::join('seasons', 'waters.season_id', '=', 'seasons.id')
            ->join('crops', 'waters.crop_id', '=', 'crops.id')
            ->select('seasons.name as season_name', 'waters.amount', 'waters.irrigation_frequency', 'crops.name as crop_name', 'waters.cost')
            ->get();
        $seasons = $waterData->pluck('season_name')->unique();
        $crops = $waterData->pluck('crop_name')->unique();
        $waterJson = [];

        foreach ($seasons as $season) {
            $amount = $waterData->where('season_name', $season)->sum('amount');
            $frequency = $waterData->where('season_name', $season)->average('irrigation_frequency');
            $cost = $waterData->where('season_name', $season)->sum('cost');
            $waterJson['bar'][] = ['season_name' => $season, 'amount' => $amount, 'frequency' => $frequency, 'cost' => $cost];
            $waterJson['pie'][] = ['label' => $season, 'value' => $cost];
        }

        foreach ($crops as $crop) {
            $amount = $waterData->where('crop_name', $crop)->sum('amount');
            $frequency = $waterData->where('crop_name', $crop)->average('irrigation_frequency');
            $cost = $waterData->where('crop_name', $crop)->sum('cost');
            $waterJson['crop_bar'][] = ['crop_name' => $crop, 'amount' => $amount, 'frequency' => $frequency, 'cost' => $cost];
            $waterJson['crop_pie'][] = ['label' => $crop, 'value' => $cost];
        }
        return view('water.admin', compact('waters', 'crops','waterJson'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric',
            'irrigation_type' => 'required|string',
            'irrigation_frequency' => 'required|integer',
            'cost' => 'required|numeric',
            'season_id' => 'required|exists:seasons,id',
            'crop_id' => 'required|exists:crops,id',
        ]);
        $water = new Water();
        $water->amount = $validated['amount'];
        $water->irrigation_type = $validated['irrigation_type'];
        $water->irrigation_frequency = $validated['irrigation_frequency'];
        $water->cost = $validated['cost'];
        $water->farmer_id = $request->farmer_id;
        $water->season_id = $validated['season_id'];
        $water->crop_id = $validated['crop_id'];
        $water->save();
        return redirect()->back()->with('success', 'Water added successfully');
    }
}
