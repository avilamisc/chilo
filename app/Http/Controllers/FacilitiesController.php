<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\FacilityRequest;
use Auth;

class FacilitiesController extends Controller
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
        $facilities = Facility::paginate(10);
        return view('facilities.index',['facilities' => $facilities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $facility = new Facility;
        return view('facilities.create',["facility" => $facility]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityRequest $request)
    {
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('active')) {
          $status = true;
        }

       $options = [
          'name' => $request->name,
          'status' => $status,//$request->active,
          'type' => $request->type,
          'address' => $request->address,
          'created_by' => $userID
        ];

        if (Facility::create($options)) {
          // el metodo with permite pasar un mensaje para mostrarlo en la vista
          return redirect('/sucursales')->with('info',
                          'Sucursal registrada correctamente');
        }else{
          return view('facilities.create');
        }
      }else{
        return redirect('/login');
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
        $facility = Facility::find($id);
        return view('facilities.edit',["facility" => $facility]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityRequest $request, $id)
    {
      if (Auth::check())
      {
        $userID = Auth::user()->id;

        $status = false;

        if ($request->has('active')) {
          $status = true;
        }

        $facility = Facility::find($id);
        $ldate = date('Y-m-d H:i:s');

        $facility->name = $request->name;
        $facility->status = $status; //$request->active;
        $facility->type = $request->type;
        $facility->address = $request->address;
        $facility->mod_by = $userID;
        $facility->mod_at = $ldate;

        if ($facility->save()) {
          // code...
          return redirect('/sucursales')->with('info',
                          'Sucursal editada correctamente');
        }else{
          return view('facilities.edit', ["facility" => $facility]);
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
        Facility::destroy($id);
        return redirect('/sucursales')->with('info',
                        'Sucursal eliminada correctamente');
    }
}
