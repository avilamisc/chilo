<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use Auth;
use App\Http\Requests\TableRequest;

class TablesController extends Controller
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
        $tables = Table::paginate(10);
        return view('tables.index',['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $table = new Table;
        return view('tables.create',["table" => $table]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableRequest $request)
    {
      //var_dump($request);
      ///*
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $options = [
          'capacity' => $request->capacity,
          'table_number' => $request->table_number,
          'status' => $status,//$request->status,
          'location' => $request->location,
          'id_facility' => $request->id_facility,
          'created_by' => $userID
        ];

        if (Table::create($options)) {
          // code...
          return redirect('/mesas')->with('info',
                          'Mesa registrada correctamente');
        }else{
          return view('tables.create');
        }
      }//*/
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
        $table = Table::find($id);
        return view('tables.edit',["table" => $table]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableRequest $request, $id)
    {
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }
        $table = Table::find($id);
        $ldate = date('Y-m-d H:i:s');

        $table->capacity = $request->capacity;
        $table->table_number = $request->table_number;
        $table->status = $status;
        $table->location = $request->location;
        $table->id_facility = $request->id_facility;
        $table->mod_by = $userID;
        $table->mod_at = $ldate;

        if ($table->save()) {
          // code...
          return redirect('/mesas')->with('info',
                          'Mesa actualizada correctamente');
        }else{
          return view('tables.edit', ["table" => $table]);
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
        //
        Table::destroy($id);
        return redirect('/mesas')->with('info',
                        'Mesa eliminada correctamente');
    }
}
