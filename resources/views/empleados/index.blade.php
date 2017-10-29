@extends('layout')

@section('content')
  <div class="">
    <a href="{{ route ('empleados.create')}}" class="btn btn-sm btn-success">Agregar nuevo</a>
    @if ($empleados)
      <table class="table">
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
