<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Group;
use Illuminate\Http\Request;

class AdministratorCompanyController extends Controller
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
    return view('administrator.companies.company', [
      'companies' => Company::where('active', true)
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
    return view('administrator.companies.create', [
      'companies' => Company::all(),
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
      'company_name' => 'required',
      'group_id' => 'required',
    ]);

    Company::create($validatedData);
    return redirect('/administrator/companies')->with('success', 'Data has been successfully added');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function show(Company $company)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function edit(Company $company)
  {
    return view('administrator.companies.edit', [
      'company' => $company,
      'groups' => Group::all(),
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Company $company)
  {
    $validatedData = $request->validate([
      'company_name' => 'required',
      'group_id' => 'required',
    ]);

    Company::where('id', $company->id)
      ->update($validatedData);

    return redirect('/administrator/companies')->with('success', 'Data has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Company  $company
   * @return \Illuminate\Http\Response
   */
  public function destroy(Company $company)
  {
    //
  }

  public function deletecompany($id)
  {
    $dataCompany = Company::find($id);
    $dataCompany->delete();
    return redirect('/administrator/companies')->with('success', 'Data has been successfully deleted');
  }

  public function removeCompany($id)
  {
    $companyId = Company::find($id);
    // dd($companyId);

    if ($companyId) {
      $companyId->active = false;
      $companyId->save();
    }
    return redirect('/administrator/companies')->with('success', 'Data has been successfully removed');
  }
}
