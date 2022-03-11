<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffSubcategorytController extends Controller
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

    $groupId = Auth::user()->company->group->group_name;
    $dataSubcategory = Subcategory::all()
      ->where('class', $groupId)
      ->where('active', true);

    return view('user.subcategories.subcategory', compact('dataSubcategory'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $groupId = Auth::user()->company->group->id;
    return view('user.subcategories.create', [
      'subcategories' => Subcategory::all()
        ->where('active', true),
      'categories' => Category::all()
        ->where('group_id', $groupId)
        ->where('active', true),
      'groups' => Group::all()
        ->where('id', $groupId)
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
    // return $request;
    $validatedData = $request->validate([
      'subcategory_name' => 'required',
      'class' => 'required',
      'category_id' => 'required',
    ]);

    Subcategory::create($validatedData);
    return redirect('/staff/subcategories')->with('success', 'Data has been successfully added');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function show(Subcategory $subcategory)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function edit(Subcategory $subcategory)
  {
    $groupId = Auth::user()->company->group->id;
    return view('user.subcategories.edit', [
      'subcategory' => $subcategory,
      'categories' => Category::all(),
      'groups' => Group::all()->where('id', $groupId)
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Subcategory $subcategory)
  {
    $validatedData = $request->validate([
      'subcategory_name' => 'required',
      'class' => 'required',
      'category_id' => 'required',
    ]);

    Subcategory::where('id', $subcategory->id)
      ->update($validatedData);

    return redirect('/staff/subcategories')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Subcategory  $subcategory
   * @return \Illuminate\Http\Response
   */
  public function destroy(Subcategory $subcategory)
  {
    //
  }
}
