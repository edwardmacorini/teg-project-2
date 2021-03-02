<?php

namespace App\Http\Controllers;

use App\Models\Team;
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
      'teams' => Team::all()
    ]);
  }

  public function createOrg()
  {
    return Inertia::render('Dashboard/SAdmin/TeamsManager/Create', [
      'userData' => Auth::user(),
      'teams' => Team::all()
    ]);
  }

  public function storeOrg(Array $input)
  {
    Validator::make($input, [
      'name' => ['required', 'max:255'],
      'userFulName' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255', 'unique:users'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => $this->passwordRules(),
      'team_id' => ['nullable', 'numeric'],
      'privileges' => ['required'],
      'type' => ['boolean', 'required'],
      'rif' => ['required', 'max:20'],
      'address' => ['required', 'min:10'],
      'number1' => ['required', 'numeric', 'max:20'],
      'mail1' => ['required', 'string', 'max:255', 'unique:teams'],
      'license' => ['required'],


    ])->validate();

    $org = new Team();
  }

  public function updateOrg(Request $request, $id)
  {
    $org = Team::findOrFail($id);
  }

  public function deleteOrgs($id)
  {
    $org = Team::findOrFail($id);
    $org->delete();
    return Inertia::render('Dashboard/SAdmin/TeamsManager/Index');
  }
}
