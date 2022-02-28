<?php

namespace App\Http\Controllers;

use App\Models\StockIn;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      'stockins' => StockIn::OrderBy('created_at', 'asc')->get(),
      'last' => StockIn::all()->last()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $check = StockIn::count();
    $userid = Auth::user()->id;
    $now = Carbon::now();
    $tanggal = $now->year . $now->month . $now->day;
    if ($check == 0) {
      $order = 1000001;
      $code = 'STCI-' . $userid . $tanggal . $order;
    } else {
      $pull = StockIn::all()->last();
      $order = (int)substr($pull->transact_code, -6) + 1;
      $code = 'STCI-' . $userid . $tanggal . $order;
    }
    return view('administrator.stocks.stockin.create', compact('code'), [
      'products' => Product::all()->where('user_id', $userid),
      'users' => User::all(),
      'last' => StockIn::all()->last()
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
      'transact_code' => 'required',
      'date' => 'required',
      'product_id' => 'required',
      'quantity' => 'required',
    ]);

    // $validatedData['user_id'] = auth()->user()->id;

    StockIn::create($validatedData);
    return redirect('/administrator/stockin')->with('success', 'Data has been successfully added');
    // return redirect('/administrator/detailstockin/');
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

  public function detail()
  {
    $id = StockIn::all()->last();
    return view('administrator.stocks.stockin.detail', [
      'id' => $id
    ]);
  }

  public function increase($id)
  {
    try {
      $stockin = StockIn::find($id);
      $newqty = $stockin->quantity;
      $productid = $stockin->product_id;
      $productname = $stockin->product_name;

      $pd = Product::find($productid);
      $currentstock = $pd->quantity;
      $updatedstock = $currentstock + $newqty;

      Product::where('id', $productid)->update([
        'quantity' => $updatedstock
      ]);
      return redirect('/administrator/stockin')->with('success', "Data has been successfully updated");
    } catch (\Throwable $th) {
      return back()->withError($th->getMessage())->withInput();
    }
  }

  public function destroy(StockIn $stockIn)
  {
    //
  }

  public function deletestockin($id)
  {
    $datastockin = StockIn::find($id);
    $datastockin->delete();
    return redirect('/administrator/stockin')->with('success', 'Data has been successfully deleted');
    // return redirect('/administrator/detaildeletestockin/');
  }

  public function decrease($id)
  {
    try {
      $stockin = StockIn::find($id);
      $newqty = $stockin->quantity;
      $productid = $stockin->product_id;
      $productname = $stockin->product_name;

      $pd = Product::find($productid);
      $currentstock = $pd->quantity;
      $updatedstock = $currentstock - $newqty;

      Product::where('id', $productid)->update([
        'quantity' => $updatedstock
      ]);
      return redirect('/administrator/stockin')->with('success', "Data has been successfully deleted");
    } catch (\Throwable $th) {
      return back()->withError($th->getMessage())->withInput();
    }
  }
}
