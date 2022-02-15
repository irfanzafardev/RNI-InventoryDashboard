<?php

namespace App\Http\Controllers;

use App\Models\StockOut;
use Illuminate\Http\Request;

class AdministratorStockOutController extends Controller
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
    return view('administrator.stocks.stockout.stockout', [
      'stockins' => StockOut::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\StockOut  $stockOut
   * @return \Illuminate\Http\Response
   */
  public function show(StockOut $stockOut)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\StockOut  $stockOut
   * @return \Illuminate\Http\Response
   */
  public function edit(StockOut $stockOut)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\StockOut  $stockOut
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, StockOut $stockOut)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\StockOut  $stockOut
   * @return \Illuminate\Http\Response
   */
  public function destroy(StockOut $stockOut)
  {
    //
  }
}
