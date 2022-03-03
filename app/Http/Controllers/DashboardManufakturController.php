<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Carbon\Carbon;

class DashboardManufakturController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function daily()
  {
    // $datastocks = Stock::where('class', 'Manufaktur')->get();
    $datastocks = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Manufaktur')->get();
    $highestAmount = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Manufaktur')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Manufaktur')
      ->count();
    $yesterday = Carbon::today()->toDateString();
    return view(
      'dashboard.manufaktur.manufaktur',
      compact(
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'yesterday'
      )
    );
  }

  public function search(Request $request)
  {
    $date = $request->input('date');
    $stockbydates = Stock::where('date', '=', $date)
      ->where('class', 'Manufaktur')
      ->get();

    $datastocks = Stock::all();
    $yesterday = Carbon::today()->toDateString();
    $highestAmount = Stock::where('date', '=', $date)
      ->where('class', 'Manufaktur')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $date)
      ->where('class', 'Manufaktur')
      ->count();

    // dd($stockbydate);

    return view('dashboard.manufaktur.manufakturbydate', compact('datastocks', 'stockbydates', 'highestAmount', 'dataStockLength', 'date'));
  }

  public function product()
  {
    $PTRajawaliCitramas = 4;
    $PTMitraRB = 6;
    $dataproduct = Product::where('class', 'Manufaktur')->get();
    $dataproductPTRajawaliCitramas = Product::where('user_id', $PTRajawaliCitramas)->get();
    $dataproductPTMitraRB = Product::where('user_id', $PTMitraRB)->get();
    $dataProductLength = Product::where('class', 'Manufaktur')->count();
    $dataCategoryLength = Category::where('group_id', 3)->count();
    $dataCategory = Category::where('group_id', 3)->get();
    return view(
      'dashboard.manufaktur.manufakturproduct',
      compact(
        'dataproduct',
        'dataProductLength',
        'dataCategory',
        'dataCategoryLength',
        'dataproductPTRajawaliCitramas',
        'dataproductPTMitraRB'
      )
    );
  }
}
