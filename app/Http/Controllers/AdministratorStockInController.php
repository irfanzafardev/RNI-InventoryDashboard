<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Product;
use App\Models\User;
use App\Models\Group;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdministratorStockInController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return view('administrator.stocks.stockin.stockin', [
      'stockins' => StockIn::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('administrator.stocks.stockin.create', [
      'products' => Product::all(),
      'users' => User::all(),
    ]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // return $request;
    $validatedData = $request->validate([
      'transact_code' => 'required',
      'product_id' => 'required',
      'supplier' => 'required',
      'quantity' => 'required',
    ]);

    // $validatedData['user_id'] = auth()->user()->id;

    // dd($validatedData);

    StockIn::create($validatedData);
    return redirect('/administrator/stockin')->with('success', 'p');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\StockIn  $stockIn
   * @return \Illuminate\Http\Response
   */
  public function show(StockIn $stockIn)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\StockIn  $stockIn
   * @return \Illuminate\Http\Response
   */
  public function edit(StockIn $stockIn)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\StockIn  $stockIn
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, StockIn $stockIn)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\StockIn  $stockIn
   * @return \Illuminate\Http\Response
   */
  public function destroy(StockIn $stockIn)
  {
    //
  }
}
