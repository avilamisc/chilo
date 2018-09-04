<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PCategory;
use App\Question;
use App\Facility;
use App\PQuestion;

class Poll extends Model
{
    //
    public $fillable = ['name', 'poll_type', 'id_facility','status', 'created_by','mod_by','mod_at'];

    public function url(){
      return $this->id ? 'encuestas.update' : 'encuestas.store';
    }

    public function method(){
      return $this->id ? 'PUT' : 'POST';
    }

    /**
     * Get the questions for the poll.
     */
    public function asks()
    {
        return $this->hasMany('App\Ask');
    }

    public function questions()
    {
      return Question::all();
    }

    public function pCategories()
    {
      return PCategory::pluck('name', 'id')->toArray();
    }

    public function getFacilities()
    {
      return Facility::pluck('name', 'id')->toArray();
    }

    public function getPollQuestions($id)
    {
      return Ask::select('poll_id', 'question_id')->where('poll_id',$id)->get();
      //$result = Ask::where('poll_id',$this->id)->get();
      //$asks = (array)$result;
      //return $asks;
    }
}
