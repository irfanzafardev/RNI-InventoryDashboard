<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Stock;
use App\Exports\StockExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StaffReportController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function latest()
  {
    $company = Auth::user()->company->company_name;
    $day = Carbon::yesterday()
      ->toDateString();
    $dataStocks = Stock::where('date', '=', $day)
      ->where('company', $company)
      ->get();

    return view(
      'user.report.report',
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
    $company = Auth::user()->company->company_name;

    $stockbydates = Stock::where('date', '=', $day)
      ->where('company', $company)
      ->get();

    return view(
      'user.report.reportbydate',
      compact(
        'day',
        'stockbydates',
      )
    );
  }

  public function export()
  {
    return Excel::download(new StockExport, 'datastock.xlsx');
  }
}
