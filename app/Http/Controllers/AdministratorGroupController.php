<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class AdministratorGroupController extends Controller
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
    return view('administrator.groups.group', [
      'groups' => Group::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('administrator.groups.create', [
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
      'group_name' => 'required',
    ]);

    Group::create($validatedData);
    return redirect('/administrator/classes')->with('success', 'Data has been successfully added');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Group  $group
   * @return \Illuminate\Http\Response
   */
  public function show(Group $group)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Group  $group
   * @return \Illuminate\Http\Response
   */
  public function edit(Group $group)
  {
    return view('administrator.groups.edit', [
      'group' => $group,
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Group  $group
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Group $group)
  {
    $validatedData = $request->validate([
      'group_name' => 'required',
    ]);

    Group::where('id', $group->id)
      ->update($validatedData);

    return redirect('/administrator/classes')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Group  $group
   * @return \Illuminate\Http\Response
   */
  public function destroy(Group $group)
  {
    //
  }


  public function deleteclass($id)
  {
    $dataCompany = Group::find($id);
    $dataCompany->delete();
    return redirect('/administrator/classes')->with('success', 'Data has been successfully deleted');
  }
}
