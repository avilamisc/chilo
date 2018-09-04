<div class="row">
  <div class="col">
    <div class="text-center">
      {!! Form::label('subtitle', 'Por favor, responda a continuación:') !!}
    </div>
  </div>
</div>

{!! Form::open(['route' => 'encuesta.store','method' => 'POST', 'class' => 'app-form']) !!}
@foreach ($survey->getQuestions() as $question)
  <div class="form-row">
    <div class="col">
        {!! Form::label('description', $question->description) !!}
        @if($question->control == 1)
          @include('surveys.controls.open')
        @elseif ($question->control == 2)
          @include('surveys.controls.emoticons')
        @elseif ($question->control == 3)
          @include('surveys.controls.rating')
        @elseif ($question->control == 4)
          @include('surveys.controls.radiobutton')
        @else
          @include('surveys.controls.open')
        @endif
    </div>
  </div>
@endforeach
<div class="row">
  <div class="col">
    {!! Form::label('customername', 'Nombre') !!}
    {!! Form::text('customername', '',['class' => 'form-control', 'placeholder' => 'Primer Nombre'] ) !!}
  </div>
  <div class="col">
    {!! Form::label('customeremail', 'Correo Electronico') !!}
    {!! Form::text('customeremail', '',['class' => 'form-control', 'placeholder' => 'correo@correo.com'] ) !!}
  </div>
  <div class="col">
    {!! Form::label('birthdate', 'Fecha Cumpleaños') !!}
    {!! Form::date('birthdate', \Carbon\Carbon::now()) !!}
  </div>
</div>
<div class="float-right">
    <input type="submit" value="Enviar" class="btn btn-success">
</div>
{{ Form::hidden('ticket', '', ['id' => 'ticketID']) }}
{!! Form::close() !!}
