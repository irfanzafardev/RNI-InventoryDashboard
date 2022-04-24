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
    $day = Carbon::yesterday()->toDateString();
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $datastocks = Stock::where('date', '=', Carbon::yesterday()->toDateString())
      ->where('class', 'Manufaktur')->get();
    $highestAmount = Stock::where('date', '=', Carbon::yesterday()->toDateString())
      ->where('class', 'Manufaktur')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', Carbon::yesterday()->toDateString())
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

    $companyWBIB = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->orderBy('quantity', 'desc')->get();

    $tanjungsariWBIBVal = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->where('company', 'PT Rajawali TE')
      ->sum('value');

    $citramasWBIBVal = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->where('company', 'PT Rajawali Citramas')
      ->sum('value');

    $companyASSP = Stock::where('date', '=', $day)
      ->where('category', 'ASSP')
      ->orderBy('quantity', 'desc')->get();

    $banjaranASSPVal = Stock::where('date', '=', $day)
      ->where('category', 'ASSP')
      ->where('company', 'PT Mitra RB')
      ->sum('value');

    $companyLainnya = Stock::where('date', '=', $day)
      ->where('category', 'Produk Manufaktur Lain')
      ->orderBy('quantity', 'desc')->get();

    $banjaranLainnyaVal = Stock::where('date', '=', $day)
      ->where('category', 'Produk Manufaktur Lain')
      ->where('company', 'PT Mitra RB')
      ->sum('value');


    return view(
      'dashboard.manufaktur.manufaktur',
      compact(
        'day',
        'now',
        'today',
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'quantityWBIB',
        'quantityASSP',
        'quantityLainnya',
        'valueWBIB',
        'valueASSP',
        'valueLainnya',
        'companyWBIB',
        'tanjungsariWBIBVal',
        'citramasWBIBVal',
        'companyASSP',
        'banjaranASSPVal',
        'companyLainnya',
        'banjaranLainnyaVal'
      )
    );
  }

  public function search(Request $request)
  {
    $day = $request->input('date');
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $stockbydates = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->get();

    $datastocks = Stock::all();
    $yesterday = Carbon::today()
      ->toDateString();
    $highestAmount = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $day)
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

    $companyWBIB = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->orderBy('quantity', 'desc')->get();

    $tanjungsariWBIBVal = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->where('company', 'PT Rajawali TE')
      ->sum('value');

    $citramasWBIBVal = Stock::where('date', '=', $day)
      ->where('category', 'WB/IB')
      ->where('company', 'PT Rajawali Citramas')
      ->sum('value');

    $companyASSP = Stock::where('date', '=', $day)
      ->where('category', 'ASSP')
      ->orderBy('quantity', 'desc')->get();

    $banjaranASSPVal = Stock::where('date', '=', $day)
      ->where('category', 'ASSP')
      ->where('company', 'PT Mitra RB')
      ->sum('value');

    $companyLainnya = Stock::where('date', '=', $day)
      ->where('category', 'Produk Manufaktur Lain')
      ->orderBy('quantity', 'desc')->get();

    $banjaranLainnyaVal = Stock::where('date', '=', $day)
      ->where('category', 'Produk Manufaktur Lain')
      ->where('company', 'PT Mitra RB')
      ->sum('value');

    // dd($stockbydate);

    return view(
      'dashboard.manufaktur.manufakturbydate',
      compact(
        'day',
        'now',
        'today',
        'datastocks',
        'stockbydates',
        'highestAmount',
        'dataStockLength',
        'quantityWBIB',
        'quantityASSP',
        'quantityLainnya',
        'valueWBIB',
        'valueASSP',
        'valueLainnya',
        'companyWBIB',
        'tanjungsariWBIBVal',
        'citramasWBIBVal',
        'companyASSP',
        'banjaranASSPVal',
        'companyLainnya',
        'banjaranLainnyaVal'
      )
    );
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
