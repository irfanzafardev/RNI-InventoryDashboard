<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class AdministratorUserController extends Controller
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
    return view('administrator.users.user', compact('now', 'today'), [
      'users' => User::with('ModelRole', 'ModelRole.Role')
        ->where('active', true)
        ->get()
      // 'users' => User::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('administrator.users.create', [
      'users' => User::all(),
      'companies' => Company::all()
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
      'name' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255'],
      'company_id' => ['required', 'max:255'],
      'phone' => ['required', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:4', 'confirmed'],
      'role' => ['required', 'max:255'],
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);

    User::create($validatedData);
    return redirect('/administrator/users')->with('success', 'Data has been successfully added');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function show(User $user)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function edit(User $user)
  {
    return view('administrator.users.edit', [
      'user' => $user,
      'companies' => Company::all()
        ->where('active', true)
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, User $user)
  {
    $validatedData = $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255'],
      'company_id' => ['required', 'max:255'],
      'phone' => ['required', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
      'role' => ['required', 'max:255'],
    ]);

    User::where('id', $user->id)
      ->update($validatedData);

    return redirect('/administrator/users')->with('success', 'Account has been successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Http\Response
   */
  public function destroy(User $user)
  {
    //
  }

  public function deleteuser($id)
  {
    $dataUser = User::find($id);
    $dataUser->delete();
    return redirect('/administrator/users')->with('success', 'Data has been successfully deleted');
  }

  public function removeuser($id)
  {
    $userId = User::find($id);
    // dd($userId);

    if ($userId) {
      $userId->active = false;
      $userId->save();
    }
    return redirect('/administrator/users')->with('success', 'Account has been successfully removed');
  }
}
