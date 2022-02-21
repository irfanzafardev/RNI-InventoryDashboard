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
    $id = Auth::user()->id;
    $groupid = Auth::user()->company->group->id;
    $dataproduct = Product::all()->where('user_id', $id)->count();
    $datacategory = Category::all()->where('group_id', $groupid)->count();

    return view('administrator.home', compact('dataproduct', 'datacategory'));
  }
}
