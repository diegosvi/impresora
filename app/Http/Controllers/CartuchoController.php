<?php

namespace Impresoras\Http\Controllers;

use Illuminate\Http\Request;

use Impresoras\Http\Requests;

use Impresoras\Cartucho;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Impresoras\Http\Requests\CartuchoFormRequest;
use DB;

class CartuchoController extends Controller
{
    //
     public function __construct(){

    }

    public function index (Request $request)
    {
        if ($request){
            $query=trim ($request-> get('searchText'));
            $cartucho=DB::table('cartuchos as c')
            ->join('modelo_cartuchos as mc','c.idmodelo_cartuchos','=','mc.idmodelo_cartuchos')
            ->select('c.idcartuchos','mc.detalle as modelocartucho','c.codigointerno','c.contadorinicialrecarga','c.fechacompra','c.numerofactura','c.estado','c.observacion')
            ->where(
                'c.codigointerno','LIKE','%'.$query.'%')
            ->orwhere(
                'c.fechacompra','LIKE','%'.$query.'%')
            ->orderBy('c.idcartuchos','asc')->paginate(7);
            return view ('inven.cartucho.index',["cartuchos"=>$cartucho, "searchText"=>$query]);
        }
    }

    public function create (){
    	$modelocartucho=DB::table('modelo_cartuchos')->where('condicion','=','1')->get();
        return view("inven.cartucho.create",["modelocartuchos"=>$modelocartucho]);
    }

    public function store (CartuchoFormRequest $request){
        $cartucho= new Cartucho;
        $cartucho->idmodelo_cartuchos=$request->get('idmodelo_cartuchos');
        $cartucho->codigointerno=$request->get('codigointerno');
        $cartucho->contadorinicialrecarga=$request->get('contadorinicialrecarga');
        $cartucho->fechacompra=$request->get('fechacompra');
        $cartucho->numerofactura=$request->get('numerofactura');
        $cartucho->estado='activo';
        $cartucho->observacion=$request->get('observacion');
        $cartucho->save();
        return Redirect::to('inven/cartucho');
    }

    public function show ($id){
        return view ("inven.cartucho.show",["cartucho"=>Cartucho::findOrFail($id)]);
    }

    public function edit ($id){
    	$cartucho=Cartucho::findOrFail($id);
    	$modelocartucho=DB::table('modelo_cartuchos')->where('condicion','=','1')->get();
        return view("inven.cartucho.edit",["cartucho"=>$cartucho, "modelocartuchos"=>$modelocartucho]);
    }

    public function update (CartuchoFormRequest $request,$id){
        $cartucho=Cartucho::findOrFail($id);
        
        $cartucho->idmodelo_cartuchos=$request->get('idmodelo_cartuchos');
        $cartucho->codigointerno=$request->get('codigointerno');
        $cartucho->contadorinicialrecarga=$request->get('contadorinicialrecarga');
        $cartucho->fechacompra=$request->get('fechacompra');
        $cartucho->numerofactura=$request->get('numerofactura');
        $cartucho->observacion=$request->get('observacion');
        $cartucho->save();
        return Redirect::to('inven/cartucho');
    }

    public function destroy ($id){
        $cartucho=Cartucho::findOrFail($id);
        $cartucho->estado='inactivo';
        $cartucho->update();
        return Redirect::to('inven/cartucho');
    }
}
