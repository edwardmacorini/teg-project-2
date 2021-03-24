<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class OAdminController extends Controller
{
    public function login()
    {
        return Inertia::render('Dashboard/SAdmin/Login');
    }

    public function register()
    {
        return Inertia::render('Dashboard/SAdmin/Register');
    }
}
