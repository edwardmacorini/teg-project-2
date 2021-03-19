<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login()
    {
        return Inertia::render('Dashboard/Admin/Login');
    }


    public function censusIndex()
    {
        return Inertia::render('Dashboard/Admin/Census/Index', [
            'userData' => Auth::user(),
            'teamData' => Team::find(Auth::user()->team_id)
        ]);
    }

    public function productsIndex()
    {
        return Inertia::render('Dashboard/Admin/Product/Index', [
            'userData' => Auth::user(),
            'teamData' => Team::find(Auth::user()->team_id),
            'products' => Product::all()
        ]);
    }

    public function productsCreate()
    {
        return Inertia::render('Dashboard/Admin/Product/Create', [
            'userData' => Auth::user(),
            'teamData' => Team::find(Auth::user()->team_id),
            'products' => Product::where('team_id', Auth::user()->team_id)->get()
        ]);
    }

    public function productsStore(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'unit' => 'required',
            'descricion' => 'nullable|string|max:50',
        ])->validate();

        Product::create([
            'name' => strtolower($request->input('name')),
            'unit' => strtolower($request->input('unit')),
            'descripcion' => strtolower($request->input('descripcion')),
            'team_id' => Auth::user()->team_id
        ]);

        return redirect('/admin/products/index');
    }
}
