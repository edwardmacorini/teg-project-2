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

  public function storeOrg(Request $request)
  {
    
    Validator::make($request->all(), [
      'name' => 'required|string|max:255',
      'rif' => 'required|numeric|max:9|min:9|unique:teams',
      'address' => 'required',
      'number1' => 'required|max:16|min:11',
      'mail1' => 'required|email|unique:teams',
      'licence' => 'required|max:255',
      'type' => 'required',
      'userFullName' => 'required|string|max:255',
      'username' => 'required|max:16|min:6',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6|confirmed',
      ])->validate();

      $team = Team::create([
        'name' => strtolower($request->input('name')),
      ]);

      dd($request);

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
