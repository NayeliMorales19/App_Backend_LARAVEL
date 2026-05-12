<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    //--------------------------- ALTAS -----------------------------------------------

    public function create()
    {
        return view('insertar');
    }

  public function store(Request $request)
{
    Alumno::create([
        'Num_Control' => $request->Num_Control,
        'Nombre' => $request->Nombre,
        'Primer_Ap' => $request->Primer_Ap,
        'Segundo_Ap' => $request->Segundo_Ap,
        'Fecha_Nac' => $request->Fecha_Nac,
        'Semestre' => $request->Semestre,
        'Carrera' => $request->Carrera
    ]);

    return redirect()
        ->route('alumnos.index')
        ->with('message', 'Alumno agregado correctamente');
}

    //-------------------------- BAJAS --------------------------------------------------

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        Session::flash('message', 'ELIMINADO Correctamente!!!');

        return redirect()->route('alumnos.index');
    }

    //--------------------------- CAMBIOS ------------------------------------------------

    public function edit(Alumno $alumno)
    {
        return view('editar', compact('alumno'));
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::find($id);

        $alumno->Num_Control = $request->Num_Control;
        $alumno->Nombre = $request->Nombre;
        $alumno->Primer_Ap = $request->PrimerAp;
        $alumno->Segundo_Ap = $request->SegundoAp;
        $alumno->Fecha_Nac = $request->Fecha_Nac;
        $alumno->Semestre = $request->Semestre;
        $alumno->Carrera = $request->Carrera;

        $alumno->save();

        Session::flash('message', 'MODIFICADO Correctamente!!');

        return redirect()->route('alumnos.index');
    }

    //-------------------------- CONSULTAS ------------------------------------

   public function index(Request $request)
{
    $filtro = $request->input('filtro');

    $alumnos = Alumno::where('Nombre', 'like', "%{$filtro}%")
        ->orWhere('Primer_Ap', 'like', "%{$filtro}%")
        ->orderBy('id', 'desc')
        ->get(); // 👈 CAMBIO CLAVE

    return view('index', compact('alumnos', 'filtro'));
}

    public function show(Alumno $alumno)
    {
        return view('detalle', compact('alumno'));
    }
}
