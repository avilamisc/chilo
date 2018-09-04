@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Promociónes / Descuentos</h4>
          </div>
          <div class="col">
            <div class="float-right">
              {!! Form::open(['route' => ['exclusivos.create'],
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
              <th scope="col">Tipo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Inicio</th>
              <th scope="col">Fin</th>
              <th scope="col">Valor</th>
              <th scope="col">Tipo Valor</th>
              <th scope="col">Disponibilidad</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          @foreach ($exclusives as $exclusive)
            <tr>
              <td>{{ $exclusive->id }}</td>
              <td>
                @foreach ($exclusive->exTypes() as $key => $value)
                  @if ($key == $exclusive->category)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td>{{ $exclusive->name }}</td>
              <td>{{ $exclusive->description }}</td>
              <td>{{ \Carbon\Carbon::parse($exclusive->start)->format('Y-m-d') }}</td>
              <td>{{ \Carbon\Carbon::parse($exclusive->end)->format('Y-m-d') }}</td>
              <td>{{ $exclusive->amount }}</td>
              <td>
                @foreach ($exclusive->exaTypes() as $key => $value)
                  @if ($key == $exclusive->amount_type)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td>{{ $exclusive->availability }}</td>
              <td class="text-center">
                {!! Form::open(['route' => ['exclusivos.edit',$exclusive->id],
                  'method' => 'GET']) !!}
                  <button type="submit" class="btn btn-primary">
                    <span id="sEdit" class="fas fa-edit"></span>
                  </button>
                {!! Form::close() !!}                
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['exclusivos.destroy',$exclusive->id],
                  'method' => 'DELETE',
                  'onsubmit' => 'return confirm("¿Estás seguro de eliminar este registro?")'])
                !!}
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                  </button>
                {!! Form::close() !!}
                </a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
    </div>
    <div class="actions text-center">
      {{ $exclusives->links() }}
    </div>
  </div>
  @include('exclusives.pw')
@endsection
