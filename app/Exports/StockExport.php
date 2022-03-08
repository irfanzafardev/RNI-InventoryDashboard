<?php

namespace App\Exports;

use Carbon\Carbon;
use App\Models\Stock;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class StockExport implements FromView
{
  public function view(): View
  {
    $today = Carbon::today()->toDateString();
    $company = Auth::user()->company->company_name;
    return view('exports.stock', [
      'stocks' => Stock::where('company', $company)
        ->where('date', $today)
        ->get()
    ]);
  }

  // public function collection()
  // {
  //   $today = Carbon::today()->toDateString();
  //   $company = Auth::user()->company->company_name;
  //   return Stock::where('company', $company)
  //     ->get();
  // }
}
