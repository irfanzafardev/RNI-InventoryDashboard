<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\User;
use App\Models\Group;
use App\Models\Company;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;

class AdministratorProductController extends Controller
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
    $id = 2;
    $nama = "GULA - PG RA";
    $subcategory = 7;
    $class = "Agroindustri";
    return view('administrator.products.product', [
      'products' => Product::OrderBy('updated_at', 'desc')->get()
      // 'products' => Product::all()->where('subcategory_id', $subcategory)
      // 'products' => Product::all()->where('subcategory_id', $subcategory)
      // ->join('detail_barang', 'detail_barang.id_barang', '=', 'barang.id_barang')>get();
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // PR-11001
    $check = Product::count();
    $userid = Auth::user()->id;
    $companyid = Auth::user()->company->id;
    if ($check == 0) {
      $order = 1001;
      $code = 'PR-' . $userid . $companyid . $order;
    } else {
      $pull = Product::all()->last();
      $order = (int)substr($pull->product_code, -4) + 1;
      $code = 'PR-' . $userid . $companyid . $order;
    }
    $id = Auth::user()->company->group->id;
    return view('administrator.products.create', compact('code'), [
      'users' => User::all(),
      'companies' => Company::all(),
      'groups' => Group::all(),
      'categories' => Category::all()->where('group_id', $id),
      'subcategories' => Subcategory::all(),
      'units' => Unit::all()
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
      'product_code' => 'required',
      'product_name' => 'required',
      'user_id' => 'required',
      'subcategory_id' => 'required',
      'unit_id' => 'required',
      'quantity' => 'required',
      'unit_price' => 'required',
    ]);

    // $validatedData['user_id'] = auth()->user()->id;

    Product::create($validatedData);
    return redirect('/administrator/products')->with('success', 'Data has been successfully added');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function show(Product $product)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function edit(Product $product)
  {
    $id = Auth::user()->company->group->id;
    return view('administrator.products.edit', [
      'product' => $product,
      'users' => User::all(),
      'companies' => Company::all(),
      'groups' => Group::all(),
      'categories' => Category::all()->where('group_id', $id),
      'subcategories' => Subcategory::all(),
      'units' => Unit::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Product $product)
  {
    $validatedData = $request->validate([
      'product_code' => 'required',
      'product_name' => 'required',
      'user_id' => 'required',
      'subcategory_id' => 'required',
      'unit_id' => 'required',
      'quantity' => 'required',
      'unit_price' => 'required',
    ]);

    Product::where('id', $product->id)
      ->update($validatedData);

    return redirect('/administrator/products')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Product $product)
  // {
  //   Product::destroy($product->id);
  //   return redirect('/administrator/products')->with('success', 'deleted');
  // }

  public function deleteproduct($id)
  {
    $dataproduct = Product::find($id);
    $dataproduct->delete();
    return redirect('/administrator/products')->with('success', 'Data has been successfully deleted');
  }
}
