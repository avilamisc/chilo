  <div class="form-row">
    <div class="col-1">
      <div class="">
        {!! Form::label('id', 'Id Sistema') !!}
        {!! Form::text('id', $role->id,['class' => 'form-control', 'readonly' => 'true'] ) !!}
      </div>
    </div>
    <div class="col">
      <div class="">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', $role->name,['class' => 'form-control'] ) !!}
      </div>
    </div>
    <div class="col">
      <div class="">
        {!! Form::label('description', 'Descripción') !!}
        {!! Form::text('description', $role->description,['class' => 'form-control'] ) !!}
      </div>
    </div>
    <div class="col">
      <div class="">
        {!! Form::label('slug', 'URL Amigable') !!}
        {!! Form::text('slug', $role->slug,['class' => 'form-control'] ) !!}
      </div>
    </div>
  </div>
  <hr>
  <h3>Permiso Especial</h3>
  <div class="form-group">
    <label>{{ Form::radio('special','all-access') }} Acceso Total</label>
    <label>{{ Form::radio('special','no-access') }}  Ningún Acceso</label>
  </div>
  <hr>
  <div class="row">
    <div class="col">
      <h3>Lista de Permisos</h3>
      <div class="form-group">
      </div>
      <ul class="list-unstyled">
        @foreach ($permissions as $permission)
          @php
          $checked = false;

          foreach ($currentPerms as $asignedPerm) {            
            if ($permission->id == (int)$asignedPerm) {
                $checked = true;
                continue;
            }
          }

          @endphp
          <li>
            <label>
              {{ Form::checkbox('permissions[]', $permission->id, $checked) }}
              {{ $permission->name }}
              <em>({{ $permission->description }})</em>
            </label>
          </li>
        @endforeach

      </ul>
    </div>
  </div>
<div class="form-row">
  <div class="col">
    <div class="float-right">
      <input type="submit" value="Guardar" class="btn btn-primary">
    </div>
  </div>
</div>
