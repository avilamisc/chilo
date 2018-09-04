<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Survey;
use App\Waiter;
use App\Customer;
use Illuminate\Support\Facades\Input;
use Auth;
use Mail;

class SurveysController extends Controller
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
        $survey = new Survey;
        return view('surveys.index',["survey" => $survey]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //dd($request);
      if (Auth::check())
      {
        $userID = Auth::user()->id;
        $customerCreated = false;
        $waiter = new Waiter;
        //var_dump($waiter->getWaiterId($userID));
        //var_dump($waiter->getTableId($userID));


        $waiterID = $waiter->getWaiterId($userID);
        $tableID = $waiter->getTableId($userID);
        //var_dump($waiter->getFacilityId($tableID));

        $facilityID = $waiter->getFacilityId($tableID);
        //dd($request);
        //dd(count($request->vals));
        $customerCreated = false;
        for ($i=0; $i < count($request->vals); $i++) {
          // code...

          $options = [
             'poll_id' => 1,
             'question_id' => $i+1,//$request->active,
             'answer' => $request->vals[$i],
             'waiter_id' => $waiterID[0],
             'table_id' => $tableID[0],
             'facility_id' => $facilityID[0],
             'ticket' => $request->ticket
           ];

          $survey = Survey::create($options);

          if (!$customerCreated) {
            if (!is_null($request->customeremail)) {
              $optionsCustomer = [
                 'poll_id' => 1,//survey id
                 'name' => $request->customername,//$request->active,
                 'email' => $request->customeremail,
                 'birthdate' => $request->birthdate,
                 'ticket' => $request->ticket
               ];

               Customer::create($optionsCustomer);
               $customerCreated = true;
            }
          }

        }
        if ($customerCreated) {
          $data = array('name'=>$request->customername, "body" => "Descuento1");

          Mail::send('emails.mail', $data, function($message) {
              $message->to('marcosa31@gmail.com', 'Marcos')
                      ->subject('Descuento de cortesia');
              $message->from('marcosa31@gmail.com','Marcos');
          });
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
