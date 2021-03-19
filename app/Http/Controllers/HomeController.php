<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\Team;
use App\Models\User;

class HomeController extends Controller
{
    private $privileges = array(
        'sadmin' => 'sadmin',
        'oadmin' => 'oadmin',
        'admin' => 'admin',
        'user' => 'user',
    );

    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->privileges == $this->privileges['sadmin'])
                return Inertia::render('Dashboard/SAdmin/TeamsManager/Index', [
                    'userData' => Auth::user(),
                    'teams' => Team::all(),
                    'userList' => User::all()
                ]);

            else if (Auth::user()->privileges == $this->privileges['oadmin'] ||
                     Auth::user()->privileges == $this->privileges['admin']) 
            {
                return Inertia::render('Dashboard/Admin/Index', [
                    'userData' => Auth::user(),
                    'teamData' => Team::find(Auth::user()->team_id)
                ]);
            }
            
            else if (Auth::user()->privileges == $this->privileges['user']) 
            {
                return Inertia::render('Dashboard/User/CensusManager/Index', [
                    'userData' => Auth::user()
                ]);
            }

            else return redirect('/');

        } 
        
        else return redirect('/');

    }

    public function ladingpage()
    {
        return Inertia::render('LadingPage');
    }
}
