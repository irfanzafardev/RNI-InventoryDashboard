<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;

class AdministratorSubcategoryController extends Controller
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
    return view('administrator.subcategories.subcategory', [
      'subcategories' => Subcategory::where('active', true)
        ->orderBy('updated_at', 'desc')
        ->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('administrator.subcategories.create', [
      'subcategories' => Subcategory::all(),
      'categories' => Category::all(),
      'groups' => Group::all()
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
    return redirect('/administrator/subcategories')->with('success', 'Data has been successfully added');
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
    return view('administrator.subcategories.edit', [
      'subcategory' => $subcategory,
      'categories' => Category::all(),
      'groups' => Group::all()
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

    return redirect('/administrator/subcategories')->with('success', 'Data has been successfully updated');
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

  public function deletesubcategory($id)
  {
    $datastock = Subcategory::find($id);
    $datastock->delete();
    return redirect('/administrator/subcategories')->with('success', 'Data has been successfully deleted');
  }

  public function removeSubcategory($id)
  {
    $subcategoryId = Subcategory::find($id);
    // dd($subcategoryId);

    if ($subcategoryId) {
      $subcategoryId->active = false;
      $subcategoryId->save();
    }
    return redirect('/administrator/subcategories')->with('success', 'Data has been successfully removed');
  }
}
