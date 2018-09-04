@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Mesas</h4>
          </div>
          <div class="col">
            <div class="float-right">
              {!! Form::open(['route' => ['mesas.create'],
                'method' => 'GET']) !!}
                <button type="submit" class="btn btn-success">
                  <span class="fas fa-plus-square"></span>
                  Nueva
                </button>
              {!! Form::close() !!}              
            </div>
          </div>
        </div>
      </header>
      <div class="card-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col"># Mesa</th>
              <th scope="col">Capacidad</th>
              <th scope="col">Ubicacion</th>
              <th scope="col">Sucursal</th>
              <th scope="col">Activa</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          @foreach ($tables as $table)
            <tr>
              <td>{{ $table->table_number }}</td>
              <td>{{ $table->capacity }}</td>
              <td>{{ $table->location }}</td>
              <td>
                @foreach ($table->getFacilities() as $key => $value)
                  @if ($key == $table->id_facility)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td>
                @switch($table->status)
                  @case(1)
                    <span>Si</span>
                  @break
                  @case(0)
                    <span>No</span>
                  @break
                  @default
                    <span>{!! $table->status !!}</span>
                @endswitch
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['mesas.edit',$table->id],
                  'method' => 'GET']) !!}
                  <button type="submit" class="btn btn-primary">
                    <span id="sEdit" class="fas fa-edit"></span>
                  </button>
                {!! Form::close() !!}
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['mesas.destroy',$table->id],
                  'method' => 'DELETE',
                  'onsubmit' => 'return confirm("¿Estás seguro de eliminar esta mesa?")'])
                !!}
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                {!! Form::close() !!}
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="actions text-center">
      {{ $tables->links()}}
    </div>
  </div>
  @include('tables.pw')
@endsection
