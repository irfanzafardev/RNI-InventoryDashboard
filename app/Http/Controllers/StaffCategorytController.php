<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffCategorytController extends Controller
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
    $groupId = Auth::user()->company->group->id;
    $dataCategory = Category::all()->where('group_id', $groupId);

    return view('user.categories.category', compact('dataCategory'));
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
