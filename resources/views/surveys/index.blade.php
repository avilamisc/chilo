@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div id="surveyContainer" class="hideContainer">
              <div class="card">
                  <div class="card-header text-center">
                    <h4>Encuesta</h4>
                  </div>
                  <div class="card-body">
                    @include('surveys.form')
                  </div>
              </div>
            </div>
            <div id="ticketContainer">
              <div class="card">
                <div class="card-header text-center">
                  <h4>Ingrese el # de ticket</h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                        {!! Form::number('inputticket', '',['class' => 'form-control', 'placeholder' => '# de ticket', 'id' => 'inputticket'] ) !!}
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="p-3 text-center">
                          <input id="sendTicket" type="button" value="Enviar" class="btn btn-success">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
  </div>
  @include('surveys.pw')
@endsection
