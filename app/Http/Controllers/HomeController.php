<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class HomeController extends Controller
{
    private $privileges = array(
        'sadmin' => 'sadmin',
        'oadmin' => 'oadmin',
        'admin' => 'admin',
        'user' => 'user',
    );

    public function index() {
        if(Auth::check()) {
            if(Auth::user()->privileges == $this->privileges['sadmin'])
            return Inertia::render('Dashboard/SAdmin/TeamsManager/Index', [
                'userData' => Auth::user()
            ]);

            else return Inertia::render('Forbiden');
        }
    }
}
