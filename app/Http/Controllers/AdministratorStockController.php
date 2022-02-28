<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdministratorStockController extends Controller
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
    return view('administrator.stocks.stock', [
      'stocks' => Stock::where('date', '=', Carbon::today()->toDateString())->get(),
      'allStocks' => Stock::all()
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
      $order = 1000001;
      $code = 'STCI-' . $userid . $tanggal . $order;
    } else {
      $pull = Stock::all()->last();
      $order = (int)substr($pull->stock_code, -7) + 1;
      $code = 'STCI-' . $userid . $tanggal . $order;
    }

    $today = Carbon::today()->toDateString();
    return view('administrator.stocks.create', compact('code', 'today'), [
      'products' => Product::all()->where('user_id', $userid),
      'users' => User::all(),
      'last' => Stock::all()->last()
    ]);
  }

  public function getDetails($id = 0)
  {
    $data = Product::find($id);
    // $data = Product::where('product_id', $id)->first();
    return response()->json($data);
    // echo json_encode($data);
    // exit;
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
      'quantity' => 'required',
      'value' => 'required'
    ]);

    // $validatedData['user_id'] = auth()->user()->id;

    Stock::create($validatedData);
    return redirect('/administrator/stocks')->with('success', 'Data has been successfully added');
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
    //
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
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Stock  $stock
   * @return \Illuminate\Http\Response
   */
  public function destroy(Stock $stock)
  {
    //
  }
}
