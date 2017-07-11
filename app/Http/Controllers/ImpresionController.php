<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;
use Impresoras\Impresion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Impresoras\Http\Requests\ImpresionFormRequest;
use DB;

class ImpresionController extends Controller
{
    //
     public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $impresion=DB::table('impresions as im')
            ->join('impresoras as i','im.idimpresoras','=','i.idimpresoras')
            ->select('im.idimpresions','i.ipimpresora as impresora','im.fechainicioimpresion','im.fechafinimpresion','im.contadorinicioimpresion','im.contadorfinimpresion','im.difconinifinimpresion','im.observacion')
            ->where(
                'i.ipimpresora','LIKE','%'.$query.'%')
            ->orwhere('im.fechainicioimpresion','LIKE','%'.$query.'%')
            ->orderBy('im.idimpresions','asc')->paginate(7);
            return view ('inven.impresion.index',["impresions"=>$impresion, "searchText"=>$query]);
        }
    }

    public function create (){
    	$impresora=DB::table('impresoras')->where('estado','=','activo')->get();
        return view("inven.impresion.create",["impresoras"=>$impresora]);
    }

    public function store (ImpresionFormRequest $request){
        $impresion= new Impresion;
        $impresion->idimpresoras=$request->get('idimpresoras');
        $impresion->fechainicioimpresion=$request->get('fechainicioimpresion');
        $impresion->fechafinimpresion=$request->get('fechafinimpresion');
        $impresion->contadorinicioimpresion=$request->get('contadorinicioimpresion');
        //$impresion->estado='activo';
        $impresion->contadorfinimpresion=$request->get('contadorfinimpresion');
        $impresion->difconinifinimpresion=$request->get('difconinifinimpresion');
        $impresion->observacion=$request->get('observacion');
        $impresion->save();
        return Redirect::to('inven/impresion');
    }

    public function show ($id){
        return view ("inven.impresion.show",["impresion"=>Impresion::findOrFail($id)]);
    }

    public function edit ($id){
    	$impresion=Impresion::findOrFail($id);
    	$impresora=DB::table('impresoras')->where('estado','=','activo')->get();
        return view("inven.impresion.edit",["impresion"=>$impresion, "impresoras"=>$impresora]);
    }

    public function update (ImpresionFormRequest $request,$id){
        $impresion=Impresion::findOrFail($id);
        
       $impresion->idimpresoras=$request->get('idimpresoras');
        $impresion->fechainicioimpresion=$request->get('fechainicioimpresion');
        $impresion->fechafinimpresion=$request->get('fechafinimpresion');
        $impresion->contadorinicioimpresion=$request->get('contadorinicioimpresion');
        //$impresion->estado='activo';
        $impresion->contadorfinimpresion=$request->get('contadorfinimpresion');
        $impresion->difconinifinimpresion=$request->get('difconinifinimpresion');
        $impresion->observacion=$request->get('observacion');
        $impresion->save();
        return Redirect::to('inven/impresion');
    }

    public function destroy ($id){
        $impresion=Impresion::findOrFail($id);
        //$recargacartucho->estado='inactivo';
        $impresion->update();
        return Redirect::to('inven/impresion');
    }
}
