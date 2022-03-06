<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Carbon\Carbon;

class AdministratorReportController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function latest()
  {
    $day = Carbon::yesterday()
      ->toDateString();
    $dataStocks = Stock::where('date', '=', $day)
      ->get();

    return view(
      'administrator.report.report',
      compact(
        'day',
        'dataStocks',
      )
    );
  }

  public function search(Request $request)
  {
    $day = $request->input('date');
    $today = Carbon::today()->toDateString();

    $stockbydates = Stock::where('date', '=', $day)
      ->get();

    return view(
      'administrator.report.reportbydate',
      compact(
        'day',
        'stockbydates',
      )
    );
  }
}
