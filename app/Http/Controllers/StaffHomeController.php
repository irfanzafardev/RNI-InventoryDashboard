<?php

namespace App\Http\Controllers;

use DatePeriod;
use DateInterval;
use DateTime;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StaffHomeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    $id = Auth::user()->id;
    $day = Carbon::today()->toDateString();
    $company = Auth::user()->company->company_name;

    $carbon = Carbon::now();

    $day = Carbon::today()->toDateString();
    $month = $carbon->format('F');
    $year = Carbon::now()->format('Y');
    $monthYear = $month . " " . $year;

    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $dataValue = Stock::where('date', '=', $day)
      ->where('company', $company)
      ->sum('value');
    $dataProduct = Product::all()
      ->where('user_id', $id)
      ->where('active', true)
      ->count();
    $dataStock = Stock::where('date', '=', $day)
      ->where('company', $company)
      ->get();
    $dataTotalStock = Stock::where('date', '=', $day)
      ->where('company', $company)
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
      ->where('company', $company)
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

    return view(
      'user.home',
      [
        'year' => $year,
        'monthYear' => $monthYear,
        'label' => $label,
        'dataAllStock' => $dataAllStock,
      ],
      compact('now', 'today', 'company', 'dataProduct', 'dataStock', 'dataValue', 'dataTotalStock')
    );
  }
}
