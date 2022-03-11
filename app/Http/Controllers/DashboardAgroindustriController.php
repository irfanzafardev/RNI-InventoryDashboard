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

    $companyTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->get();

    $companyTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->get();

    $companySawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->get();

    $companyKaret = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->get();



    $companyGula1st = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->first();

    $companyGula2nd = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();

    $companyGula3rd = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->skip(2)->take(1)->first();

    $companyGula4th = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->skip(3)->take(1)->first();


    $companyTetes1st = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->first();

    $companyTetes2nd = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();


    $companyTeh1st = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->first();

    $companyTeh2nd  = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();


    $companySawit1st = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->first();

    $companySawit2nd  = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();

    $companyKaret1st = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->orderBy('quantity', 'desc')->first();

    $companyKaret2nd  = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();

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
        'companyGula1st',
        'companyGula2nd',
        'companyGula3rd',
        'companyGula4th',
        'companyTetes',
        'companyTetes1st',
        'companyTetes2nd',
        'companyTeh',
        'companyTeh1st',
        'companyTeh2nd',
        'companySawit',
        'companySawit1st',
        'companySawit2nd',
        'companyKaret',
        'companyKaret1st',
        'companyKaret2nd',
      )
    );
  }

  public function search(Request $request)
  {
    $day = $request->input('date');
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

    $companyTetes = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->get();

    $companyTeh = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->get();

    $companySawit = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->get();

    $companyKaret = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->get();



    $companyGula1st = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->first();

    $companyGula2nd = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();

    $companyGula3rd = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->skip(2)->take(1)->first();

    $companyGula4th = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->skip(3)->take(1)->first();


    $companyTetes1st = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->first();

    $companyTetes2nd = Stock::where('date', '=', $day)
      ->where('category', 'Tetes')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();


    $companyTeh1st = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->first();

    $companyTeh2nd  = Stock::where('date', '=', $day)
      ->where('category', 'Teh')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();


    $companySawit1st = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->first();

    $companySawit2nd  = Stock::where('date', '=', $day)
      ->where('category', 'Sawit')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();

    $companyKaret1st = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->orderBy('quantity', 'desc')->first();

    $companyKaret2nd  = Stock::where('date', '=', $day)
      ->where('category', 'Karet')
      ->orderBy('quantity', 'desc')->skip(1)->take(1)->first();

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
        'companyGula1st',
        'companyGula2nd',
        'companyGula3rd',
        'companyGula4th',
        'companyTetes',
        'companyTetes1st',
        'companyTetes2nd',
        'companyTeh',
        'companyTeh1st',
        'companyTeh2nd',
        'companySawit',
        'companySawit1st',
        'companySawit2nd',
        'companyKaret',
        'companyKaret1st',
        'companyKaret2nd',
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
