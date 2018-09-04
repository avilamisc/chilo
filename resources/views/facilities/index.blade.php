@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Sucursales</h4>
          </div>
          <div class="col">
            <div class="float-right">
              {!! Form::open(['route' => ['sucursales.create'],
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
      <div class="card-body text-center">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Tipo</th>
              <th scope="col">Activa</th>
              <th scope="col">Direccion</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          @foreach ($facilities as $facility)
            <tr>
              <td>{{ $facility->id }}</td>
              <td>{{ $facility->name }}</td>
              <td>
                @foreach ($facility->fTypes() as $key => $value)
                  @if ($key == $facility->type)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td>
                @switch($facility->status)
                  @case(1)
                    <span>Si</span>
                  @break
                  @case(0)
                    <span>No</span>
                  @break
                  @default
                    <span>{!! $facility->status !!}</span>
                @endswitch
              </td>
              <td>{{ $facility->address }}</td>
              <td class="text-center">
                {!! Form::open(['route' => ['sucursales.edit',$facility->id],
                  'method' => 'GET']) !!}
                  <button type="submit" class="btn btn-primary">
                    <span id="sEdit" class="fas fa-edit"></span>
                  </button>
                {!! Form::close() !!}
              </td>
              <!--  -->
              <td class="text-center">
                  {!! Form::open(['route' => ['sucursales.destroy',$facility->id],
                    'method' => 'DELETE',
                    'onsubmit' => 'return confirm("¿Estás seguro de eliminar esta sucursal?")'])
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
      {{ $facilities->links() }}
    </div>
  </div>
  @include('facilities.pw')
@endsection
