@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Usuarios</h4>
          </div>
        </div>
      </header>
      <div class="card-body text-center">
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Nombre</th>
              <th scope="col">Correo</th>
              @can ('usuarios.edit')
              <th scope="col">Editar</th>
              @endcan
              @can ('usuarios.destroy')
              <th scope="col">Eliminar</th>
              @endcan
            </tr>
          </thead>
          @foreach ($users as $user)
            <tr>
              <td>{{ $user->name }}</td>
              <td>{{ $user->email }}</td>
              @can ('usuarios.edit')
                <td class="text-center">
                  {!! Form::open(['route' => ['usuarios.edit',$user->id],
                    'method' => 'GET']) !!}
                    <button type="submit" class="btn btn-primary">
                      <span id="sEdit" class="fas fa-edit"></span>
                    </button>
                  {!! Form::close() !!}
                </td>
              @endcan
              @can ('usuarios.destroy')
                <td class="text-center">
                  {!! Form::open(['route' => ['usuarios.destroy',$user->id],
                    'method' => 'DELETE',
                    'onsubmit' => 'return confirm("¿Estás seguro de eliminar este usuario?")'])
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
      {{ $users->links()}}
    </div>
  </div>
  @include('users.pw')
@endsection
