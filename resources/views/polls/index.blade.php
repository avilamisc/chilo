@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Encuestas</h4>
          </div>
          <div class="col">
            <div class="float-right">
              {!! Form::open(['route' => ['encuestas.create'],
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
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Tipo</th>
              <th scope="col">Sucursal</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          @foreach ($polls as $poll)
            <tr>
              <td>{{ $poll->id }}</td>
              <td>{{ $poll->name }}</td>
              <td>
                @foreach ($poll->pCategories() as $key => $value)
                  @if ($key == $poll->poll_type)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td>
                @foreach ($poll->getFacilities() as $key => $value)
                  @if ($key == $poll->id_facility)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['encuestas.edit',$poll->id],
                  'method' => 'GET']) !!}
                  <button type="submit" class="btn btn-primary">
                    <span id="sEdit" class="fas fa-edit"></span>
                  </button>
                {!! Form::close() !!}
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['encuestas.destroy',$poll->id],
                  'method' => 'DELETE',
                  'onsubmit' => 'return confirm("¿Estás seguro de eliminar esta encuesta?")'])
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
      {{ $polls->links()}}
    </div>
  </div>
  @include('polls.pw')
@endsection
