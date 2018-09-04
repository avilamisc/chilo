@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Editar rol {{ $role->name }}</h4>
    </header>

    <div class="card-body">
      @include('roles.error')
      {!! Form::open(['route' => ['roles.update',$role->id],'method' => 'PUT', 'class' => 'app-form']) !!}
        @include('roles.form')
      {!! Form::close() !!}
    </div>
  </div>
</div>
@include('roles.pw')
@endsection
