<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardConsolidationController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function latest()
  {
    $day = Carbon::yesterday()->toDateString();
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $datastocks = Stock::where('date', '=', $day)
      ->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->orderBy('quantity', 'desc')
      ->first();
    $highestValue = Stock::where('date', '=', $day)
      ->orderBy('value', 'desc')
      ->first();

    $highestValueByCompany = Stock::groupBy('company')
      ->where('date', '=', $day)
      ->selectRaw('sum(value) as sum, company')
      ->first();

    // dd($highestValueByCompany);
    $dataStockLength = Stock::where('date', '=', $day)
      ->count();

    $quantityAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('quantity');
    $quantityManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('quantity');
    $quantityGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('quantity');

    $valueAll = Stock::where('date', '=', $day)
      ->sum('value');
    $valueAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('value');
    $valueManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('value');
    $valueGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('value');

    $companyGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->get();

    return view(
      'dashboard.consolidation.consolidation',
      compact(
        'day',
        'now',
        'today',
        'datastocks',
        'highestValue',
        'highestValueByCompany',
        'highestAmount',
        'dataStockLength',
        'quantityAgroindustri',
        'quantityManufaktur',
        'quantityGaram',
        'valueAll',
        'valueAgroindustri',
        'valueManufaktur',
        'valueGaram',
      )
    );
  }

  public function search(Request $request)
  {
    $day = $request->input('date');
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $datastocks = Stock::where('date', '=', $day)
      ->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->orderBy('quantity', 'desc')
      ->first();
    $dataStockLength = Stock::where('date', '=', $day)
      ->count();
    $highestValue = Stock::where('date', '=', $day)
      ->orderBy('value', 'desc')
      ->first();

    $highestValueByCompany = Stock::groupBy('company')
      ->where('date', '=', $day)
      ->selectRaw('sum(value) as sum, company')
      ->first();

    $quantityAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('quantity');
    $quantityManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('quantity');
    $quantityGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('quantity');

    $valueAll = Stock::where('date', '=', $day)
      ->sum('value');
    $valueAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('value');
    $valueManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('value');
    $valueGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('value');


    return view(
      'dashboard.consolidation.consolidationbydate',
      compact(
        'day',
        'now',
        'today',
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'highestValue',
        'highestValueByCompany',
        'quantityAgroindustri',
        'quantityManufaktur',
        'quantityGaram',
        'valueAll',
        'valueAgroindustri',
        'valueManufaktur',
        'valueGaram',
      )
    );
  }

  public function monthly()
  {
    $day = Carbon::yesterday()->toDateString();
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $dailyTotalValueAgro = Stock::groupBy('date')
      ->whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Agroindustri')
      ->selectRaw('sum(value) as sum')
      ->pluck('sum');

    $dailyTotalValueAgro = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Agroindustri')
      ->pluck('value');

    $dailyTotalValueAgroConverted = array_map('intval', json_decode($dailyTotalValueAgro, true));


    $dailyTotalValueAgroDay = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Agroindustri')
      ->pluck('month');

    $dailyTotalValueAgroDayConverted = array_map('intval', json_decode($dailyTotalValueAgroDay, true));



    $dailyTotalValueManu = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Manufaktur')
      ->pluck('value');

    $dailyTotalValueManuConverted = array_map('intval', json_decode($dailyTotalValueManu, true));


    $dailyTotalValueManuDay = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Manufaktur')
      ->pluck('month');

    $dailyTotalValueManuDayConverted = array_map('intval', json_decode($dailyTotalValueManuDay, true));



    $dailyTotalValueGaram = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Garam')
      ->pluck('value');

    $dailyTotalValueGaramConverted = array_map('intval', json_decode($dailyTotalValueGaram, true));


    $dailyTotalValueGaramDay = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Garam')
      ->pluck('month');

    $dailyTotalValueGaramDayConverted = array_map('intval', json_decode($dailyTotalValueGaramDay, true));


    return view(
      'dashboard.consolidation.consolidationmonthly',
      compact(
        'day',
        'now',
        'today',
        'dailyTotalValueAgroConverted',
        'dailyTotalValueAgroDayConverted',
        'dailyTotalValueManuConverted',
        'dailyTotalValueManuDayConverted',
        'dailyTotalValueGaramConverted',
        'dailyTotalValueGaramDayConverted'
      )
    );
  }
}
