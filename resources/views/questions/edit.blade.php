@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Editar pregunta</h4>
    </header>

    <div class="card-body">
      @include('questions.error')
      @include('questions.form')
    </div>
  </div>
</div>
@include('questions.pw')
@endsection
