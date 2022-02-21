<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
    $dataproduct = Product::all()->where('user_id', $id);
    // dd($id);
    return view('user.home', compact('dataproduct'));
  }
}
