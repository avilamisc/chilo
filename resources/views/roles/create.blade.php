@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Nuevo rol</h4>
    </header>

    <div class="card-body">
      @include('roles.error')
      {!! Form::open(['route' => 'roles.store' , 'class' => 'app-form']) !!}
        @include('roles.form')
      {!! Form::close() !!}
    </div>
  </div>
</div>
@include('roles.pw')
@endsection
