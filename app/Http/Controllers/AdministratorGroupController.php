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
      'groups' => Group::where('active', true)
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

  public function sunting($id)
  {
    $group = Group::find($id);
    // dd($data);
    return view('administrator.groups.edit', compact('group'));
  }

  public function perbarui(Request $request, $id)
  {
    $group = Group::find($id);
    $group->update($request->all());
    return redirect('/administrator/classes')->with('success', 'Data has been successfully updated');
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

  public function removeGroup($id)
  {
    $groupId = Group::find($id);
    // dd($groupId);

    if ($groupId) {
      $groupId->active = false;
      $groupId->save();
    }
    return redirect('/administrator/classes')->with('success', 'Data has been successfully removed');
  }
}
