{!! Form::open(['route' => [$user->url(),$user->id],'method' => $user->method(), 'class' => 'app-form']) !!}

  <div class="form-row">
    <div class="col-1">
      <div class="">
        {!! Form::label('id', 'Id Sistema') !!}
        {!! Form::text('id', $user->id,['class' => 'form-control', 'readonly' => 'true'] ) !!}
      </div>
    </div>
    <div class="col">
      <div class="">
        {!! Form::label('name', 'Nombre') !!}
        {!! Form::text('name', $user->name,['class' => 'form-control'] ) !!}
      </div>
    </div>
    <div class="col">
      <div class="">
        {!! Form::label('email', 'Correo Electronico') !!}
        {!! Form::text('email', $user->email,['class' => 'form-control'] ) !!}
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col">
      <h3>Lista de Roles</h3>
      <div class="form-group">

      </div>
      <ul class="list-unstyled">
        @foreach ($roles as $role)
          @php
          $checked = false;

          foreach ($user->getRoles() as $asignedRole) {          
            if ($role->id == $asignedRole) {
                $checked = true;
                continue;
            }
          }

          @endphp
          <li>
            <label>
              {{ Form::checkbox('roles[]', $role->id, $checked) }}
              {{ $role->name }}
              <em>({{ $role->description }})</em>
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
{!! Form::close() !!}
