{!! Form::open(['route' => [$facility->url(),$facility->id],'method' => $facility->method(), 'class' => 'app-form']) !!}
  <div class="form-row">
    <div class="col-2">
      {!! Form::label('id', 'Id Sistema') !!}
      {!! Form::text('id', $facility->id,['class' => 'form-control shortText', 'readonly' => 'true'] ) !!}
    </div>
    <div class="col-4">
      {!! Form::label('type', 'Tipo') !!}
      {!! Form::select('type', $facility->fTypes(), $facility->type, ['class' => 'form-control']) !!}
    </div>
    <div class="col-6">
      {!! Form::label('name', 'Nombre') !!}
      {!! Form::text('name',$facility->name,['class' => 'form-control', 'placeholder' => 'Nombre'] ) !!}
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      {!! Form::label('address', 'Direccion') !!}
      {!! Form::text('address',$facility->address,['class' => 'form-control', 'placeholder' => 'Direccion']) !!}
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <div class="form-check">
        {!! Form::checkbox('active', 'true', $facility->status, ['class' => 'form-check-input big-checkbox', 'type' => 'checkbox']) !!}
        {!! Form::label('active', 'Activa', ['class' => 'form-check-label', 'for' => 'active']) !!}
      </div>
    </div>
    <div class="col">
      <div class="float-right">
        <input type="submit" value="Guardar" class="btn btn-primary">
      </div>
    </div>
  </div>
{!! Form::close() !!}
