@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <header class="card-header text-center">
            <h4>Crear nueva sucursal</h4>
          </header>

          <div class="card-body">
            @include('facilities.error')
            @include('facilities.form')
          </div>
        </div>
      </div>
    </div>
</div>
@include('facilities.pw')
@endsection
