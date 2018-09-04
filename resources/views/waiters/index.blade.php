@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Meseros</h4>
          </div>
          <div class="col">
            <div class="float-right">
              {!! Form::open(['route' => ['meseros.create'],
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
              <th scope="col"># Empleado</th>
              <th scope="col">Nombre</th>
              <th scope="col"># Mesa</th>
              <th scope="col">Activo</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          @foreach ($waiters as $waiter)
            <tr>
              <td>{{ $waiter->employee_number }}</td>
              <td>
                @foreach ($waiter->getUsers() as $key => $value)
                @if ($key == $waiter->user_id)
                  {!! $value !!}
                @endif
              @endforeach
            </td>
              <td>{{ $waiter->table_number }}</td>
              <td>
                @switch($waiter->status)
                  @case(1)
                    <span>Si</span>
                  @break
                  @case(0)
                    <span>No</span>
                  @break
                  @default
                    <span>{!! $waiter->status !!}</span>
                @endswitch
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['meseros.edit',$waiter->id],
                  'method' => 'GET']) !!}
                  <button type="submit" class="btn btn-primary">
                    <span id="sEdit" class="fas fa-edit"></span>
                  </button>
                {!! Form::close() !!}
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['meseros.destroy',$waiter->id],
                  'method' => 'DELETE',
                  'onsubmit' => 'return confirm("¿Estás seguro de eliminar este mesero?")'])
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
      {{ $waiters->links()}}
    </div>
  </div>
  @include('waiters.pw')
@endsection
