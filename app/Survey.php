<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Question;
use App\Ask;

class Survey extends Model
{
  public $fillable = ['poll_id', 'question_id','answer','waiter_id','table_id','facility_id', 'ticket'];

  public function url(){
    return $this->id ? 'encuesta.update' : 'encuesta.store';
  }

  public function method(){
    return $this->id ? 'PUT' : 'POST';
  }

  public function getQuestions(){
    //$asks = Ask::where('poll_id', 13)->pluck('question_id');
    $asks = Ask::first()->pluck('question_id');
    $questions = Question::whereIn('id', $asks)->get();
    //dd($questions);
    return $questions;
  }

}
