<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Company;
use App\Models\ModelRole;

class RegisterController extends Controller
{
  public function index()
  {
    return view('register', [
      'companies' => Company::all()
    ]);
  }

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'full_name' => 'required|max:255',
      'company' => 'required',
      'phone' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|max:255',
      'level' => 'required'
    ]);

    // dd('berhasil');

    User::create($validatedData);

    // ModelRole

    // $user->assignRole('staff');

    return redirect('/');
  }
}
