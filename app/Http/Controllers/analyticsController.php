<?php

namespace App\Http\Controllers;

use App\Models\Crop;
use App\Models\Energy;
use App\Models\Farmer;
use App\Models\Finance;
use App\Models\Season;
use App\Models\Water;
use Illuminate\Http\Request;

class analyticsController extends Controller
{
    public function index()
    {
        // Total number of seasons
        $totalSeasons = Season::count();

        // Total number of farmers
        $totalFarmers = Farmer::count();

        // Total area of all crops
        $totalArea = Crop::sum('area');

        // Total fertilizer cost of all crops
        $totalFertilizerCost = Crop::sum('fertilizer_cost');

        // Total yield of all crops
        $totalYield = Crop::sum('yield');

        // Total amount of water used
        $totalWaterAmount = Water::sum('amount');

        // Total cost of water used
        $totalWaterCost = Water::sum('cost');

        // Total amount of energy used
        $totalEnergyAmount = Energy::sum('amount');

        // Total cost of energy used
        $totalEnergyCost = Energy::sum('cost');

        // Total production cost
        $totalProductionCost = Finance::sum('production_cost');

        // Total income
        $totalIncome = Finance::sum('income');

        // Total gross margin
        $totalGrossMargin = Finance::sum('gross_margin');

        // Total labor cost
        $totalLaborCost = Finance::sum('labor_cost');

        // Total fertilizer cost
        $totalFertilizerCostFinance = Finance::sum('fertilizer_cost');

        // Total pesticide cost
        $totalPesticideCost = Finance::sum('pesticide_cost');

        // Total irrigation cost
        $totalIrrigationCost = Finance::sum('irrigation_cost');

        // Total net profit
        $totalNetProfit = Finance::sum('net_profit');

        return view('admin.dashboard', [
            'totalSeasons' => $totalSeasons,
            'totalFarmers' => $totalFarmers,
            'totalArea' => $totalArea,
            'totalFertilizerCost' => $totalFertilizerCost,
            'totalYield' => $totalYield,
            'totalWaterAmount' => $totalWaterAmount,
            'totalWaterCost' => $totalWaterCost,
            'totalEnergyAmount' => $totalEnergyAmount,
            'totalEnergyCost' => $totalEnergyCost,
            'totalProductionCost' => $totalProductionCost,
            'totalIncome' => $totalIncome,
            'totalGrossMargin' => $totalGrossMargin,
            'totalLaborCost' => $totalLaborCost,
            'totalFertilizerCostFinance' => $totalFertilizerCostFinance,
            'totalPesticideCost' => $totalPesticideCost,
            'totalIrrigationCost' => $totalIrrigationCost,
            'totalNetProfit' => $totalNetProfit,
        ]);
    }
}
