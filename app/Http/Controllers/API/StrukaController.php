<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Struka;
use Illuminate\Http\Request;

class StrukaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->sendResponse(Struka::all());
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
            $struka=Struka::create($input);
            return $this->sendResponse( $struka);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Struka  $struka
     * @return \Illuminate\Http\Response
     */
    public function show(Struka $struka)
    {
        if(!isset($struka)){
            return $this->sendError("not found");
        }
        return $this->sendResponse( $struka);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Struka  $struka
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Struka $struka)
    {
        if(!isset($struka)){
            return $this->sendError("not found");
        }
        if(isset($request->naziv)){
            $struka->naziv=$request->naziv;
        }

        try {
            $struka->save();
            return $this->sendResponse( $struka);
        } catch (\Throwable $th) {
            return $this->sendError($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Struka  $struka
     * @return \Illuminate\Http\Response
     */
    public function destroy(Struka $struka)
    {
        try {
            $struka->delete();
            return $this->sendResponse( 'ok');
        } catch (\Throwable $th) {
           return $this->sendError($th->getMessage());
        }
    }
}
