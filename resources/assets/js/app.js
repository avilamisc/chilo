
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});


$(document).ready(function(){
  $("#loading-div-background").css({ opacity: 1.0 });

  var currentPage = this.location.pathname;

  if (currentPage.indexOf('sucursales') >= 0) {
        $('#facilities').addClass('active-item-menu');
  }else if (currentPage.indexOf('mesas') >= 0) {
        $('#tables').addClass('active-item-menu');
  }else if (currentPage.indexOf('meseros') >= 0) {
        $('#waiters').addClass('active-item-menu');
  }else if (currentPage.indexOf('encuestas') >= 0) {
        $('#polls').addClass('active-item-menu');
  }else if (currentPage.indexOf('preguntas') >= 0) {
        $('#questions').addClass('active-item-menu');
  }else if (currentPage.indexOf('exclusivos') >= 0) {
        $('#exclusives').addClass('active-item-menu');
  }else if (currentPage.indexOf('home') >= 0) {
        $('#home').addClass('active-item-menu');
  }else if (currentPage.indexOf('usuarios') >= 0) {
        $('#usuarios').addClass('active-item-menu');
  }else if (currentPage.indexOf('roles') >= 0) {
        $('#roles').addClass('active-item-menu');
  }
});

$('form').submit(function() {
    $("#loading-div-background").show();
});

$('#aEdit').on("click",function() {
    $("#loading-div-background").show();
});

$('#sEdit').on("click",function() {
    $("#loading-div-background").show();
});

$('#capacity').on("keypress",function(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
});

$('#s5').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#s4').hasClass("far")){
        $('#s4').removeClass('far');
        $('#s4').addClass('fas');
        $('#s4').addClass('survey-item-active');
      }

      if($('#s3').hasClass("far")){
        $('#s3').removeClass('far');
        $('#s3').addClass('fas');
        $('#s3').addClass('survey-item-active');
      }

      if($('#s2').hasClass("far")){
        $('#s2').removeClass('far');
        $('#s2').addClass('fas');
        $('#s2').addClass('survey-item-active');
      }

      if($('#s1').hasClass("far")){
        $('#s1').removeClass('far');
        $('#s1').addClass('fas');
        $('#s1').addClass('survey-item-active');
      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');


    }
    $('#openRa').val('5');
});

$('#s4').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#s3').hasClass("far")){
        $('#s3').removeClass('far');
        $('#s3').addClass('fas');
        $('#s3').addClass('survey-item-active');
      }

      if($('#s2').hasClass("far")){
        $('#s2').removeClass('far');
        $('#s2').addClass('fas');
        $('#s2').addClass('survey-item-active');
      }

      if($('#s1').hasClass("far")){
        $('#s1').removeClass('far');
        $('#s1').addClass('fas');
        $('#s1').addClass('survey-item-active');
      }

      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('fas');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');

      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');
    }else{
      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('survey-item-active');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');
      }
    }
    $('#openRa').val('4');
});

$('#s3').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#s2').hasClass("far")){
        $('#s2').removeClass('far');
        $('#s2').addClass('fas');
        $('#s2').addClass('survey-item-active');
      }

      if($('#s1').hasClass("far")){
        $('#s1').removeClass('far');
        $('#s1').addClass('fas');
        $('#s1').addClass('survey-item-active');
      }

      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('fas');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');

      }

      if($('#s4').hasClass("fas")){
        $('#s4').removeClass('survey-item-active');
        $('#s4').removeClass('fas');
        $('#s4').addClass('far');
      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');
    }else{

      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('survey-item-active');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');
      }

      if($('#s4').hasClass("fas")){
        $('#s4').removeClass('survey-item-active');
        $('#s4').removeClass('fas');
        $('#s4').addClass('far');
      }
    }
    $('#openRa').val('3');
});

$('#s2').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#s1').hasClass("far")){
        $('#s1').removeClass('far');
        $('#s1').addClass('fas');
        $('#s1').addClass('survey-item-active');
      }

      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('fas');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');

      }

      if($('#s4').hasClass("fas")){
        $('#s4').removeClass('survey-item-active');
        $('#s4').removeClass('fas');
        $('#s4').addClass('far');
      }

      if($('#s3').hasClass("fas")){
        $('#s3').removeClass('survey-item-active');
        $('#s3').removeClass('fas');
        $('#s3').addClass('far');
      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');
    }else{

      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('survey-item-active');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');
      }

      if($('#s4').hasClass("fas")){
        $('#s4').removeClass('survey-item-active');
        $('#s4').removeClass('fas');
        $('#s4').addClass('far');
      }

      if($('#s3').hasClass("fas")){
        $('#s3').removeClass('survey-item-active');
        $('#s3').removeClass('fas');
        $('#s3').addClass('far');
      }
    }
    $('#openRa').val('2');
});

