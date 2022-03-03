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
    $groupid = Auth::user()->company->group->id;
    $company = Auth::user()->company->company_name;
    $dataproduct = Product::all()->where('user_id', $id)->count();
    $datacategory = Category::all()->where('group_id', $groupid)->count();
    $dataStock = Stock::where('date', '=', Carbon::today()->toDateString())->where('company', $company)->get();

    return view('user.home', compact('dataproduct', 'datacategory', 'dataStock'));
  }
}
