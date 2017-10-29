<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpleadoRequest as Request;
use App\Empleado;

class EmpleadoController extends Controller
{
  protected $empleado;

  public function __construct(Empleado $empleado){
    $this->empleado = $empleado;
  }

  public function index(){
    $empleados = $this->empleado->all();
    return view('empleados.index', compact('empleados'));
  }

  public function create(){
    return view('empleados.create');
  }

  public function store(Request $request){
    $input = $request->input();

    $domicilios = $input['domicilios'];
    unset($input['domicilios']);

    $empleado = $this->empleado->create($input);
    $empleado->domicilios()->createMany($domicilios);

    return redirect()->route('empleados.index')
                     ->with('info', 'El empleado fue creado!');
  }

  public function show($id){
    $empleado = $this->empleado->findOrFail($id);
    return view('empleados.show', compact('empleado'));
  }

}
