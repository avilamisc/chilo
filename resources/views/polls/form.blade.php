{!! Form::open(['route' => [$poll->url(),$poll->id],'method' => $poll->method(), 'class' => 'app-form']) !!}
<div class="form-row">
  <div class="col-1">
    {!! Form::label('id', 'Id Sistema') !!}
    {!! Form::text('id', $poll->id,['class' => 'form-control', 'readonly' => 'true'] ) !!}
  </div>
  <div class="col-4">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',$poll->name,['class' => 'form-control'] ) !!}
  </div>
  <div class="col">
    {!! Form::label('poll_type', 'Categoria') !!}
    {!! Form::select('poll_type', $poll->pCategories(), $poll->type, ['class' => 'form-control']) !!}
  </div>
  <div class="col">
      {!! Form::label('id_facility', 'Sucursal') !!}
      {!! Form::select('id_facility', $poll->getFacilities(), $poll->id_facility, ['class' => 'form-control']) !!}
  </div>
</div>
<div class="form-row">
  <div class="col">
    <div class="form-check">
      {!! Form::label('status', 'Activa') !!}
      {!! Form::checkbox('status', 'value', $poll->status, ['class' => 'displayBlock']) !!}
    </div>
  </div>
  <div class="col">
    <div class="float-right">
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
  </div>
</div>
<div class="form-row">
  <div class="col">
    @include('polls.questions')
  </div>
</div>


{!! Form::close() !!}
