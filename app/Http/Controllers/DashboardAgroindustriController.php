<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Group;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardAgroindustriController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function product()
  {
    $dataproduct = Product::where('class', 'Agroindustri')->get();
    $dataproductlength = Product::all()->count();
    $highestAmount = Product::orderBy('quantity', 'desc')->first();
    return view('dashboard.agroindustri.agroindustriproduct', compact('dataproduct', 'highestAmount', 'dataproductlength'));
  }

  public function daily()
  {
    $datastocks = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Agroindustri')->get();
    $highestAmount = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Agroindustri')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Agroindustri')
      ->count();
    $yesterday = Carbon::today()->toDateString();
    return view('dashboard.agroindustri.agroindustri', compact('datastocks', 'highestAmount', 'dataStockLength', 'yesterday'));
  }

  public function search(Request $request)
  {
    $date = $request->input('date');
    $stockbydates = Stock::where('date', '=', $date)->get();

    $datastocks = Stock::all();
    $yesterday = Carbon::today()->toDateString();
    $highestAmount = Stock::where('date', '=', $date)
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $date)->count();

    // dd($stockbydate);

    return view('dashboard.agroindustri.agroindustribydate', compact('datastocks', 'stockbydates', 'highestAmount', 'dataStockLength', 'date'));
  }
}
