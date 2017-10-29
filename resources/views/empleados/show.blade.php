@extends('layout')

@section('content')
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">{{$empleado->name}}</h4>
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
  <div style="margin-top:1em;">
    <a href="{{ route('empleados.index') }}" class="btn btn-sm btn-secondary">
      <i class="fa fa-list" aria-hidden="true"></i>
      Ir al listado
    </a>
  </div>
@endsection
