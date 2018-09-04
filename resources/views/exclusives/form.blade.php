{!! Form::open(['route' => [$exclusive->url(),$exclusive->id],'method' => $exclusive->method(), 'class' => 'app-form']) !!}
<div class="form-row">
  <div class="col">
    {!! Form::label('id', 'Id Sistema') !!}
    {!! Form::text('id', $exclusive->id,['class' => 'form-control', 'readonly' => 'true'] ) !!}
  </div>
  <div class="col">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name',$exclusive->name,['class' => 'form-control'] ) !!}
  </div>
  <div class="col">
    {!! Form::label('category', 'Tipo') !!}
    {!! Form::select('category', $exclusive->exTypes(), $exclusive->category, ['class' => 'form-control']) !!}
  </div>
  <div class="col">
    {!! Form::label('status', 'Activa') !!}
    {!! Form::checkbox('status', 'value', $exclusive->status, ['class' => 'displayBlock']) !!}
  </div>
</div>
  <div class="form-row">
    <div class="col">
      {!! Form::label('description', 'Detalle') !!}
      {!! Form::text('description',$exclusive->description,['class' => 'form-control']) !!}
    </div>
  </div>
<div class="form-row">
  <div class="col">
    {!! Form::label('start', 'Vigencia Inicio') !!}
    {!! Form::date('start', \Carbon\Carbon::now()) !!}
  </div>
  <div class="col">
    {!! Form::label('end', 'Vigencia Fin') !!}
    {!! Form::date('end', \Carbon\Carbon::now()) !!}
  </div>
  <div class="col">
    {!! Form::label('amount', 'Valor') !!}
    {!! Form::text('amount',$exclusive->amount,['class' => 'form-control']) !!}
  </div>
  <div class="col">
    {!! Form::label('amount_type', 'Tipo Valor') !!}
    {!! Form::select('amount_type', $exclusive->exaTypes(), $exclusive->amount_type, ['class' => 'form-control']) !!}
  </div>
  <div class="col">
    {!! Form::label('availability', 'Disponibilidad') !!}
    {!! Form::text('availability',$exclusive->availability,['class' => 'form-control']) !!}
  </div>
</div>
  <div class="float-right">
    <input type="submit" value="Guardar" class="btn btn-primary">
  </div>
{!! Form::close() !!}
