<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exclusive;
use Auth;
use App\Http\Requests\ExclusiveRequest;

class ExclusivesController extends Controller
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
        $exclusives = Exclusive::paginate(10);
        return view('exclusives.index',['exclusives' => $exclusives]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $exclusive = new Exclusive;
        return view('exclusives.create',["exclusive" => $exclusive]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExclusiveRequest $request)
    {
      //var_dump($request);

      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $options = [
          'name' => $request->name,
          'category' => $request->category,
          'description' => $request->description,
          'status' => $status,
          'start' => $request->start,
          'end' => $request->end,
          'amount' => $request->amount,
          'amount_type' => $request->amount_type,
          'availability' => $request->availability,
          'created_by' => $userID //$request->name,
          //'name' => $request->name,
          //'name' => $request->name,
        ];

        if (Exclusive::create($options)) {
          // code...
          return redirect('/exclusivos')->with('info',
                          'Registro creado correctamente');
        }else{
          return view('exclusives.create');
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
        $exclusive = Exclusive::find($id);
        return view('exclusives.edit',["exclusive" => $exclusive]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExclusiveRequest $request, $id)
    {
      //var_dump($request);

      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('status')) {
          $status = true;
        }

        $exclusive = Exclusive::find($id);
        $ldate = date('Y-m-d H:i:s');

        $exclusive->name = $request->name;
        $exclusive->category = $request->category;
        $exclusive->description = $request->description;
        $exclusive->status = $status;
        $exclusive->start = $request->start;
        $exclusive->end = $request->end;
        $exclusive->amount = $request->amount;
        $exclusive->amount_type = $request->amount_type;
        $exclusive->availability = $request->availability;
        $exclusive->mod_by = $userID;
        $exclusive->mod_at = $ldate;

        if ($exclusive->save()) {
          // code...
          return redirect('/exclusivos')->with('info',
                          'Registro editado correctamente');
        }else{
          return view('exclusives.edit', ["exclusive" => $exclusive]);
        }
      }//*/

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Exclusive::destroy($id);
      return redirect('/exclusivos')->with('info',
                      'Registro eliminado correctamente');
    }
}
