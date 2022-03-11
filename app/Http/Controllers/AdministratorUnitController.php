<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class AdministratorUnitController extends Controller
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
    return view('administrator.units.unit', [
      'units' => Unit::where('active', true)
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
    return view('administrator.units.create', [
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
      'unit_name' => 'required',
      'unit_symbol' => 'required',
    ]);

    Unit::create($validatedData);
    return redirect('/administrator/units')->with('success', 'Data has been successfully added');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Unit  $unit
   * @return \Illuminate\Http\Response
   */
  public function show(Unit $unit)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Unit  $unit
   * @return \Illuminate\Http\Response
   */
  public function edit(Unit $unit)
  {
    return view('administrator.units.edit', [
      'unit' => $unit
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Unit  $unit
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Unit $unit)
  {
    $validatedData = $request->validate([
      'unit_name' => 'required',
      'unit_symbol' => 'required',
    ]);

    Unit::where('id', $unit->id)
      ->update($validatedData);

    return redirect('/administrator/units')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Unit  $unit
   * @return \Illuminate\Http\Response
   */
  public function destroy(Unit $unit)
  {
    //
  }

  public function deleteunit($id)
  {
    $dataUnit = Unit::find($id);
    $dataUnit->delete();
    return redirect('/administrator/units')->with('success', 'Data has been successfully deleted');
  }

  public function removeUnit($id)
  {
    $unitId = Unit::find($id);
    // dd($unitId);

    if ($unitId) {
      $unitId->active = false;
      $unitId->save();
    }
    return redirect('/administrator/units')->with('success', 'Data has been successfully removed');
  }
}
