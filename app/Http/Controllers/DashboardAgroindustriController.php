<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Carbon\Carbon;

class DashboardAgroindustriController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function latest()
  {
    $day = Carbon::today()->toDateString();

    $datastocks = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->count();

    $quantityGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->sum('quantity');
    $quantityTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->sum('quantity');
    $quantityTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->sum('quantity');
    $quantitySawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->sum('quantity');
    $quantityKaret = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->sum('quantity');

    $valueGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->sum('value');
    $valueTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->sum('value');
    $valueTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->sum('value');
    $valueSawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->sum('value');
    $valueKaret = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->sum('value');

    $companyGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->get();

    $rajawaliGulaVal = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->where('company', 'PT PG Rajawali I')
      ->sum('value');

    $candiGulaVal = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->where('company', 'PT PG Candi Baru')
      ->sum('value');

    $companyTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->get();

    $krebetTetesVal = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->where('company', 'PG Krebet baru I')
      ->sum('value');

    $rajawaliTetesVal = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->where('company', 'PT PG Rajawali I')
      ->sum('value');

    $candiTetesVal = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->where('company', 'PT PG Candi Baru')
      ->sum('value');

    $companyTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->get();

    $kerinciTehVal = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->where('company', 'PT Mitra Kerinci')
      ->sum('value');

    $companySawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->get();

    $laskarSawitVal = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->where('company', 'PT Laras Astra Kartika')
      ->sum('value');

    $oganSawitVal = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->where('company', 'PT Mitra Ogan')
      ->sum('value');

    $companyKaret = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->orderBy('quantity', 'desc')->get();

    return view(
      'dashboard.agroindustri.agroindustri',
      compact(
        'day',
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'quantityGula',
        'quantityTetes',
        'quantityTeh',
        'quantitySawit',
        'quantityKaret',
        'valueGula',
        'valueTetes',
        'valueTeh',
        'valueSawit',
        'valueKaret',
        'companyGula',
        'rajawaliGulaVal',
        'candiGulaVal',
        'companyTetes',
        'krebetTetesVal',
        'rajawaliTetesVal',
        'candiTetesVal',
        'companyTeh',
        'kerinciTehVal',
        'companySawit',
        'laskarSawitVal',
        'oganSawitVal',
        'companyKaret',
      )
    );
  }

  public function search(Request $request)
  {
    $day = $request->input('date');
    // dd($day);
    $today = Carbon::today()->toDateString();

    $stockbydates = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->orderBy('quantity', 'desc')->first();
    $dataStockLength = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->count();

    $quantityGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->sum('quantity');
    $quantityTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->sum('quantity');
    $quantityTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->sum('quantity');
    $quantitySawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->sum('quantity');
    $quantityKaret = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->sum('quantity');

    $valueGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->sum('value');
    $valueTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->sum('value');
    $valueTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->sum('value');
    $valueSawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->sum('value');
    $valueKaret = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->sum('value');

    $companyGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->get();

    $rajawaliGulaVal = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->where('company', 'PT PG Rajawali I')
      ->sum('value');

    $candiGulaVal = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->where('company', 'PT PG Candi Baru')
      ->sum('value');

    $companyTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->get();

    $krebetTetesVal = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->where('company', 'PG Krebet baru I')
      ->sum('value');

    $rajawaliTetesVal = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->where('company', 'PT PG Rajawali I')
      ->sum('value');

    $candiTetesVal = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->where('company', 'PT PG Candi Baru')
      ->sum('value');

    $companyTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->get();

    $kerinciTehVal = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->where('company', 'PT Mitra Kerinci')
      ->sum('value');

    $companySawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->get();

    $laskarSawitVal = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->where('company', 'PT Laras Astra Kartika')
      ->sum('value');

    $oganSawitVal = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->where('company', 'PT Mitra Ogan')
      ->sum('value');

    $companyKaret = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->orderBy('quantity', 'desc')->get();

    return view(
      'dashboard.agroindustri.agroindustribydate',
      compact(
        'day',
        'stockbydates',
        'highestAmount',
        'dataStockLength',
        'quantityGula',
        'quantityTetes',
        'quantityTeh',
        'quantitySawit',
        'quantityKaret',
        'valueGula',
        'valueTetes',
        'valueTeh',
        'valueSawit',
        'valueKaret',
        'companyGula',
        'rajawaliGulaVal',
        'candiGulaVal',
        'companyTetes',
        'krebetTetesVal',
        'rajawaliTetesVal',
        'candiTetesVal',
        'companyTeh',
        'kerinciTehVal',
        'companySawit',
        'laskarSawitVal',
        'oganSawitVal',
        'companyKaret',
      )
    );
  }

  public function product()
  {
    $PTPGRajawaliI = "PT PG Rajawali I";
    $PTPGCandiBaru = "PT PG Candi Baru";
    $PGKrebetBaruI = "PG Krebet baru I";
    $PTMitraKerinci   = "PT Mitra Kerinci";
    $dataproduct = Product::where('class', 'Agroindustri')->get();

    $dataproductPTPGRajawaliI = Product::where('company', $PTPGRajawaliI)->get();
    $dataproductPTPGCandiBaru = Product::where('company', $PTPGCandiBaru)->get();
    $dataproductPGKrebetBaruI = Product::where('company', $PGKrebetBaruI)->get();
    $dataproductPTMitraKerinci = Product::where('company', $PTMitraKerinci)->get();

    $dataProductLength = Product::where('class', 'Agroindustri')->count();
    $dataCategoryLength = Category::where('group_id', 2)->count();
    $dataCategory = Category::where('group_id', 2)->get();
    return view(
      'dashboard.agroindustri.agroindustriproduct',
      compact(
        'dataproduct',
        'dataProductLength',
        'dataCategory',
        'dataCategoryLength',
        'dataproductPTPGRajawaliI',
        'dataproductPTPGCandiBaru',
        'dataproductPGKrebetBaruI',
        'dataproductPTMitraKerinci'
      )
    );
  }
}
