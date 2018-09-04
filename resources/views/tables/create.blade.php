@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Crear nueva mesa</h4>
    </header>

    <div class="card-body">
      @include('tables.error')
      @include('tables.form')
    </div>
  </div>
</div>
@include('tables.pw')
@endsection
