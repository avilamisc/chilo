<table class="table">
  <thead>
    <tr>
      <th scope="col">Asignar</th>
      <th scope="col">Detalle</th>
    </tr>
  </thead>
@foreach ($poll->questions() as $question)
  <tr>
    <td>
      @if (isset($poll->id))
        @php
          $found = false;
        @endphp
        @foreach ($poll->getPollQuestions($poll->id) as $key => $value)
          @if ($value->question_id == $question->id)
            {!!  Form::checkbox('questions[]', $question->id, true) !!}
            @php
              $found = true;
            @endphp
          @endif
        @endforeach
        @if (!$found)
          {!!  Form::checkbox('questions[]', $question->id, false) !!}
        @endif
      @else
        {!! Form::checkbox('questions[]', $question->id, false) !!}
      @endif
    </td>
    <td>{{ $question->description }}</td>
  </tr>
@endforeach
</table>
