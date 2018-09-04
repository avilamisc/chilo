@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card padding">
    <header>
      <h4>Editar Exclusivo</h4>
    </header>

    <div class="card-body">
      @include('exclusives.error')
      @include('exclusives.form')
    </div>
  </div>
</div>
@include('exclusives.pw')
@endsection
