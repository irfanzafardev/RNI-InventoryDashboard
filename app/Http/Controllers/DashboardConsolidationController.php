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
    $day = Carbon::today()->toDateString();

    $datastocks = Stock::where('date', '=', $day)
      ->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->orderBy('quantity', 'desc')
      ->first();
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
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'quantityAgroindustri',
        'quantityManufaktur',
        'quantityGaram',
        'valueAgroindustri',
        'valueManufaktur',
        'valueGaram',
      )
    );
  }
}
