<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Waiter;
use Auth;
use App\Http\Requests\WaiterRequest;

class WaitersController extends Controller
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
        $waiter = Waiter::paginate(1);
        return view('waiters.index',['waiters' => $waiter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $waiter = new Waiter;
        return view('waiters.create',["waiter" => $waiter]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WaiterRequest $request)
    {
      //dd($request);
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $options = [
          'user_id' => $request->user_id,
          'table_number' => $request->table_number,
          'employee_number' => $request->employee_number,
          'status' => $status,//$request->location,
          'created_by' => $userID //$request->name,
          //'name' => $request->name,
          //'name' => $request->name,
        ];

        if (Waiter::create($options)) {
          // code...
          return redirect('/meseros')->with('info',
                          'Mesero registrado correctamente');
        }else{
          return view('waiters.create');
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
        $waiter = Waiter::find($id);
        return view('waiters.edit',["waiter" => $waiter]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WaiterRequest $request, $id)
    {
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $waiter = Waiter::find($id);
        $ldate = date('Y-m-d H:i:s');

        $waiter->user_id = $request->user_id;
        $waiter->table_number = $request->table_number;
        $waiter->status = $status;
        $waiter->employee_number = $request->employee_number;
        $waiter->mod_by = $userID;
        $waiter->mod_at = $ldate;

        if ($waiter->save()) {
          // code...
          return redirect('/meseros')->with('info',
                          'Mesero actualizado correctamente');
        }else{
          return view('waiters.edit', ["waiter" => $waiter]);
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
      Table::destroy($id);
      return redirect('/meseros')->with('info',
                      'Mesero eliminado correctamente');
    }
}
