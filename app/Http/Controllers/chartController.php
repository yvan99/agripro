<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chartController extends Controller
{
    public function financeChartData()
    {
        $data = DB::table('finance')
            ->join('season', 'finance.season_id', '=', 'season.id')
            ->select('season.name', 'finance.production_cost', 'finance.income', 'finance.gross_margin', 'finance.labor_cost', 'finance.fertilizer_cost', 'finance.pesticide_cost', 'finance.irrigation_cost', 'finance.net_profit')
            ->get();

        return response()->json($data);
    }
}
