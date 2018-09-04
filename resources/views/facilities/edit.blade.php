@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Editar sucursal</h4>
    </header>

    <div class="card-body">
      @include('facilities.error')
      @include('facilities.form')
    </div>
  </div>
</div>
@include('facilities.pw')
@endsection
