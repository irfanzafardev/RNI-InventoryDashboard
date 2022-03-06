<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class StaffStockController extends Controller
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
    $company = Auth::user()->company->company_name;
    $date = Carbon::today()->toDateString();
    return view('user.stocks.stock', [
      'stocks' => Stock::where('date', '=', $date)
        ->where('company', $company)
        ->get(),
      'allStocks' => Stock::where('company', $company)->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $check = Stock::count();
    $userid = Auth::user()->id;
    $now = Carbon::now();
    $tanggal = $now->year . $now->month . $now->day;
    if ($check == 0) {
      $order = 100001;
      $code = 'STC-' . $userid . $tanggal . $order;
    } else {
      $pull = Stock::all()->last();
      $order = (int)substr($pull->stock_code, -6) + 1;
      $code = 'STC-' . $userid . $tanggal . $order;
    }

    $today = Carbon::today()->toDateString();
    return view('user.stocks.create', compact('code', 'today'), [
      'products' => Product::all()->where('user_id', $userid),
      'users' => User::all(),
      'last' => Stock::all()->last()
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
    $validatedData = $request->validate([
      'stock_code' => 'required',
      'date' => 'required',
      'product_id' => 'required',
      'class' => 'required',
      'company' => 'required',
      'category' => 'required',
      'quantity' => 'required',
      'value' => 'required'
    ]);

    // $validatedData['user_id'] = auth()->user()->id;

    Stock::create($validatedData);
    return redirect('/staff/stocks')->with('success', 'Data has been successfully added');
    // return redirect('/administrator/detailstockin/');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function show(Stock $stock)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function edit(Stock $stock)
  {
    $userid = Auth::user()->id;
    return view('user.stocks.edit', [
      'stock' => $stock,
      'allStocks' => Stock::all(),
      'products' => Product::all()->where('user_id', $userid),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Stock $stock)
  {
    $validatedData = $request->validate([
      'stock_code' => 'required',
      'date' => 'required',
      'product_id' => 'required',
      'class' => 'required',
      'company' => 'required',
      'category' => 'required',
      'quantity' => 'required',
      'value' => 'required'
    ]);

    Stock::where('id', $stock->id)
      ->update($validatedData);

    return redirect('/staff/stocks')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Stock $stock)
  // {
  //   //
  // }

  public function deletestock($id)
  {
    $datastock = Stock::find($id);
    $datastock->delete();
    return redirect('/staff/stocks')->with('success', 'Data has been successfully deleted');
    // return redirect('/administrator/detaildeletestockin/');
  }
}
