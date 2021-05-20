<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Radnik;
use Illuminate\Http\Request;

class RadnikController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Radnik::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input=$request->all();
        try {
            $radnk=Radnik::create($input);
            return $this->sendResponse( $radnk);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Radnik  $radnik
     * @return \Illuminate\Http\Response
     */
    public function show(Radnik $radnik)
    {
        if(!isset($radnik)){
            return $this->sendError("not found");
        }
        return $this->sendResponse( $radnik);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Radnik  $radnik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Radnik $radnik)
    {
        if(!isset($radnik)){
            return $this->sendError("not found");
        }
        if(isset($request->ime)){
            $radnik->ime=$request->ime;
        }
        if(isset($request->prezime)){
            $radnik->prezime=$request->prezime;
        }
        if(isset($request->plata)){
            $radnik->plata=$request->plata;
        }
        if(isset($request->departman_id)){
            $radnik->departman_id=$request->departman_id;
        }
        if(isset($request->struka_id)){
            $radnik->struka_id=$request->struka_id;
        }
        try {
            $radnik->save();
            return $this->sendResponse( $radnik);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Radnik  $radnik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Radnik $radnik)
    {
        try {
            $radnik->delete();
            return $this->sendResponse( 'ok');
        } catch (\Throwable $th) {
           return $this->sendError($th->getMessage());
        }
    }
}
