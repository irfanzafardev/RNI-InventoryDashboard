<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Carbon\Carbon;

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
}
