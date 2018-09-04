{!! Form::open(['route' => [$table->url(),$table->id],'method' => $table->method(), 'class' => 'app-form']) !!}
  <div class="form-row">
    <div class="col">
      {!! Form::label('id', 'Id Sistema') !!}
      {!! Form::text('id', $table->id,['class' => 'form-control', 'readonly' => 'true'] ) !!}
    </div>
    <div class="col">
      {!! Form::label('table_number', '# Mesa') !!}
      {!! Form::text('table_number', $table->table_number,['class' => 'form-control', 'placeholder' => '# Mesa'] ) !!}
    </div>
    <div class="col">
      {!! Form::label('capacity', '# Asientos') !!}
      {!! Form::number('capacity', $table->capacity, ['class' => 'form-control']) !!}
    </div>
    <div class="col">
      {!! Form::label('id_facility', 'Id Sucursal') !!}
      {!! Form::select('id_facility', $table->getFacilities(), $table->id_facility, ['class' => 'form-control']) !!}
    </div>
    <div class="col">
      {!! Form::label('location', 'Ubicacion en Sucursal') !!}
      {!! Form::text('location',$table->location,['class' => 'form-control', 'placeholder' => 'Ubicacion'] ) !!}
    </div>
  </div>
  <div class="form-row">
    <div class="col">
      <div class="form-check">
        {!! Form::checkbox('status', 'true', $table->status, ['class' => 'form-check-input big-checkbox', 'type' => 'checkbox']) !!}
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

<div id="loading-div-background">
  <div id="loading-div" class="ui-corner-all">
    <img style="height:100%;width:100%;" src={{ asset('img/pw3.gif') }} alt="Procesando.."/>
    <!--br>PROCESANDO. POR FAVOR ESPERE... -->
  </div>
</div>
