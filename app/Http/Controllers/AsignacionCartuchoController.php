<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;

use Impresoras\AsignacionCartucho;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Impresoras\Http\Requests\AsignacionCartuchoFormRequest;
use DB;

class AsignacionCartuchoController extends Controller
{
    //
     public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $asignacioncartucho=DB::table('asignacion_cartuchos as ac')
            ->join('impresoras as i','ac.idimpresoras','=','i.idimpresoras')
            ->join('cartuchos as c','ac.idcartuchos','=','c.idcartuchos')
            ->select('ac.idasignacion_cartuchos','i.ipimpresora as impresora','c.codigointerno as cartucho','ac.fechaasignacion')
            ->where(
                'ac.fechaasignacion','LIKE','%'.$query.'%')
            ->orderBy('ac.idasignacion_cartuchos','asc')
            //->groupBy('ac.idasignacion_cartuchos','i.ipimpresora as impresora','c.codigointerno as cartucho','ac.fechaasignacion')
            ->paginate(7);
            return view ('inven.asignacioncartucho.index',["asignacioncartuchos"=>$asignacioncartucho, "searchText"=>$query]);
        }
    }

    public function create (){
        $impresora=DB::table('impresoras')->where('estado','=','activo')->get();
        $cartucho=DB::table('cartuchos')->where('estado','=','activo')->get();
        return view("inven.asignacioncartucho.create",["impresoras"=>$impresora,"cartuchos"=>$cartucho]);
    }

    public function store (AsignacionCartuchoFormRequest $request){
        $asignacioncartucho= new AsignacionCartucho;
        $asignacioncartucho->idimpresoras=$request->get('idimpresoras');
        $asignacioncartucho->idcartuchos=$request->get('idcartuchos');
        $asignacioncartucho->fechaasignacion=$request->get('fechaasignacion');
        $asignacioncartucho->save();
        return Redirect::to('inven/asignacioncartucho');
    }

    public function show ($id){
        return view ("inven.asignacioncartucho.show",["asignacioncartucho"=>AsignacionCartucho::findOrFail($id)]);
    }

    public function edit ($id){
    	$asignacioncartucho=AsignacionCartucho::findOrFail($id);
    	 $impresora=DB::table('impresoras')->where('estado','=','activo')->get();
        $cartucho=DB::table('cartuchos')->where('estado','=','activo')->get();
        return view("inven.asignacioncartucho.create",["impresoras"=>$impresora,"cartuchos"=>$cartucho]);
    }

    public function update (AsignacionCartuchoFormRequest $request,$id){
        $asignacioncartucho=AsignacionCartucho::findOrFail($id);
        
        $asignacioncartucho->idimpresoras=$request->get('idimpresoras');
        $asignacioncartucho->idcartuchos=$request->get('idcartuchos');
        $asignacioncartucho->fechaasignacion=$request->get('fechaasignacion');
        $asignacioncartucho->save();
        return Redirect::to('inven/asignacioncartucho');
    }

    public function destroy ($id){
        $asignacioncartucho=AsignacionCartucho::findOrFail($id);
        //$asignacioncartucho->estado='inactivo';
        $asignacioncartucho->update();
        return Redirect::to('inven/asignacioncartucho');
    }
}
