<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Group;
use Illuminate\Http\Request;

class AdministratorCategoryController extends Controller
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
    return view('administrator.categories.category', [
      'categories' => Category::all()
        ->where('active', true)
        ->sortByDesc("updated_at")
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('administrator.categories.create', [
      'categories' => Category::all(),
      'groups' => Group::all()
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
      'category_name' => 'required',
      'group_id' => 'required',
    ]);

    Category::create($validatedData);
    return redirect('/administrator/categories')->with('success', 'Data has been successfully added');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function edit(Category $category)
  {
    return view('administrator.categories.edit', [
      'category' => $category,
      'groups' => Group::all()
        ->where('active', true)
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    $validatedData = $request->validate([
      'category_name' => 'required',
      'group_id' => 'required',
    ]);

    Category::where('id', $category->id)
      ->update($validatedData);

    return redirect('/administrator/categories')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    //
  }

  public function deletecategory($id)
  {
    $dataCategory = Category::find($id);
    $dataCategory->delete();
    return redirect('/administrator/categories')->with('success', 'Data has been successfully deleted');
  }

  public function removeCategory($id)
  {
    $categoryId = Category::find($id);
    // dd($categoryId);

    if ($categoryId) {
      $categoryId->active = false;
      $categoryId->save();
    }
    return redirect('/administrator/categories')->with('success', 'Data has been successfully removed');
  }
}