$('#s1').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('fas');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');

      }

      if($('#s4').hasClass("fas")){
        $('#s4').removeClass('survey-item-active');
        $('#s4').removeClass('fas');
        $('#s4').addClass('far');
      }

      if($('#s3').hasClass("fas")){
        $('#s3').removeClass('survey-item-active');
        $('#s3').removeClass('fas');
        $('#s3').addClass('far');
      }

      if($('#s2').hasClass("fas")){
        $('#s2').removeClass('survey-item-active');
        $('#s2').removeClass('fas');
        $('#s2').addClass('far');
      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');
    }else{

      if($('#s5').hasClass("fas")){
        $('#s5').removeClass('survey-item-active');
        $('#s5').removeClass('fas');
        $('#s5').addClass('far');
      }

      if($('#s4').hasClass("fas")){
        $('#s4').removeClass('survey-item-active');
        $('#s4').removeClass('fas');
        $('#s4').addClass('far');
      }

      if($('#s3').hasClass("fas")){
        $('#s3').removeClass('survey-item-active');
        $('#s3').removeClass('fas');
        $('#s3').addClass('far');
      }

      if($('#s2').hasClass("fas")){
        $('#s2').removeClass('survey-item-active');
        $('#s2').removeClass('fas');
        $('#s2').addClass('far');
      }
    }
    $('#openRa').val('1');
});

/*****************************************/
//    EMOTICONOS                         //
/*****************************************/
$('#eiex').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#eimb').hasClass("fas")){
        $('#eimb').removeClass('survey-item-active');
        $('#eimb').removeClass('fas');
        $('#eimb').addClass('far');
      }

      if($('#eib').hasClass("fas")){
        $('#eib').removeClass('survey-item-active');
        $('#eib').removeClass('fas');
        $('#eib').addClass('far');
      }

      if($('#eir').hasClass("fas")){
        $('#eir').removeClass('survey-item-active');
        $('#eir').removeClass('fas');
        $('#eir').addClass('far');
      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');

      $('#openEm').val('Excelente');
    }
});

$('#eimb').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#eiex').hasClass("fas")){
        $('#eiex').removeClass('survey-item-active');
        $('#eiex').removeClass('fas');
        $('#eiex').addClass('far');
      }

      if($('#eib').hasClass("fas")){
        $('#eib').removeClass('survey-item-active');
        $('#eib').removeClass('fas');
        $('#eib').addClass('far');
      }

      if($('#eir').hasClass("fas")){
        $('#eir').removeClass('survey-item-active');
        $('#eir').removeClass('fas');
        $('#eir').addClass('far');
      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');
      $('#openEm').val('Muy bueno');
    }
});

$('#eib').on("click",function() {
    //
    if($(this).hasClass("far")){

      if($('#eiex').hasClass("fas")){
        $('#eiex').removeClass('survey-item-active');
        $('#eiex').removeClass('fas');
        $('#eiex').addClass('far');
      }

      if($('#eimb').hasClass("fas")){
        $('#eimb').removeClass('survey-item-active');
        $('#eimb').removeClass('fas');
        $('#eimb').addClass('far');
      }

      if($('#eir').hasClass("fas")){
        $('#eir').removeClass('survey-item-active');
        $('#eir').removeClass('fas');
        $('#eir').addClass('far');
      }

      $(this).removeClass('far');
      $(this).addClass('fas');
      $(this).addClass('survey-item-active');
      $('#openEm').val('Bueno');
    }
});

$('#eir').on("click",function() {
    //
  if($(this).hasClass("far")){

    if($('#eiex').hasClass("fas")){
      $('#eiex').removeClass('survey-item-active');
      $('#eiex').removeClass('fas');
      $('#eiex').addClass('far');
    }

    if($('#eimb').hasClass("fas")){
      $('#eimb').removeClass('survey-item-active');
      $('#eimb').removeClass('fas');
      $('#eimb').addClass('far');
    }

    if($('#eib').hasClass("fas")){
      $('#eib').removeClass('survey-item-active');
      $('#eib').removeClass('fas');
      $('#eib').addClass('far');
    }

    $(this).removeClass('far');
    $(this).addClass('fas');
    $(this).addClass('survey-item-active');

    $('#openEm').val('Regular');
  }
});

$("#answer").focusout(function(){
  var valueAns = $(this).val();
  $('#openQ').val(valueAns);
});

$('input[type=radio]').change(function() {
    if (this.id == 'rbEx') {
      $('#openRb').val('Excelente');
    }else if (this.id == 'rbMb') {
      $('#openRb').val('Muy bueno');
    }else if (this.id == 'rbBn') {
      $('#openRb').val('Bueno');
    }else if (this.id == 'rbRg') {
      $('#openRb').val('Regular');
    }
});

$('#sendTicket').on('click', function(){
    var noticket = $('#inputticket').val();
    $('#ticketID').val(noticket);
    $('#ticketContainer').addClass('hideContainer');
    $('#surveyContainer').removeClass('hideContainer');
});
