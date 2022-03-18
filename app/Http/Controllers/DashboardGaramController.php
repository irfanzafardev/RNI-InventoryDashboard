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

    $datastocks = Stock::where('date', '=', $day)
      ->where('class', 'Garam')->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->count();

    $quantityProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->sum('quantity');

    $quantityHasilImport = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->sum('quantity');

    $valueProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->sum('value');

    $valueHasilImport = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->sum('value');

    $companyProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->orderBy('quantity', 'desc')->get();

    $garamProduksiSendiriVal = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->where('company', 'PT Garam')
      ->sum('value');

    $companyHasilImport = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->orderBy('quantity', 'desc')->get();

    $garamHasilImportVal = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->where('company', 'PT Garam')
      ->sum('value');

    return view(
      'dashboard.garam.garam',
      compact(
        'day',
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'quantityProduksiSendiri',
        'quantityHasilImport',
        'valueProduksiSendiri',
        'valueHasilImport',
        'companyProduksiSendiri',
        'garamProduksiSendiriVal',
        'companyHasilImport',
        'garamHasilImportVal'
      )
    );
  }

  public function search(Request $request)
  {
    $day = $request->input('date');
    $stockbydates = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->get();

    $datastocks = Stock::all();
    $yesterday = Carbon::today()->toDateString();
    $highestAmount = Stock::where('date', '=', $day)
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->count();

    $quantityProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->sum('quantity');

    $quantityHasilImport = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->sum('quantity');

    $valueProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->sum('value');

    $valueHasilImport = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->sum('value');

    $companyProduksiSendiri = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->orderBy('quantity', 'desc')->get();

    $garamProduksiSendiriVal = Stock::where('date', '=', $day)
      ->where('category', 'Garam Produksi Sendiri')
      ->where('company', 'PG Garam')
      ->sum('value');

    $companyHasilImport = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->orderBy('quantity', 'desc')->get();

    $garamHasilImportVal = Stock::where('date', '=', $day)
      ->where('category', 'Garam Hasil Import')
      ->where('company', 'PG Garam')
      ->sum('value');

    // dd($stockbydate);

    return view(
      'dashboard.garam.garambydate',
      compact(
        'day',
        'datastocks',
        'stockbydates',
        'highestAmount',
        'dataStockLength',
        'quantityProduksiSendiri',
        'quantityHasilImport',
        'valueProduksiSendiri',
        'valueHasilImport',
        'companyProduksiSendiri',
        'garamProduksiSendiriVal',
        'companyHasilImport',
        'garamHasilImportVal'
      )
    );
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
