<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Group;

class DashboardController extends Controller
{
  public function index()
  {
    $dataproduct = Product::all();
    // $dataproduct = Product::where('subcategory_id', '2')->get();
    $group = "Agroindustri";
    $groupid = Group::where('group_name', $group)->first();
    $dataproductlength = Product::all()->count();
    $highestAmount = Product::orderBy('quantity', 'desc')->first();
    return view('dashboard.agroindustri', compact('dataproduct', 'highestAmount', 'dataproductlength', 'groupid'));
  }
}
