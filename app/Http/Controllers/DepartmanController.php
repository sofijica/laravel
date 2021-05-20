<?php

namespace App\Http\Controllers;
use App\Models\Departman;
use App\Models\Radnik;


use Illuminate\Http\Request;

class DepartmanController extends Controller
{
    public function svi(){
        $departmani=Departman::all();

        return view('welcome',['departmani'=>$departmani]);
    }

    public function prikazi($id){
        $departman=Departman::find($id);
       
        $sviRadnici=Radnik::all();
        $radnici=$sviRadnici->filter(function($elem){
            return !isset($elem->departman_id);
        });
        return view('departman',['departman'=>$departman,'radnici'=>$radnici]);
    }
    public function izmeni(Request $request, $id){
        $departman=Departman::find($id);
        $departman->naziv=$request->naziv;
        $departman->save();
        return redirect('/departman/'.$id);
    }
    public function obrisi($id){
        $departman=Departman::find($id);
        $departman->delete();
        return redirect('/');
    }
}
