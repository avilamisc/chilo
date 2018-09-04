@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Roles</h4>
          </div>
          <div class="col">
            <div class="float-right">
              @can ('roles.create')
              {!! Form::open(['route' => ['roles.create'],
                'method' => 'GET']) !!}
                <button type="submit" class="btn btn-success">
                  <span class="fas fa-plus-square"></span>
                  Nuevo
                </button>
              {!! Form::close() !!}
              @endcan
            </div>
          </div>
        </div>
      </header>
      <div class="card-body text-center">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              @can ('roles.edit')
              <th scope="col">Editar</th>
              @endcan
              @can ('roles.destroy')
              <th scope="col">Eliminar</th>
              @endcan
            </tr>
          </thead>
          @foreach ($roles as $role)
            <tr>
              <td>{{ $role->name }}</td>
              <td>{{ $role->description }}</td>
              @can ('roles.edit')
                <td class="text-center">
                  {!! Form::open(['route' => ['roles.edit',$role->id],
                    'method' => 'GET']) !!}
                    <button type="submit" class="btn btn-primary">
                      <span id="sEdit" class="fas fa-edit"></span>
                    </button>
                  {!! Form::close() !!}
                </td>
              @endcan
              @can ('roles.destroy')
                <td class="text-center">
                  {!! Form::open(['route' => ['roles.destroy',$role->id],
                    'method' => 'DELETE',
                    'onsubmit' => 'return confirm("¿Estás seguro de eliminar este rol?")'])
                  !!}
                  <button type="submit" class="btn btn-danger">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  {!! Form::close() !!}
                </td>
              @endcan
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="actions text-center">
      {{ $roles->links()}}
    </div>
  </div>
  @include('roles.pw')
@endsection
