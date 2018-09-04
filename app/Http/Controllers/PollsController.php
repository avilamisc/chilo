<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poll;
use App\Ask;
use Auth;
use App\Http\Requests\PollRequest;

class PollsController extends Controller
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
        $polls = Poll::paginate(10);
        return view('polls.index',['polls' => $polls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $poll = new Poll;
        return view('polls.create',["poll" => $poll]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PollRequest $request)
    {
        if (Auth::check())
        {
          $userID = Auth::user()->id;

          $status = false;

          if ($request->has('status')) {
            $status = true;
          }

          $options = [
           'name' => $request->name,
           'poll_type' => $request->poll_type,
           'status' => $status,
           'id_facility' => $request->id_facility,
           'created_by' => $userID
          ];
          $ok = false;
          $poll = Poll::create($options);

           if($request->has('questions')) {
            $questions = $request->input('questions');

            foreach ($questions as $key => $value) {

              $askOptions = ['poll_id' => $poll->id, 'question_id' => $value];
              Ask::create($askOptions);
            }

          }

          $ok = true;

          if ($ok) {
           // code...
           return redirect('/encuestas')->with('info',
                           'Encuesta registrada correctamente');
          }else{
           return view('polls.create');
         }
        }
         //*/


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
        $poll = Poll::find($id);
        return view('polls.edit',["poll" => $poll]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PollRequest $request, $id)
    {
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $poll = Poll::find($id);
        $ldate = date('Y-m-d H:i:s');

        $poll->name = $request->name;
        $poll->poll_type = $request->poll_type; //$request->active;
        $poll->status = $status;//$request->status;
        $poll->id_facility = $request->id_facility;
        $poll->mod_by = $userID;
        $poll->mod_at = $ldate;

        $ok = false;
        //$poll->save()
        if ($poll->save()) {

          if($request->has('questions')) {
           $inputQuestions = $request->input('questions');
           $currentQuestions = Ask::where('poll_id', $poll->id)->get();

           $questionsToAdd = [];

           foreach ($inputQuestions as $selectedQuestionId) {
             $foundQ = false;
            foreach ($currentQuestions as $ckey => $cvalue) {
              if ($cvalue->question_id == $selectedQuestionId){
                $foundQ = true;
                continue;
              }
            }
            if (!$foundQ) {
              $questionsToAdd[] = $selectedQuestionId;
            }
           }
           //var_dump($questionsToAdd);
           $questionsToDelete = [];
           foreach ($currentQuestions as $ckey => $cvalue) {
             $foundQ = false;
            foreach ($inputQuestions as $selectedQuestionId) {
              if ($cvalue->question_id == $selectedQuestionId){
                $foundQ = true;
                continue;
              }
            }
            if (!$foundQ) {
              $questionsToDelete[] = $cvalue->id;
            }
          }
          //var_dump($questionsToDelete);
          foreach ($questionsToDelete as $itemIdToDelete) {
            //Ask::destroy();
            Ask::find((int)$itemIdToDelete)->delete();
          }

         foreach ($questionsToAdd as $newQkey) {
           $askOptions = ['poll_id' => $poll->id, 'question_id' => $newQkey];
           Ask::create($askOptions);
         }

       }else{
         Ask::where('poll_id', $poll->id)->delete();
       }
        return redirect('/encuestas')->with('info',
                        'Encuesta editada correctamente');
      }else{
        return view('polls.edit', ["poll" => $poll]);
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
      Ask::where('poll_id', $id)->delete();
      Poll::destroy($id);
      return redirect('/encuestas')->with('info',
                      'Encuesta eliminada correctamente');
    }
}
