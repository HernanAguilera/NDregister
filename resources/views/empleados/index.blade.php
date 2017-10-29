@extends('layout')

@section('content')
  <div class="">
    <div class="text-right">
      <div style="margin-bottom: .5em">
        <a href="{{ route ('empleados.create')}}" class="btn btn-sm btn-success">
          <i class="fa fa-plus" aria-hidden="true"></i>
          Agregar nuevo
        </a>
      </div>
    </div>
    @if ($empleados)
      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Correo electronico</th>
            <th>Fecha de nacimiento</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($empleados as $empleado)
            <tr>
              <td><a href="{{ route('empleados.show', $empleado->id) }}">{{$empleado->name}}</a></td>
              <td>{{$empleado->email}}</td>
              <td>{{$empleado->birthdate}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
