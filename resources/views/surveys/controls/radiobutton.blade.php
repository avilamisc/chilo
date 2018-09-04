<div class="">
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="radio" id="rbEx" class="form-check-input" name="optradio">Excelente
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="radio" id="rbMb" class="form-check-input" name="optradio">Muy Bueno
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="radio" id="rbBn" class="form-check-input" name="optradio">Bueno
    </label>
  </div>
  <div class="form-check-inline">
    <label class="form-check-label">
      <input type="radio" id="rbRg" class="form-check-input" name="optradio">Regular
    </label>
  </div>
</div>
{{ Form::hidden('vals[]', '', ['id' => 'openRb']) }}
