<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;
use Impresoras\Oficina;
use Illuminate\Support\Facades\Redirect;
use Impresoras\Http\Requests\OficinaFormRequest;
use DB;

class OficinaController extends Controller
{
    //
    public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $oficina=DB::table('oficinas')->where(
                'detalle','LIKE','%'.$query.'%')-> where('condicion','=','1')->orderBy('idoficinas','asc')->paginate(7);
            return view ('inven.oficina.index',["oficinas"=>$oficina, "searchText"=>$query]);
        }

    }

    public function create (){
        return view("inven.oficina.create");
    }

    public function store (OficinaFormRequest $request){
        $oficina= new Oficina;
        $oficina->detalle=$request->get('detalle');
        $oficina->condicion='1';
        $oficina->save();
        return Redirect::to('inven/oficina');
    }

    public function show ($id){
        return view ("inven.oficina.show",["oficina"=>Oficina::findOrFail($id)]);
    }

    public function edit ($id){
        return view ("inven.oficina.edit",["oficina"=>Oficina::findOrFail($id)]);
    }

    public function update (OficinaFormRequest $request,$id){
        $oficina=Oficina::findOrFail($id);
        $oficina->detalle=$request->get('detalle');
        $oficina->update();
        return Redirect::to('inven/oficina');
    }

    public function destroy ($id){
        $oficina=Oficina::findOrFail($id);
        $oficina->condicion='0';
        $oficina->update();
        return Redirect::to('inven/oficina');
    }
}
