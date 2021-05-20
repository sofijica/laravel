<?php

namespace App\Http\Controllers;
use App\Models\Radnik;

use Illuminate\Http\Request;

class RadnikController extends Controller
{
    public function svi(){
        $radnici=Radnik::all();
        return view('radnici',['radnici'=>$radnici]);
    }
    public function obrisi($id){
        $radnik=Radnik::find($id);
        $radnik->delete();
        return redirect('/radnici');
    }
    public function kreiraj(Request $request){
        $input=$request->all();
        $radnk=Radnik::create($input);
        return redirect('/radnici');
    }
    public function izbaci(Request $request,$id){
        $radnik=Radnik::find($id);
        $radnik->departman_id=null;
        $radnik->save();
        return redirect('/departman/'.$request->departman);
    }
    public function ubaci(Request $request){
        $radnik=Radnik::find($request->radnik_id);
        $radnik->departman_id=$request->departman;
        $radnik->save();
        return redirect('/departman/'.$request->departman);
    }
}
