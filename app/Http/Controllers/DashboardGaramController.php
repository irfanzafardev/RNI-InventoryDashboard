<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Carbon\Carbon;

class DashboardGaramController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function latest()
  {
    $day = Carbon::today()->toDateString();

    $datastocks = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Garam')->get();
    $highestAmount = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Garam')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', Carbon::today()->toDateString())
      ->where('class', 'Garam')
      ->count();

    $quantityProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->sum('quantity');

    $valueProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->sum('value');

    $companyProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->orderBy('quantity', 'desc')->get();

    $companyProduksiSendiri1st = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->orderBy('quantity', 'desc')->first();

    $companyProduksiSendiri2nd = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();

    return view(
      'dashboard.garam.garam',
      compact(
        'day',
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'quantityProduksiSendiri',
        'valueProduksiSendiri',
        'companyProduksiSendiri',
        'companyProduksiSendiri1st',
        'companyProduksiSendiri2nd'
      )
    );
  }

  public function search(Request $request)
  {
    $date = $request->input('date');
    $stockbydates = Stock::where('date', '=', $date)
      ->where('class', 'Garam')
      ->get();

    $datastocks = Stock::all();
    $yesterday = Carbon::today()->toDateString();
    $highestAmount = Stock::where('date', '=', $date)
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $date)
      ->where('class', 'Garam')
      ->count();

    // dd($stockbydate);

    return view('dashboard.garam.garambydate', compact('datastocks', 'stockbydates', 'highestAmount', 'dataStockLength', 'date'));
  }

  public function product()
  {
    $PTGaram = "PT Garam";
    $dataproduct = Product::where('class', 'Garan')->get();
    $dataproductPTGaram = Product::where('company', $PTGaram)->get();
    $dataProductLength = Product::where('class', 'Garam')->count();
    $dataCategoryLength = Category::where('group_id', 3)->count();
    $dataCategory = Category::where('group_id', 3)->get();
    return view(
      'dashboard.garam.garamproduct',
      compact(
        'dataproduct',
        'dataProductLength',
        'dataCategory',
        'dataCategoryLength',
        'dataproductPTGaram',
      )
    );
  }
}
