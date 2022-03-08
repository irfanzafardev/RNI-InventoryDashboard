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

  public function latest()
  {
    $day = Carbon::today()->toDateString();

    $datastocks = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Manufaktur')->get();
    $highestAmount = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Manufaktur')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Manufaktur')
      ->count();

    $quantityWBIB = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->sum('quantity');
    $quantityASSP = Stock::where('date', '=', $day)
      ->where('category', 'ASSP')
      ->sum('quantity');
    $quantityAlatKesehatan = Stock::where('date', '=', $day)
      ->where('category', 'Alat Kesehatan')
      ->sum('quantity');
    $quantityLainnya = Stock::where('date', '=', $day)
      ->where('category', 'Produk Manufaktur Lainnya')
      ->sum('quantity');

    $valueWBIB = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->sum('value');
    $valueASSP = Stock::where('date', '=', $day)
      ->where('category', 'ASSP')
      ->sum('value');
    $valueAlatKesehatan  = Stock::where('date', '=', $day)
      ->where('category', 'Alat Kesehatan ')
      ->sum('value');
    $valueLainnya = Stock::where('date', '=', $day)
      ->where('category', 'Produk Manufaktur Lainnya')
      ->sum('value');


    return view(
      'dashboard.manufaktur.manufaktur',
      compact(
        'day',
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'quantityWBIB',
        'quantityASSP',
        'quantityAlatKesehatan',
        'quantityLainnya',
        'valueWBIB',
        'valueASSP',
        'valueAlatKesehatan',
        'valueLainnya',
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
    $PTRajawaliCitramas = "PT Rajawali Citramas";
    $PTMitraRB = "PT Mitra RB";
    $PTRajawaliTE = "PT Rajawali TE";

    $dataproduct = Product::where('class', 'Manufaktur')
      ->get();
    $dataproductPTRajawaliCitramas = Product::where('company', $PTRajawaliCitramas)
      ->get();
    $dataproductPTMitraRB = Product::where('company', $PTMitraRB)
      ->get();
    $dataproductPTRajawaliTE = Product::where('company', $PTRajawaliTE)
      ->get();
    $dataProductLength = Product::where('class', 'Manufaktur')
      ->count();
    $dataCategoryLength = Category::where('group_id', 3)
      ->count();
    $dataCategory = Category::where('group_id', 3)
      ->get();
    return view(
      'dashboard.manufaktur.manufakturproduct',
      compact(
        'dataproduct',
        'dataProductLength',
        'dataCategory',
        'dataCategoryLength',
        'dataproductPTRajawaliCitramas',
        'dataproductPTMitraRB',
        'dataproductPTRajawaliTE'
      )
    );
  }
}
