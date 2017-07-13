<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;

use Impresoras\AsignacionImpresora;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Impresoras\Http\Requests\AsignacionImpresoraFormRequest;
use DB;

class AsignacionImpresoraController extends Controller
{
    //
    public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $asignacionimpresora=DB::table('asignacion_impresoras as ai')
            ->join('areas as a','ai.idareas','=','a.idareas')
            ->join('oficinas as o','ai.idoficinas','=','o.idoficinas')
            ->join('impresoras as i','ai.idimpresoras','=','i.idimpresoras')
            ->select('ai.idasignacion_impresoras','a.detalle as area','o.detalle as oficina','i.ipimpresora as impresora','ai.fechaasignacion')
            ->where(
                'ai.fechaasignacion','LIKE','%'.$query.'%')
            ->orderBy('ai.idasignacion_impresoras','asc')
            //->groupBy('ac.idasignacion_cartuchos','i.ipimpresora as impresora','c.codigointerno as cartucho','ac.fechaasignacion')
            ->paginate(7);
            return view ('inven.asignacionimpresora.index',["asignacionimpresoras"=>$asignacionimpresora, "searchText"=>$query]);
        }
    }

    public function create (){
    	$area=DB::table('areas')->where('condicion','=','1')->get();
    	$oficina=DB::table('oficinas')->where('condicion','=','1')->get();
        $impresora=DB::table('impresoras')->where('estado','=','activo')->get();
        return view("inven.asignacionimpresora.create",["areas"=>$area,"oficinas"=>$oficina,"impresoras"=>$impresora]);
    }

    public function store (AsignacionImpresoraFormRequest $request){
        $asignacionimpresora= new AsignacionImpresora;
        $asignacionimpresora->idareas=$request->get('idareas');
        $asignacionimpresora->idoficinas=$request->get('idoficinas');
        $asignacionimpresora->idimpresoras=$request->get('idimpresoras');
        $asignacionimpresora->fechaasignacion=$request->get('fechaasignacion');
        $asignacionimpresora->save();
        return Redirect::to('inven/asignacionimpresora');
    }

    public function show ($id){
        return view ("inven.asignacionimpresora.show",["asignacionimpresora"=>AsignacionImpresora::findOrFail($id)]);
    }

    public function edit ($id){
    	$asignacionimpresora=AsignacionImpresora::findOrFail($id);
    	$area=DB::table('areas')->where('condicion','=','1')->get();
    	$oficina=DB::table('oficinas')->where('condicion','=','1')->get();
    	 $impresora=DB::table('impresoras')->where('estado','=','activo')->get();
        return view("inven.asignacionimpresora.edit",["asignacionimpresora"=>$asignacionimpresora,"areas"=>$area,"oficinas"=>$oficina,"impresoras"=>$impresora]);
    }

    public function update (AsignacionImpresoraFormRequest $request,$id){
        $asignacionimpresora=AsignacionImpresora::findOrFail($id);
        
         $asignacionimpresora->idareas=$request->get('idareas');
        $asignacionimpresora->idoficinas=$request->get('idoficinas');
        $asignacionimpresora->idimpresoras=$request->get('idimpresoras');
        $asignacionimpresora->fechaasignacion=$request->get('fechaasignacion');
        $asignacionimpresora->save();
        return Redirect::to('inven/asignacionimpresora');
    }

    public function destroy ($id){
        $asignacionimpresora=AsignacionImpresora::findOrFail($id);
        //$asignacioncartucho->estado='inactivo';
        //$asignacionimpresora->update();
        $asignacionimpresora->delete();
        AsignacionImpresora::destroy($id);
        return Redirect::to('inven/asignacionimpresora');
    }
}
