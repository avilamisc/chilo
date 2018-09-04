@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Crear nuevo mesero</h4>
    </header>

    <div class="card-body">
      @include('waiters.error')
      @include('waiters.form')
    </div>
  </div>
</div>
@include('waiters.pw')
@endsection
