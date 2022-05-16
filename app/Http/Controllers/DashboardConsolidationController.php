<?php

namespace App\Http\Controllers;

use DatePeriod;
use DateInterval;
use DateTime;

use Carbon\Carbon;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardConsolidationController extends Controller
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

    $datastocks = Stock::where('date', '=', $day)
      ->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->orderBy('quantity', 'desc')
      ->first();
    $highestValue = Stock::where('date', '=', $day)
      ->orderBy('value', 'desc')
      ->first();

    $highestValueByCompany = Stock::groupBy('company')
      ->where('date', '=', $day)
      ->selectRaw('sum(value) as sum, company')
      ->first();

    // dd($highestValueByCompany);
    $dataStockLength = Stock::where('date', '=', $day)
      ->count();

    $quantityAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('quantity');
    $quantityManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('quantity');
    $quantityGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('quantity');

    $valueAll = Stock::where('date', '=', $day)
      ->sum('value');
    $valueAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('value');
    $valueManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('value');
    $valueGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('value');

    $companyGula = Stock::where('date', '=', $day)
      ->where('category', 'Gula')
      ->orderBy('quantity', 'desc')->get();

    $carbon = Carbon::now();

    $day = Carbon::yesterday()->toDateString();
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $month = $carbon->format('F');
    $year = Carbon::now()->format('Y');
    $monthYear = $month . " " . $year;

    $exceptionDay = Carbon::today()->toDateString();
    $exceptionToday = Carbon::today()->toDateString();

    $dailyTotalValueAgro = Stock::groupBy('date')
      ->whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Agroindustri')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      ->selectRaw('sum(value) as sum')
      ->pluck('sum');

    $dailyTotalValueAgroConverted = array_map('intval', json_decode($dailyTotalValueAgro, true));

    $dailyTotalValueAgroDay = Stock::selectRaw("date_part('day', date) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Agroindustri')
      ->pluck('month');

    $dailyTotalValueAgroDayConverted = array_map('intval', json_decode($dailyTotalValueAgroDay, true));

    $dailyTotalValueManu = Stock::groupBy('date')
      ->whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Manufaktur')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      ->selectRaw('sum(value) as sum')
      ->pluck('sum');

    $dailyTotalValueManuConverted = array_map('intval', json_decode($dailyTotalValueManu, true));

    $dailyTotalValueManuDay = Stock::selectRaw("date_part('day', date) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Manufaktur')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      ->pluck('month');

    $dailyTotalValueManuDayConverted = array_map('intval', json_decode($dailyTotalValueManuDay, true));

    $dailyTotalValueGaram = Stock::groupBy('date')
      ->whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Garam')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      ->selectRaw('sum(value) as sum')
      ->pluck('sum');

    $dailyTotalValueGaramConverted = array_map('intval', json_decode($dailyTotalValueGaram, true));

    $dailyTotalValueGaramDay = Stock::selectRaw("date_part('day', date) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Garam')
      ->pluck('month');

    $dailyTotalValueGaramDayConverted = array_map('intval', json_decode($dailyTotalValueGaramDay, true));

    $joinTable = DB::table('stocks')
      ->join('products', 'stocks.product_id', 'products.id')
      ->select('stocks.id', 'products.product_name')
      ->where('products.class', 'Agroindustri')
      ->get();

    $from = new Carbon('first day of this month');
    $to = Carbon::yesterday()->modify('+1 day')->toDateString();
    $from =  $from->toDateString();

    $period = new DatePeriod(new DateTime($from), new DateInterval('P1D'), new DateTime($to));
    $dbData = [];

    foreach ($period as $date) {
      $range[$date->format("Y-m-d")] = 0;
    };

    $dataAgroindustri = Stock::selectRaw("date, SUM(value) as value")
      ->whereDate('date', '>=', date($from))
      ->whereDate('date', '<=', date($to))
      ->where('class', 'Agroindustri')
      ->groupBy('date')
      ->orderBy('date', 'ASC')
      ->get();


    foreach ($dataAgroindustri as $val) {
      $dbData[$val->date] = $val->value;
    }

    $dataAgroindustri = array_replace($range, $dbData);
    $label = array_keys($dataAgroindustri);
    $dataAgroindustri = array_values($dataAgroindustri);
    $dataAgroindustri = array_map('intval', $dataAgroindustri);

    $dataManufaktur = Stock::selectRaw("date, SUM(value) as value")
      ->whereDate('date', '>=', date($from))
      ->whereDate('date', '<=', date($to))
      ->where('class', 'Manufaktur')
      ->groupBy('date')
      ->orderBy('date', 'ASC')
      ->get();

    foreach ($dataManufaktur as $val) {
      $dbData[$val->date] = $val->value;
    }

    $dataManufaktur = array_replace($range, $dbData);
    $labelManufaktur = array_keys($dataManufaktur);
    $dataManufaktur = array_values($dataManufaktur);
    $dataManufaktur = array_map('intval', $dataManufaktur);

    $dataGaram = Stock::selectRaw("date, SUM(value) as value")
      ->whereDate('date', '>=', date($from))
      ->whereDate('date', '<=', date($to))
      ->where('class', 'Garam')
      ->groupBy('date')
      ->orderBy('date', 'ASC')
      ->get();

    foreach ($dataGaram as $val) {
      $dbData[$val->date] = $val->value;
    }

    $dataGaram = array_replace($range, $dbData);
    $labelGaram = array_keys($dataGaram);
    $dataGaram = array_values($dataGaram);
    $dataGaram = array_map('intval', $dataGaram);

    return view(
      'dashboard.consolidation.consolidation',
      [
        'year' => $year,
        'monthYear' => $monthYear,
        'label' => $label,
        'dataAgroindustri' => $dataAgroindustri,
        'labelManufaktur' => $dataManufaktur,
        'dataManufaktur' => $dataManufaktur,
        'labelGaram' => $labelGaram,
        'dataGaram' => $dataGaram,
      ],
      compact(
        'day',
        'now',
        'today',
        'month',
        'monthYear',
        'year',
        'datastocks',
        'highestValue',
        'highestValueByCompany',
        'highestAmount',
        'dataStockLength',
        'quantityAgroindustri',
        'quantityManufaktur',
        'quantityGaram',
        'valueAll',
        'valueAgroindustri',
        'valueManufaktur',
        'valueGaram',
        'dailyTotalValueAgroConverted',
        'dailyTotalValueAgroDayConverted',
        'dailyTotalValueManuConverted',
        'dailyTotalValueManuDayConverted',
        'dailyTotalValueGaramConverted',
        'dailyTotalValueGaramDayConverted',
      )
    );
  }

  public function search(Request $request)
  {
    $day = $request->input('date');
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $datastocks = Stock::where('date', '=', $day)
      ->get();
    $highestAmount = Stock::where('date', '=', $day)
      ->orderBy('quantity', 'desc')
      ->first();
    $dataStockLength = Stock::where('date', '=', $day)
      ->count();
    $highestValue = Stock::where('date', '=', $day)
      ->orderBy('value', 'desc')
      ->first();

    $highestValueByCompany = Stock::groupBy('company')
      ->where('date', '=', $day)
      ->selectRaw('sum(value) as sum, company')
      ->first();

    $quantityAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('quantity');
    $quantityManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('quantity');
    $quantityGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('quantity');

    $valueAll = Stock::where('date', '=', $day)
      ->sum('value');
    $valueAgroindustri = Stock::where('date', '=', $day)
      ->where('class', 'Agroindustri')
      ->sum('value');
    $valueManufaktur = Stock::where('date', '=', $day)
      ->where('class', 'Manufaktur')
      ->sum('value');
    $valueGaram = Stock::where('date', '=', $day)
      ->where('class', 'Garam')
      ->sum('value');


    return view(
      'dashboard.consolidation.consolidationbydate',
      compact(
        'day',
        'now',
        'today',
        'datastocks',
        'highestAmount',
        'dataStockLength',
        'highestValue',
        'highestValueByCompany',
        'quantityAgroindustri',
        'quantityManufaktur',
        'quantityGaram',
        'valueAll',
        'valueAgroindustri',
        'valueManufaktur',
        'valueGaram',
      )
    );
  }

  public function monthly()
  {
    $day = Carbon::yesterday()->toDateString();
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $exceptionDay = Carbon::today()->toDateString();
    $exceptionToday = Carbon::today()->toDateString();

    $dailyTotalValueAgro = Stock::groupBy('date')
      ->whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Agroindustri')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      // ->get();
      ->selectRaw('sum(value) as sum')
      ->pluck('sum');

    // $dailyTotalValueAgro = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
    //   ->groupBy('month')
    //   ->whereYear('created_at', date('Y'))
    //   ->where('class', 'Agroindustri')
    //   ->pluck('value');

    $dailyTotalValueAgroConverted = array_map('intval', json_decode($dailyTotalValueAgro, true));

    $dailyTotalValueAgroDay = Stock::selectRaw("date_part('day', date) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Agroindustri')
      ->pluck('month');

    // $dailyTotalValueAgroDay = Stock::selectRaw("date_part('day', date) as day, SUM(value) as value")
    //   ->groupBy('created_at', date('m'))
    //   ->whereYear('created_at', date('Y'))
    //   ->where('class', 'Agroindustri')
    //   ->pluck('day');

    $dailyTotalValueAgroDayConverted = array_map('intval', json_decode($dailyTotalValueAgroDay, true));

    // $dailyTotalValueManu = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
    //   ->groupBy('month')
    //   ->whereYear('created_at', date('Y'))
    //   ->where('class', 'Manufaktur')
    //   ->pluck('value');

    $dailyTotalValueManu = Stock::groupBy('date')
      ->whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Manufaktur')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      // ->get();
      ->selectRaw('sum(value) as sum')
      ->pluck('sum');

    $dailyTotalValueManuConverted = array_map('intval', json_decode($dailyTotalValueManu, true));

    $dailyTotalValueManuDay = Stock::selectRaw("date_part('day', date) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Manufaktur')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      ->pluck('month');

    $dailyTotalValueManuDayConverted = array_map('intval', json_decode($dailyTotalValueManuDay, true));

    // $dailyTotalValueGaram = Stock::selectRaw("date_part('day', created_at) as month, SUM(value) as value")
    //   ->groupBy('month')
    //   ->whereYear('created_at', date('Y'))
    //   ->where('class', 'Garam')
    //   ->pluck('value');

    $dailyTotalValueGaram = Stock::groupBy('date')
      ->whereMonth('created_at', date('m'))
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Garam')
      ->whereNotIn('date', [$exceptionDay, $exceptionToday])
      // ->get();
      ->selectRaw('sum(value) as sum')
      ->pluck('sum');

    $dailyTotalValueGaramConverted = array_map('intval', json_decode($dailyTotalValueGaram, true));

    $dailyTotalValueGaramDay = Stock::selectRaw("date_part('day', date) as month, SUM(value) as value")
      ->groupBy('month')
      ->whereYear('created_at', date('Y'))
      ->where('class', 'Garam')
      ->pluck('month');

    $dailyTotalValueGaramDayConverted = array_map('intval', json_decode($dailyTotalValueGaramDay, true));

    return view(
      'dashboard.consolidation.consolidationmonthly',
      compact(
        'day',
        'now',
        'today',
        'dailyTotalValueAgroConverted',
        'dailyTotalValueAgroDayConverted',
        'dailyTotalValueManuConverted',
        'dailyTotalValueManuDayConverted',
        'dailyTotalValueGaramConverted',
        'dailyTotalValueGaramDayConverted'
      )
    );
  }
}
