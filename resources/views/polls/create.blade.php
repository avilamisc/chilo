@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Crear nueva encuesta</h4>
    </header>

    <div class="card-body">
      @include('polls.error')
      @include('polls.form')
    </div>
  </div>
</div>
@include('polls.pw')
@endsection
