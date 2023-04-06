<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use Illuminate\Http\Request;

class CropController extends Controller
{
    public function index()
    {
        $crops = Crop::with('farmer', 'season')->get();
        return view('crops.index', compact('crops'));
    }

    public function store(Request $request)
    {
        $crop = new Crop();
        $crop->crop_type = $request->crop_type;
        $crop->farmer_id = auth()->id();
        $crop->season_id = $request->season_id;
        $crop->area = $request->area;
        $crop->planting_date = $request->planting_date;
        $crop->seed_type = $request->seed_type;
        $crop->fertilizer_amount = $request->fertilizer_amount;
        $crop->pesticide_type = $request->pesticide_type;
        $crop->yield = $request->yield;
        $crop->save();
        return redirect()->route('crops.index')->with('success', 'Crop added successfully!');
    }
}
