<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SAdminController extends Controller
{

  // Login system
  public function login()
  {
    return Inertia::render('Dashboard/SAdmin/Login');
  }

  public function register()
  {
    return Inertia::render('Dashboard/SAdmin/Register');
  }

  // Organizations Manager
  public function indexOrgs()
  {
    return Inertia::render('Dashboard/SAdmin/TeamsManager/Index', [
      'userData' => Auth::user(),
      'teams' => Team::all(),
      'userList' => User::all()
    ]);
  }

  public function createOrg()
  {
    return Inertia::render('Dashboard/SAdmin/TeamsManager/Create', [
      'userData' => Auth::user(),
      'teams' => Team::all()
    ]);
  }

  public function storeOrg(Request $request)
  {
    
    Validator::make($request->all(), [
      'name' => 'required|string|max:50',
      'rif' => 'required|numeric|min:9|unique:teams',
      'address' => 'required',
      'number' => 'required|max:11|min:11',
      'mail' => 'required|email|unique:teams',
      'licence' => 'required|max:50',
      'type' => 'required',
      'userFullName' => 'required|string|max:50',
      'username' => 'required|max:20|min:6',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|confirmed',
      ])->validate();

      $aux = $request->input('type') == 'success' ? true : false;

      $team = Team::create([
        'name' => strtolower($request->input('name')),
        'rif' => $request->input('rif'),
        'address' => strtolower($request->input('address')),
        'number' => $request->input('number'),
        'mail' => strtolower($request->input('mail')),
        'license' => strtolower($request->input('license')),
        'type' => $aux
      ]);

      User::create([
        'name' => strtolower($request->input('userFullName')),
        'username' => strtolower($request->input('username')),
        'email' => strtolower($request->input('email')),
        'password' => Hash::make($request->input('password')),
        'team_id' => $team->id,
        'privileges' => $request->input('privileges')
      ]);

      return redirect('sadmin-index');

  }

  public function updateOrg(Request $request, $id)
  {
    $org = Team::findOrFail($id);
  }

  public function deleteOrgs($id)
  {
    $org = Team::findOrFail($id);
    $org->delete();
  }
}
