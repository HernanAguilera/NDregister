@extends('layout')

@section('content')
  <h2>Nuevo empleado</h2>
  @if ($errors->any())
    <div class="alert alert-danger" role="alert">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
    </div>
  @endif
  {!! Form::open(['method' => 'POST', 'route' => 'empleados.store']) !!}
    {{ csrf_field() }}
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Información básica</h4>
            <div class="form-group">
               {!! Form::label('name', 'Nombre:') !!}
               {!! Form::text('name', NULL, ['class' => 'form-control form-control-sm']) !!}
            </div>
            <div class="form-group">
               {!! Form::label('email', 'Correo electrónico:') !!}
               {!! Form::text('email', NULL, ['class' => 'form-control form-control-sm email']) !!}
             </div>
             <div class="form-group">
                 {!! Form::label('birthdate', 'Fecha de nacimiento:') !!}
                 {!! Form::text('birthdate', NULL, ['class' => 'form-control form-control-sm date']) !!}
            </div>
          </div>
        </div>
        <div style="margin-top:1em;">
          <a href="{{route('empleados.index')}}" class="btn btn-sm btn-secondary">
              <i class="fa fa-list" aria-hidden="true"></i>
              Ir al listado
          </a>
          <button type="submit" class="btn btn-sm btn-primary">
            <i class="fa fa-floppy-o" aria-hidden="true"></i>
              Guardar
          </button>
        </div>
      </div>
      <div class="col-md-8">
        <div id="domicilios">
          <h4>Domicilio</h4>
            <div class="card" style="margin-bottom:1em;">
              <div class="card-body">
                <div class="form-group">
                    {!! Form::label('domicilios[0][alias]', 'Alias:') !!}
                    {!! Form::text('domicilios[0][alias]', NULL, ['class' => 'form-control form-control-sm date']) !!}
                 </div>
                 <div class="form-group">
                     {!! Form::label('domicilios[0][description]', 'Descripción:') !!}
                     {!! Form::text('domicilios[0][description]', NULL, ['class' => 'form-control form-control-sm date']) !!}
                 </div>
              </div>
            </div>
        </div>
        <div class="">
          <button type="button" id="addDomicilio" class="btn btn-sm btn-light">
            <i class="fa fa-plus" aria-hidden="true"></i>
            Agregar otra dirección
          </button>
        </div>
      </div>
    </div>

   {!! Form::close() !!}
@endsection

@section('javascript')
  <script type="text/javascript">
    var cont = 1;
    var formulario =
                     '<div class="card" style="margin-bottom:1em;">' +
                     '<div class="card-body">' +
                     '<div class="form-group">' +
                     '<label for="domicilios[__index__][alias]">Alias:</label>' +
                     '<input class="form-control form-control-sm date" name="domicilios[__index__][alias]" type="text" id="domicilios[__index__][alias]">' +
                     '</div>' +
                     '<div class="form-group">' +
                     '<label for="domicilios[__index__][description]">Descripci&oacute;n:</label>' +
                     '<input class="form-control form-control-sm date" name="domicilios[__index__][description]" type="text" id="domicilios[__index__][description]">' +
                     '</div>'
                     '</div>'
                     '</div>'
                     ;

    $('#addDomicilio').on('click', function(){
      $('#domicilios').append(replaceAll(formulario, '__index__', cont++));
    })

    function replaceAll(str, search, replacement) {
      return str.split(search).join(replacement);
    }
  </script>
@endsection
