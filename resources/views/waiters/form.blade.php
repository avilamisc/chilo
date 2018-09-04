{!! Form::open(['route' => [$waiter->url(),$waiter->id],'method' => $waiter->method(), 'class' => 'app-form']) !!}

  <div class="form-row">
    <div class="col-1">
      <div class="">
        {!! Form::label('id', 'Id Sistema') !!}
        {!! Form::text('id', $waiter->id,['class' => 'form-control', 'readonly' => 'true'] ) !!}
      </div>
    </div>
    <div class="col-7">
      {!! Form::label('user_id', 'Nombre Mesero') !!}
      {!! Form::select('user_id', $waiter->getUsers(), $waiter->user_id, ['class' => 'form-control']) !!}
    </div>
    <div class="col-2">
      <div class="">
        {!! Form::label('table_number', '# Mesa') !!}
        {!! Form::select('table_number', $waiter->getTables(), $waiter->table_number, ['class' => 'form-control']) !!}
      </div>
    </div>
    <div class="col-2">
      <div class="">
        {!! Form::label('employee_number', '# Empleado') !!}
        {!! Form::number('employee_number', $waiter->employee_number,['class' => 'form-control'] ) !!}
      </div>
    </div>
  </div>
<div class="form-row">
  <div class="col">
    <div class="form-check">
      {!! Form::checkbox('status', 'true', $waiter->status, ['class' => 'form-check-input big-checkbox', 'type' => 'checkbox']) !!}
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
