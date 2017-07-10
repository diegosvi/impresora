<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;
use Impresoras\Impresora;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Impresoras\Http\Requests\ImpresoraFormRequest;
use DB;

class ImpresoraController extends Controller
{
    //
    public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $impresora=DB::table('impresoras as i')
            ->join('modelo_impresoras as mi','i.idmodelo_impresoras','=','mi.idmodelo_impresoras')
            ->select('i.idimpresoras','mi.detalle as modeloimpresora','i.numeroserie','i.ipimpresora','i.macimpresora','i.fechacompra','i.estado','i.observacion')
            ->where(
                'i.ipimpresora','LIKE','%'.$query.'%')
            ->orwhere(
                'i.numeroserie','LIKE','%'.$query.'%')
            ->orderBy('i.idimpresoras','asc')->paginate(7);
            return view ('inven.impresora.index',["impresoras"=>$impresora, "searchText"=>$query]);
        }
    }

    public function create (){
    	$modeloimpresora=DB::table('modelo_impresoras')->where('condicion','=','1')->get();
        return view("inven.impresora.create",["modeloimpresoras"=>$modeloimpresora]);
    }

    public function store (ImpresoraFormRequest $request){
        $impresora= new Impresora;
        $impresora->idmodelo_impresoras=$request->get('idmodelo_impresoras');
        $impresora->numeroserie=$request->get('numeroserie');
        $impresora->ipimpresora=$request->get('ipimpresora');
        $impresora->macimpresora=$request->get('macimpresora');
        $impresora->fechacompra=$request->get('fechacompra');
        $impresora->estado='activo';
        $impresora->observacion=$request->get('observacion');
        $impresora->save();
        return Redirect::to('inven/impresora');
    }

    public function show ($id){
        return view ("inven.impresora.show",["impresora"=>Impresora::findOrFail($id)]);
    }

    public function edit ($id){
    	$impresora=Impresora::findOrFail($id);
    	$modeloimpresora=DB::table('modelo_impresoras')->where('condicion','=','1')->get();
        return view("inven.impresora.edit",["impresora"=>$impresora, "modeloimpresoras"=>$modeloimpresora]);
    }

    public function update (ImpresoraFormRequest $request,$id){
        $impresora=Impresora::findOrFail($id);
        
        $impresora->idmodelo_impresoras=$request->get('idmodelo_impresoras');
        $impresora->numeroserie=$request->get('numeroserie');
        $impresora->ipimpresora=$request->get('ipimpresora');
        $impresora->macimpresora=$request->get('macimpresora');
        $impresora->fechacompra=$request->get('fechacompra');
        $impresora->observacion=$request->get('observacion');

        $impresora->update();
        return Redirect::to('inven/impresora');
    }

    public function destroy ($id){
        $impresora=Impresora::findOrFail($id);
        $impresora->estado='inactivo';
        $impresora->update();
        return Redirect::to('inven/impresora');
    }
}
