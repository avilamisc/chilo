<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;
use App\Http\Requests\QuestionRequest;

class QuestionsController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Question::paginate(10);
        return view('questions.index',['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $question = new Question;
        return view('questions.create',["question" => $question]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionRequest $request)
    {
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $options = [
          'description' => $request->description,
          'category' => $request->category,
          'status' => $status,//$request->status,
          'control' => $request->control,
          'created_by' => $userID //$request->name,
          //'name' => $request->name,
          //'name' => $request->name,
        ];

        if (Question::create($options)) {
          // code...
          return redirect('/preguntas')->with('info',
                          'Pregunta registrada correctamente');
        }else{
          return view('questions.create');
        }
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = Question::find($id);
        return view('questions.edit',["question" => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $question = Question::find($id);
        $ldate = date('Y-m-d H:i:s');

        $question->description = $request->description;
        $question->category = $request->category;
        $question->status = $status;//$request->status;
        $question->control = $request->control;
        $question->mod_by = $userID;
        $question->mod_at = $ldate;

        if ($question->save()) {
          // code...
          return redirect('/preguntas')->with('info',
                          'Pregunta actualizada correctamente');
        }else{
          return view('questions.edit', ["question" => $question]);
        }
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return redirect('/preguntas')->with('info',
                        'Pregunta eliminada correctamente');
    }
}
