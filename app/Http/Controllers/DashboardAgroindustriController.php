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
        'companyGula'
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
      )
    );
  }

  public function product()
  {
    $PTPGRajawaliI = 3;
    $dataproduct = Product::where('class', 'Agroindustri')->get();
    $dataproductPTPGRajawaliI = Product::where('user_id', $PTPGRajawaliI)->get();
    $dataproductPTPGCandiBaru = Product::where('class', 'PT PG Candi Baru')->get();
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
        'dataproductPTPGCandiBaru'
      )
    );
  }
}
