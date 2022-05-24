<?php

namespace App\Http\Controllers;

use DatePeriod;
use DateInterval;
use DateTime;

use App\Models\Product;
use App\Models\Stock;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdministratorHomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $carbon = Carbon::now();

    $day = Carbon::today()->toDateString();
    $month = $carbon->format('F');
    $year = Carbon::now()->format('Y');
    $monthYear = $month . " " . $year;

    $dataValue = Stock::where('date', '=', $day)
      ->sum('value');
    $dataProduct = Product::all()
      ->count();
    $dataStock = Stock::where('date', '=', $day)
      ->get();
    $dataTotalStock = Stock::where('date', '=', $day)
      ->count();

    $from = new Carbon('first day of this month');
    $to = Carbon::yesterday()->modify('+1 day')->toDateString();
    $from =  $from->toDateString();

    $period = new DatePeriod(new DateTime($from), new DateInterval('P1D'), new DateTime($to));
    $dbData = [];

    foreach ($period as $date) {
      $range[$date->format("Y-m-d")] = 0;
    };

    $dataAllStock = Stock::selectRaw("date, SUM(value) as value")
      ->whereDate('date', '>=', date($from))
      ->whereDate('date', '<=', date($to))
      ->groupBy('date')
      ->orderBy('date', 'ASC')
      ->get();

    foreach ($dataAllStock as $val) {
      $dbData[$val->date] = $val->value;
    }

    $dataAllStock = array_replace($range, $dbData);
    $label = array_keys($dataAllStock);
    $dataAllStock = array_values($dataAllStock);
    $dataAllStock = array_map('intval', $dataAllStock);


    $dataAllStockConverted = json_encode($dataAllStock);
    $labelConverted = json_encode($label);

    return view(
      'administrator.home',
      [
        'year' => $year,
        'monthYear' => $monthYear,
        'label' => $label,
        'dataAllStock' => $dataAllStock,
        'dataAllStockConverted' => $dataAllStockConverted,
        'labelConverted' => $labelConverted,
      ],
      compact('dataValue', 'dataProduct', 'dataStock', 'dataTotalStock', 'dataAllStockConverted', 'labelConverted')
    );
  }
}
