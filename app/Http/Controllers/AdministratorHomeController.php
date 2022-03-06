<?php

namespace App\Http\Controllers;

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
    $day = Carbon::today()->toDateString();

    $dataValue = Stock::where('date', '=', $day)
      ->sum('value');
    $dataProduct = Product::all()
      ->count();
    $dataStock = Stock::where('date', '=', $day)
      ->get();
    $dataTotalStock = Stock::where('date', '=', $day)
      ->count();

    return view('administrator.home', compact('dataValue', 'dataProduct', 'dataStock', 'dataTotalStock'));
  }
}
