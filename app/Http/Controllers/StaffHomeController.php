<?php

namespace App\Http\Controllers;

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

    $dataValue = Stock::where('date', '=', $day)
      ->where('company', $company)
      ->sum('value');
    $dataProduct = Product::all()
      ->where('user_id', $id)
      ->count();
    $dataStock = Stock::where('date', '=', $day)
      ->where('company', $company)
      ->get();
    $dataTotalStock = Stock::where('date', '=', $day)
      ->where('company', $company)
      ->count();

    return view('user.home', compact('dataProduct', 'dataStock', 'dataValue', 'dataTotalStock'));
  }
}
