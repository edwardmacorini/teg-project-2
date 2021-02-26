<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SAdminController extends Controller
{

  // Login system
  public function login() {
    return Inertia::render('Dashboard/SAdmin/Login');
  }
  
  public function register() {
    return Inertia::render('Dashboard/SAdmin/Register');
  }

  // Organizations Manager
  public function indexOrgs() {
    return Inertia::render('Dashboard/SAdmin/TeamsManager/Index');
  }

  public function createOrg() {
    return Inertia::render('Dashboard/SAdmin/TeamsManager/Create');
  }

  public function storeOrg(Request $request) {
    $org = new Team();
  }
  
  public function updateOrg(Request $request, $id) {
    $org = Team::findOrFail($id);
  }

  public function deleteOrgs($id) {
    $org = Team::findOrFail($id);
    $org->delete();
    return;
  }

}
