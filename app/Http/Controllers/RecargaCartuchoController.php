<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;

use Impresoras\RecargaCartucho;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Impresoras\Http\Requests\RecargaCartuchoFormRequest;
use DB;

class RecargaCartuchoController extends Controller
{
    //
    public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $recargacartucho=DB::table('recarga_cartuchos as rc')
            ->join('cartuchos as c','rc.idcartuchos','=','c.idcartuchos')
            ->select('rc.idrecarga_cartuchos','c.codigointerno as cartucho','rc.numerorecarga','rc.fechainiciorecarga','rc.fechafinrecarga','rc.contadoriniciorecarga','rc.contadorfinrecarga','rc.difcontinifinrecarga','rc.observacion')
            ->where(
                'c.codigointerno','LIKE','%'.$query.'%')
            //->orwhere(                'rc.fechacompra','LIKE','%'.$query.'%')
            ->orderBy('rc.idrecarga_cartuchos','asc')->paginate(7);
            return view ('inven.recargacartucho.index',["recargacartuchos"=>$recargacartucho, "searchText"=>$query]);
        }
    }

    public function create (){
    	$cartucho=DB::table('cartuchos')->where('estado','=','activo')->get();
        return view("inven.recargacartucho.create",["cartuchos"=>$cartucho]);
    }

    public function store (RecargaCartuchoFormRequest $request){
        $recargacartucho= new RecargaCartucho;
        $recargacartucho->idcartuchos=$request->get('idcartuchos');
        $recargacartucho->numerorecarga=$request->get('numerorecarga');
        $recargacartucho->fechainiciorecarga=$request->get('fechainiciorecarga');
        $recargacartucho->fechafinrecarga=$request->get('fechafinrecarga');
        $recargacartucho->contadoriniciorecarga=$request->get('contadoriniciorecarga');
        //$recargacartucho->estado='activo';
        $recargacartucho->contadorfinrecarga=$request->get('contadorfinrecarga');
        $recargacartucho->difcontinifinrecarga=$request->get('difcontinifinrecarga');
        $recargacartucho->observacion=$request->get('observacion');
        $recargacartucho->save();
        return Redirect::to('inven/recargacartucho');
    }

    public function show ($id){
        return view ("inven.recargacartucho.show",["recargacartucho"=>RecargaCartucho::findOrFail($id)]);
    }

    public function edit ($id){
    	$recargacartucho=RecargaCartucho::findOrFail($id);
    	$cartucho=DB::table('cartuchos')->where('estado','=','activo')->get();
        return view("inven.recargacartucho.edit",["recargacartucho"=>$recargacartucho, "cartuchos"=>$cartucho]);
    }

    public function update (RecargaCartuchoFormRequest $request,$id){
        $recargacartucho=RecargaCartucho::findOrFail($id);
        
       $recargacartucho->idcartuchos=$request->get('idcartuchos');
        $recargacartucho->numerorecarga=$request->get('numerorecarga');
        $recargacartucho->fechainiciorecarga=$request->get('fechainiciorecarga');
        $recargacartucho->fechafinrecarga=$request->get('fechafinrecarga');
        $recargacartucho->contadoriniciorecarga=$request->get('contadoriniciorecarga');
        //$recargacartucho->estado='activo';
        $recargacartucho->contadorfinrecarga=$request->get('contadorfinrecarga');
        $recargacartucho->difcontinifinrecarga=$request->get('difcontinifinrecarga');
        $recargacartucho->observacion=$request->get('observacion');
        $recargacartucho->save();
        return Redirect::to('inven/recargacartucho');
    }

    public function destroy ($id){
        $recargacartucho=RecargaCartucho::findOrFail($id);
        //$recargacartucho->estado='inactivo';
        $recargacartucho->update();
        return Redirect::to('inven/recargacartucho');
    }
}
