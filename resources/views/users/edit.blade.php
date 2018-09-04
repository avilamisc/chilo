@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Editar Usuario {{ $user->id }}</h4>
    </header>

    <div class="card-body">
      @include('users.error')
      @include('users.form')
    </div>
  </div>
</div>
@include('users.pw')
@endsection
