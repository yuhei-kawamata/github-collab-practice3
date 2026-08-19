<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index()
  {
    $users = User::all();
    return view('users.index', ['users' => $users]);
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'requied|email',
      'password' => 'required',
    ]);

    User::create($validated);

    return redirect('/users');
  }
}
