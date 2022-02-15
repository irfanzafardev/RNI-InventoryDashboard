<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Company;
use App\Models\Group;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Unit;
use Illuminate\Http\Request;

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
    return view('administrator.products.product', [
      'products' => Product::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('administrator.products.create', [
      'users' => User::all(),
      'companies' => Company::all(),
      'groups' => Group::all(),
      'categories' => Category::all(),
      'subcategories' => Subcategory::all(),
      'units' => Unit::all(),
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
      // 'company' => 'required',
      'user_id' => 'required',
      // 'group_name' => 'required',
      // 'category_name' => 'required',
      // 'subcategory_name' => 'required',
      'subcategory_id' => 'required',
      // 'unit_name' => 'required',
      'unit_id' => 'required',
      'quantity' => 'required',
      'unit_price' => 'required',
    ]);

    // $validatedData['user_id'] = auth()->user()->id;

    Product::create($validatedData);
    return redirect('/administrator/products')->with('success', 'p');
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
    return view('administrator.products.edit', [
      'product' => $product,
      'users' => User::all(),
      'groups' => Group::all(),
      'categories' => Category::all(),
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
      // 'company' => 'required',
      'user_id' => 'required',
      // 'group_name' => 'required',
      // 'category_name' => 'required',
      // 'subcategory_name' => 'required',
      'subcategory_id' => 'required',
      // 'unit_name' => 'required',
      'unit_id' => 'required',
      'quantity' => 'required',
      'unit_price' => 'required',
    ]);

    Product::where('id', $product->id)
      ->update($validatedData);

    return redirect('/administrator/products')->with('success', 'updated');
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
    return redirect('/administrator/products')->with('success', 'delete');
  }
}
