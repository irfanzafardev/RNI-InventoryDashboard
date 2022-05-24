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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;

class StaffProductController extends Controller
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
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');

    $id = Auth::user()->id;
    $company = Auth::user()->company->company_name;
    $dataproduct = Product::all()
      ->where('company', $company)
      ->where('active', true)
      ->sortByDesc("updated_at");

    return view('user.product.product', compact('now', 'today', 'dataproduct'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $now = Carbon::now()->format('d F Y');
    $today = Carbon::now()->format('D');
    $check = Product::count();
    $userid = Auth::user()->id;
    $companyid = Auth::user()->company->id;
    $company = Auth::user()->company->company_name;
    if ($check == 0) {
      $order = 1001;
      $code = 'PR-' . $userid . $companyid . $order;
    } else {
      $pull = Product::latest('id')
        ->where('company', $company)
        ->first();
      $order = (int)substr($pull->product_code, -4) + 1;
      $code = 'PR-' . $userid . $companyid . $order;
    }
    // dd($pull->product_code);
    $id = Auth::user()->company->group->id;
    return view('user.product.create', compact('code', 'now', 'today'), [
      'users' => User::all(),
      'companies' => Company::all(),
      'groups' => Group::all()
        ->where('active', true),
      'categories' => Category::all()
        ->where('group_id', $id)
        ->where('active', true),
      'subcategories' => Subcategory::where('active', false)
        ->get(),
      'units' => Unit::all()
        ->where('active', true)
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
      'product_code' => 'required',
      'product_name' => 'required',
      'class' => 'required',
      'company' => 'required',
      'user_id' => 'required',
      'subcategory_id' => 'required',
      'category' => 'required',
      'unit_id' => 'required',
      'quantity' => 'required',
      'unit_price' => 'required',
    ]);

    // $validatedData['user_id'] = auth()->user()->id;

    Product::create($validatedData);
    return redirect('/staff/products')->with('success', 'Data has been successfully added');
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
    $group_id = Auth::user()->company->group->id;
    $category_id = $product->subcategory->category->id;
    return view('user.product.edit', [
      'product' => $product,
      'users' => User::all(),
      'companies' => Company::all(),
      'groups' => Group::all(),
      'categories' => Category::all()
        ->where('group_id', $group_id),
      'subcategories' => Subcategory::all()
        ->where('category_id', $category_id),
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
      'company' => 'required',
      'class' => 'required',
      'user_id' => 'required',
      'subcategory_id' => 'required',
      'category' => 'required',
      'unit_id' => 'required',
      'unit_price' => 'required',
    ]);

    Product::where('id', $product->id)
      ->update($validatedData);

    return redirect('/staff/products')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Product  $product
   * @return \Illuminate\Http\Response
   */
  // public function destroy(Product $product)
  // {
  //   //
  // }

  public function deleteproduct($id)
  {
    $productid = Product::find($id);

    if ($productid) {
      $productid->active = false;
      $productid->save();
    }

    return redirect('/staff/products')->with('success', 'Data has been successfully removed');
  }
}
