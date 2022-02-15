<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
  public function index()
  {
    $dataproduct = Product::all();
    // dd($dataproduct);
    return view('dashboard.home', compact('dataproduct'));
  }
}
