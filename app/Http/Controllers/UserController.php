<?php

namespace App\Http\Controllers;

use App\Models\AntecedentesSalud;
use App\Models\Beneficiados;
use App\Models\Direccion;
use App\Models\Discapacitado;
use App\Models\Propiedad;
use App\Models\SituacionEconomica;
use App\Models\TipoVivienda;
use App\Models\EstadoCivil;
use App\Models\Product;
use App\Models\Team;
use App\Models\TipoSangre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login() {
        return Inertia::render('Dashboard/User/Login');
    }

    public function register() {
        return Inertia::render('Dashboard/User/Register', [
            'estadoCivil' => EstadoCivil::all(),
            'situacionEconomica' => SituacionEconomica::all(),
            'propiedad' => Propiedad::all(),
            'tipoVivienda' => TipoVivienda::all(),
            'tipo_sangre' => TipoSangre::all()
        ]);
    }

    public function registerStore(Request $request) {
        Validator::make($request->all(), [
            'nombres' => 'required|string|min:6|max:50',
            'apellidos' => 'required|string|min:6|max:50',
            'tipoCedula' => 'required',
            'cedula' => 'required|max:8|min:8|unique:beneficiados',
            'fechaNacimiento' => 'required',
            'nacionalidad' => 'required|min:6',
            'sexo' => 'required',
            'estadoCivil' => 'required',
            'familia' => 'required|numeric',
            'hijos' => 'required|numeric',
            'profesion' => 'required|min:6|string',
            'tipoVivienda' => 'required',
            'situacionEconomica' => 'required',
            'tipo_sangre' => 'required',
            'cond_especiales' => 'required|string',
            'antecedentes' => 'required|string',
            'isDiscapacitado' => 'required',
            'phone' => 'required|min:11|max:11|string',
            'descripcionIsDiscapacitado' => 'nullable|string',
            'avenida' => 'required|min:3|string',
            'sector' => 'required|min:3|string',
            'estado' => 'required|min:3|string',
            'municipio' => 'required|min:3|string',
            'parroquia' => 'required|min:3|string',
            'ciudad' => 'required|min:3|string',
            'zonaPostal' => 'required',
            'referencia' => 'required|min:3',
            'username' => 'required|max:20|min:6',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required'
        ])->validate();

        $fullName = (strtolower($request->input('nombres')) . " " .
                     strtolower($request->input('apellidos')));

        $user = User::create([
            'name' => $fullName,
            'username' => strtolower($request->input('username')),
            'email' => strtolower($request->input('email')),
            'password' => Hash::make($request->input('password')),
            'team_id' => 0,
            'privileges' => 'user'
        ]);

        $direccion = Direccion::create([
            'avenida' => strtolower($request->input('avenida')),
            'sector' => strtolower($request->input('sector')),
            'estado' => strtolower($request->input('estado')),
            'municipio' => strtolower($request->input('municipio')),
            'parroquia' => strtolower($request->input('parroquia')),
            'ciudad' => strtolower($request->input('ciudad')),
            'zonaPostal' => strtolower($request->input('zonaPostal')),
            'referencia' => strtolower($request->input('referencia'))
        ]);

        $antecedentesSalud = AntecedentesSalud::create([
            'tipo_sangre' => $request->input('tipo_sangre'),
            'cond_especiales' => strtolower($request->input('cond_especiales')),
            'antecedentes' => strtolower($request->input('antecedentes'))
        ]);

        $discapacitado = Discapacitado::create([
            'si_no' => $request->input('isDiscapacitado'),
            'descripcion' => strtolower($request->input('descripcionIsDiscapacitado'))
        ]);

        Beneficiados::create([
            'nombre' => $fullName,
            'tipoCedula' => $request->input('tipoCedula'),
            'cedula' => $request->input('cedula'),
            'fechaNacimiento' => $request->input('fechaNacimiento'),
            'nacionalidad' => strtolower($request->input('nacionalidad')),
            'sexo' => $request->input('sexo'),
            'phone' => $request->input('phone'),
            'estadoCivil' => strtolower($request->input('estadoCivil')),
            'profesion' => strtolower($request->input('profesion')),
            'ocupacion' => strtolower($request->input('ocupacion')),
            'cantidadFamilia' => $request->input('familia'),
            'cantidadHijos' => $request->input('hijos'),
            'tipoVivienda' => $request->input('tipoVivienda'),
            'propiedad' => $request->input('propiedad'),
            'direccion' => $direccion->id,
            'situacion_economica' => $request->input('situacionEconomica'),
            'antecedentes_salud' => $antecedentesSalud->id,
            'discapacitado' =>  $discapacitado->id,
            'user_id' => $user->id
        ]);

        return redirect('/');

        dd($request);
    }

    public function indexCensus() {
        return Inertia::render('Dashboard/User/CensusManager/Index', [
            'userData' => Auth::user()
        ]);
    }
    public function createCensus() {
        return Inertia::render('Dashboard/User/CensusManager/Create', [
            'products' => Product::all(),
            'userData' => Auth::user()
        ]);
    }

    public function storeCensus(Request $request)
    {
        Validator::make($request->all(), [
            'descripcion' => 'required',
            'products' => 'required',
            'recipe' => 'required',
        ])->validate();

        $file = $request->file('recipe');
            $destinationPath = 'file_storage/';
            $originalFile = $file->getClientOriginalName();
            $filename=strtotime(date('Y-m-d-H:isa')).$originalFile;
            $file->move($destinationPath, $filename);

            // Beneficiados::create([
            //     'descripcion' => strtolower($request->input('descripcion')),
            //     'recipe' => $filename,
            //     'institucion' => 1
            // ]);

            foreach ($request->input('products') as $arr) {
                //
            }
            
    }
}
