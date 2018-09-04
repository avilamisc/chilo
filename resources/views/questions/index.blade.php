@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card padding">
      <header class="text-center">
        <div class="row">
          <div class="col">
              <h4>Listado de Preguntas</h4>
          </div>
          <div class="col">
            <div class="float-right">
              {!! Form::open(['route' => ['preguntas.create'],
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
              <th scope="col">Descripcion</th>
              <th scope="col">Tipo</th>
              <th scope="col">Categoria</th>
              <th scope="col">Activa</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
          </thead>
          @foreach ($questions as $question)
            <tr>
              <td>{{ $question->id }}</td>
              <td>{{ $question->description }}</td>
              <td>
                @foreach ($question->qcTypes() as $key => $value)
                  @if ($key == $question->control)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td>
                @foreach ($question->pqCategories() as $key => $value)
                  @if ($key == $question->category)
                    {!! $value !!}
                  @endif
                @endforeach
              </td>
              <td>
                @switch($question->status)
                  @case(1)
                    <span>Si</span>
                  @break
                  @case(0)
                    <span>No</span>
                  @break
                  @default
                    <span>{!! $question->status !!}</span>
                @endswitch
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['preguntas.edit',$question->id],
                  'method' => 'GET']) !!}
                  <button type="submit" class="btn btn-primary">
                    <span id="sEdit" class="fas fa-edit"></span>
                  </button>
                {!! Form::close() !!}
              </td>
              <td class="text-center">
                {!! Form::open(['route' => ['preguntas.destroy',$question->id],
                  'method' => 'DELETE',
                  'onsubmit' => 'return confirm("¿Estás seguro de eliminar esta pregunta?")'])
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
      {{ $questions->links()}}
    </div>
  </div>
  @include('questions.pw')
@endsection
