<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
    $dataproduct = Product::all()->count();
    $datacategory = Category::all()->count();

    return view('administrator.home', compact('dataproduct', 'datacategory'));
  }
}
