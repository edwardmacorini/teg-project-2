<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login() {
        return Inertia::render('Dashboard/Admin/Login');
    }


    public function censusIndex() {
        return Inertia::render('Dashboard/Admin/Census/Index', [
            'userData' => Auth::user(),
            'teamData' => Team::find(Auth::user()->team_id)
        ]);
    }
}
