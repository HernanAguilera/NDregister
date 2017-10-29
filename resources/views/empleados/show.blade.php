@extends('layout')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">{{$empleado->name}} <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-secondary">Regresar al listado</a></h4>
      <p class="card-text"><strong>Fecha de nacimiento</strong>: {{$empleado->birthdate}}</p>
      @if (count($empleado->domicilios)>1)
        <strong>Domicilios</strong>:
        <ul>
        @foreach ($empleado->domicilios as $domicilio)
          <li><i>{{$domicilio->alias}}</i> - {{$domicilio->description}}</li>
        @endforeach
        </ul>
      @else
        <strong>Domicilio</strong>:
        {{$empleado->domicilios[0]->alias}} - {{$empleado->domicilios[0]->description}}
      @endif
    </div>
  </div>
@endsection
