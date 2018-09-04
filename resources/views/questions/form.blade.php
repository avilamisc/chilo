{!! Form::open(['route' => [$question->url(),$question->id],'method' => $question->method(), 'class' => 'app-form']) !!}
<div class="form-row">
  <div class="col">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description',$question->description,['class' => 'form-control'] ) !!}
  </div>
</div>
  <div class="form-row">
    <div class="col">
      {!! Form::label('id', 'Id Sistema') !!}
      {!! Form::text('id', $question->id,['class' => 'form-control', 'readonly' => 'true'] ) !!}
    </div>
    <div class="col">
      {!! Form::label('category', 'Categoria') !!}
      {!! Form::select('category', $question->pqCategories(), $question->category, ['class' => 'form-control']) !!}
    </div>
    <div class="col">
      {!! Form::label('control', 'Tipo de control') !!}
      {!! Form::select('control', $question->qcTypes(), $question->control, ['class' => 'form-control']) !!}
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <div class="form-check">
        {!! Form::checkbox('status', 'true', $question->status, ['class' => 'form-check-input big-checkbox', 'type' => 'checkbox']) !!}
        {!! Form::label('status', 'Activa', ['class' => 'form-check-label', 'for' => 'status']) !!}
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <input type="submit" value="Guardar" class="btn btn-primary">
      </div>
    </div>
  </div>
{!! Form::close() !!}
